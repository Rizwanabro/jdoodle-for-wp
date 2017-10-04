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
1. First you need to create an account at [https://www.jdoodle.com](https://www.jdoodle.com) website.
2. Then you can add your code snippet to the [https://www.jdoodle.com](https://www.jdoodle.com), save it and mark it as shared.
3. Then go back to your WP site editor, press the button called "JDoodle".
4. Copy the **Shared URL**, **NOT THE Embed URL**.
5. Fill in optionally a caption of the popup window.
6. Click OK button and the shortcode will be generated for you.

If your preference is writing shortcodes directly, write JDoodle shortcodes as follows:
```
\[jdoodle url="*your code snippet SHARED URL*"  caption="*your caption*"\]
```
*Remark: The parameter caption is optional.*

## Supported languages
* Java
* C++
* Javascript in NodeJS
* C#
* PHP











