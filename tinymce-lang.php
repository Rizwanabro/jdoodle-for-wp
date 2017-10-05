<?php
if ( ! defined( 'ABSPATH' ) )
    exit;


if ( ! class_exists( '_WP_Editors' ) )
require( ABSPATH . WPINC . '/class-wp-editor.php' );

function jdoodle_tinymce_plugin_translation() {
    $strings = array(
        'editor_caption' => __('Embed your code snippet from JDoodle server', 'jdoodle-for-wp'),
        'share_url' => __('Share URL:', 'jdoodle-for-wp'),
        'caption' => __('Caption:', 'jdoodle-for-wp'),
        'fill_in_url' => __('Please, fill in the \'Share URL\' of your source code.', 'jdoodle-for-wp')
    );
    $locale = _WP_Editors::$mce_locale;
    $translated = 'tinyMCE.addI18n("' . $locale . '.jdoodle", ' . json_encode( $strings ) . ");\n";

     return $translated;
}

$strings = jdoodle_tinymce_plugin_translation();
