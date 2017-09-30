<?php
/**
 * @package JDoodleForWP
 * @version 0.1
 */
/*
Plugin Name: JDoodle for WordPress
Depends: Enlighter
Plugin URI: https://github.com/evonox/jdoodle-for-wp/
Description: This plugin allows users to execute their code snippets online in various languages directly in their Wordpress site. 
Author: Viktor Prehnal
Version: 0.1
Text Domain: jdoodle-for-wp
Domain Path: /languages
License: MIT
*/

// This constant defines the script URL of the embedded engine of JDoodle
define("JDOODLE_SCRIPT_URL", "https://www.jdoodle.com/assets/jdoodle-pym.min.js");

// Translation map of language codes between JDoodle and Enligter plugin, and links to create the embedded URLs
define("ENLIGHTER_LANG_CODE", 0);
define("JDODDLE_EMBED_URL", 1);

$translationMap = [
	"cpp" => ["cpp", "https://www.jdoodle.com/embed/v0/cpp/gcc-5.3.0/"],
	"php" => ["php", "https://www.jdoodle.com/embed/v0/php/5.6.16/"],
	"nodejs" => ["javascript", "https://www.jdoodle.com/embed/v0/nodejs/6.3.1/"],
	"java" => ["java", "https://www.jdoodle.com/embed/v0/java/jdk-1.8/"],
	"csharp" => ["csharp", "https://www.jdoodle.com/embed/v0/csharp/mono-4.2.2/"]
];

// Global variable containing the popup window HTML added to the footer of the page
$popupEngineWindowsHtml = "";

// Returns data using HTTP connection
function getDataUsingHTTP($url) {
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$response = curl_exec($ch);
	curl_close($ch);
	return $response;
}

// Function checking if a string starts with another string
function startsWith($string, $startingString) {
	$string = strtolower($string); 
	$startingString = strtolower($startingString);

	return substr($string, 0, strlen($startingString)) === $startingString;
}

// Completes URL in general
function completeGeneralUrl($url) {
	if(startsWith($url, "https://") == false) {
		if(startsWith($url, "www") == false) {
			$url = "www." . $url;
		}
		$url = "https://" . $url;
	}
	return $url;
}

// Complete the URL used to download the source code in JSON format
function completeSourceCodeUrl($url) {
	$url = completeGeneralUrl($url);
	$url .= "?format=json";
	return $url;
}

// Creates the URL for the embedded engine powered by JDoodle
function createEmbedUrlFromSourceCodeUrl($url, $lang) {
	global $translationMap;
	$urlParts = explode("/", $url);
	$code = $urlParts[count($urlParts) - 1];
	return $translationMap[$lang][JDODDLE_EMBED_URL] . $code;
}

// Checks the JSON format and extracts the data in it
function parseSourceCodeFromJson($json, &$source, &$lang) {
	$source = ""; $lang = "";
	$json = json_decode($json, true);

	if($json === NULL) return false;
	if(! isset($json["code"])) return false;
	if(! isset($json["language"])) return false;

	$source = $json["code"];
	$lang = $json["language"];
	return true;
}

// Creates the error message HTML
function create_error_message($message) {
	return "<div class='error_message'>" . $message . "</div>";
}

// The core shortcode handler for JDoodle
function jdoodle_shortcode_handler($atts) {
	global $popupEngineWindowsHtml;
	global $translationMap;

	// Check shortcode attributes
	if(! isset($atts["url"]))
		return create_error_message(__("Missing 'url' parameter in shortcode.", "jdoodle-for-wp"));
	$url = $atts['url'];
	$caption = isset($atts["caption"]) ? $atts["caption"] : __("JDoodle for WordPress", "jdoodle-for-wp");

	// Download the sample source coude
	$sampleUrl = completeSourceCodeUrl($url);
	$json = getDataUsingHTTP($sampleUrl);

	// Check the JSON format
	$source = ""; $lang = "";
	if(parseSourceCodeFromJson($json, $source, $lang) == false)
		return create_error_message(__("Error loading source code.", "jdoodle-for-wp"));
	// Check the support the language by this plugin
	if(! isset($translationMap[$lang]))
		return create_error_message(__("Unsupported programming language.", "jdoodle-for-wp"));
	// Prepare the source doe for the HTML output
	$source = htmlspecialchars($source);

	// Create the embed URL
	$langCode = $translationMap[$lang][ENLIGHTER_LANG_CODE];
	$embedUrl = createEmbedUrlFromSourceCodeUrl($url, $lang);
	
	// Generate a random number for the popup window ID
	$id = rand(1, getrandmax());

	// Run the Enlighter plugin to create HTML for the syntax highlighter
	$html = do_shortcode('[enlighter lang="' . $langCode . '"]' . $source . '[/enlighter]');
	$html .= "<div class='jdoodle_try_online'><a onclick='showJDoodleEngine($id)' href='javascript:void(0)'>" . 
			__("Try Online", "jdoodle-for-wp") . "</a></div>";

	// Generate the HTML for the popup window hosting JDoodle facilities executing the code
	$editCodeButtonCaption = __("Edit Code", "jdoodle-for-wp");
	$closeButtonCaption = __("Close", "jdoodle-for-wp");
	$editCodeUrl = completeGeneralUrl($url);
	$popupEngineWindowsHtml .= <<<EOT
		<div id="jdoodle_embed_container$id" class="jdoodle_embed_container">
			<div class="jdoodle_embed_inner_container">
				<div class="jdoodle_embed_header">
					<b class="title">$caption</b>
					<div class="links">
						<a target="_blank" href="$editCodeUrl" style="color: white;">$editCodeButtonCaption</a>
						<a href="javascript:void(0)" onclick="hideJDoodleEngine($id)" style="color: white;">$closeButtonCaption</a>
					</div>
				</div>
				<div class="jdoodle_embed_header_separator"></div>
				<div class="doodle_embed_scrollable">
					<div class="jdoodle_embed_centering_container">
						<div class="jdoodle_embed_centering_content">
							<div data-pym-src="$embedUrl"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
EOT;
	return $html;
}
add_shortcode('jdoodle', 'jdoodle_shortcode_handler');

// Embeds the generated HTML code of popup windows hosting JDoodle facilities
function embed_popup_windows_for_jdoodle() {
	global $popupEngineWindowsHtml;
	echo $popupEngineWindowsHtml;
}
add_action( 'wp_footer', 'embed_popup_windows_for_jdoodle' );

// Include the required scripts just only to the frontend of the webpage
function load_jdoodle_plugin_scripts() {
	wp_enqueue_script("jDoodle_Embed_Script", JDOODLE_SCRIPT_URL, [], null, true);
	wp_enqueue_script("jDoodle_Embed_Support_Script", plugins_url("script.js", __FILE__));
	wp_enqueue_style("jDoodle_Embed_CSS", plugins_url("style.css", __FILE__));	
}
add_action('wp_enqueue_scripts', 'load_jdoodle_plugin_scripts');

// Load the text domain
function myplugin_init() {
	$plugin_dir = basename(dirname(__FILE__));
	load_plugin_textdomain( 'jdoodle-for-wp', false, $plugin_dir . '/languages' );
}
add_action('plugins_loaded', 'myplugin_init');
