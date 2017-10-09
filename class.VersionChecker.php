<?php

require_once(ABSPATH . "wp-admin/includes/plugin.php");
require_once("config.php");

class VersionChecker {

    public function isNewerPluginVersion() {
        $version = $this->getLastestPluginVersion();
        if($version == NULL) return FALSE;
        $currentVersion = $this->getCurrentPluginVersion();
        return version_compare($currentVersion, $version) < 0;
    }

    public function displayNotificationMessage() {
        $adminUrl = get_admin_url() . "admin-post.php";
        $updateCaption = __("Update", "jdoodle-for-wp");
        $updateButton = "<a href='$adminUrl?action=update_jdoodle'>$updateCaption</a>"; 
        $message = __("The new version of the JDoodle for WP plugin is ready. Please update the current version.", "jdoodle-for-wp");

        echo <<<EOT
        <div class="notice notice-warning is-dismissible"><p><b>$message</b>&nbsp;$updateButton</p></div>
EOT;
    }

    private function getLastestPluginVersion() {
        $versionContent = getDataUsingHTTP(JDOODLE_VERSION_CHECK_URL);
        $version = $this->parsePluginVersion($versionContent);
        return $version;
    }

    private function parsePluginVersion($content) {
        $json = json_decode($content, true);
        if($json == NULL) return NULL;
        return $json["version"];
    }

    private function getCurrentPluginVersion() {
        $pluginFile = plugin_dir_path ( __FILE__ ) . JDOODLE_MAIN_PLUGIN_FILE;
        $pluginData = get_plugin_data($pluginFile);
        return $pluginData["Version"];
    }
}