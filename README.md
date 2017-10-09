# JDoodle for WordPress
This plugin helps users to execute their code snippets online in various languages directly within Wordpress sites. This plugin uses following softwares/services, 
1. WordPress 
2. [Enlighter plugin](https://wordpress.org/plugins/enlighter/) - for syntax highlighting
3. https://www.jdoodle.com -  to run the code online.

## Plugin dependencies
**JDoodle for WordPress** uses [Enlighter WordPress plugin](https://wordpress.org/plugins/enlighter/) for syntax hightlighting.

## Installation
1. Install the [**Enlighter plugin**](https://wordpress.org/plugins/enlighter/) and activate it.
2. Download the ZIP package of the [**JDoodle for WordPress plugin**](https://github.com/evonox/jdoodle-for-wp/releases/tag/0.1).
3. Upload the **JDoodle for WordPress** ZIP package at the plugin installation page of your WordPress site.
4. Activate the uploaded plugin.

**Remark:** *If you are not familiar with WordPress plugin installation, please have a look at [this video tutorial](https://www.youtube.com/watch?v=AXM1QgMODW0).*

## Setting up the plugins
Setup the **Enlighter plugin** to use the *Legacy shortcode system*. 
you can set this up using below steps.
1. Go to your WordPress site administration.
2. In the menu on the left, click *Enlighter*. This will open the settings page of the **Enlighter plugin**.
3. Click on the **Editing** tab.
4. Scroll down to the **Shortcodes** panel.
5. In the  **Processor** dropdown box, select the option *Legacy (WordPress based)*.
6. save changes.

## Usage
1. To start with, you need an account with [https://www.jdoodle.com](https://www.jdoodle.com). It is free, you can login with your google account or register with JDoodle by clicking the SignIn button at the top right corner.
2. Then you can add your code snippet in [https://www.jdoodle.com](https://www.jdoodle.com) by visiting the relavent language page, save it and don't forget to mark it as **shared**.
3. Then go back to your WP site editor, press the button called "JDoodle".
4. Copy the **Shared URL**, **NOT THE Embed URL**.
5. Enter a caption for the popup window (Optional).
6. Click OK and the shortcode will be generated for you.

If your preference is writing shortcodes directly, write them as follows:
```
[jdoodle url="your code snippet SHARED URL"  caption="your caption"]
```
**Note:** *The parameter caption is optional.*

## Supported languages
* Java
* C++
* Javascript in NodeJS
* C#
* PHP











