<?php

require_once("config.php");

class UpdateEngine {

    public function updatePlugin() {
        $this->displaySuccessNotification();
    }

    public function displaySuccessNotification() {
        $message = __("The JDoodle for WP plugin has been successfully updated.", "jdoodle-for-wp");
        echo "<div class='notice notice-success is-dismissible'><p><b>$message</b></div>";
    }
}
