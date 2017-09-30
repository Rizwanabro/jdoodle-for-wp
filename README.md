# JDoodle for WordPress
This plugin allows users to execute their code snippets online in various languages directly in their Wordpress site. It is done by integrating three technologies which are WordPress, [Enlighter plugin](https://wordpress.org/plugins/enlighter/) and finally https://www.jdoodle.com website providing the facilities to run the code online.

## Plugin dependencies
**JDoodle for WordPress** depends upon the [Enlighter WordPress plugin](https://wordpress.org/plugins/enlighter/).

## Installation
1. Install the [**Enlighter plugin**](https://wordpress.org/plugins/enlighter/) and activate it.
2. Download the ZIP file package of the [**JDoodle for WordPress plugin**](https://github.com/evonox/jdoodle-for-wp/releases/tag/0.1).
3. Upload the **JDoodle for WordPress** ZIP package at the plugin installation page of your WordPress site.
4. Activate the uploaded plugin.

**Remark:** *If you are not familiar to WordPress plugin installation, then have a look at [this video tutorial](https://www.youtube.com/watch?v=AXM1QgMODW0).*

## Setting up the plugins
Setup the **Enlighter plugin** to use the *Legacy shortcode system*. To do it just follow these steps.
1. Go to your WordPress site administration.
2. In the menu on the left click a menu item named *Enlighter*. This will open the settings page of the **Enlighter plugin**.
3. Click on the **Editing** tab.
4. Scroll down to find out the **Shortcodes** panel.
5. In the combobox named **Processor** then choose the option called *Legacy (WordPress based)*.
6. Finally save the changes.

## Usage
1. First add your code snippet to the [https://www.jdoodle.com](https://www.jdoodle.com) and mark it as shared.
2. Then copy the **Shared URL**, **NOT THE Embed URL**.
3. Write the shortcode in the form **\[jdoodle url="*your code snippet SHARED URL*"\]** to your post or page.
4. If you want to, you may change the caption of the popup window. Just add the parameter **caption** to the shortcode like this.
**\[jdoodle url="*your code snippet SHARED URL*"  caption="*your caption*"\]**.

## Supported languages
* Java
* C++
* Javascript in NodeJS
* C#
* PHP











