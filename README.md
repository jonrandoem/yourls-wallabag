yourls-poche
============

About
------------

yourls-poche is a plugin for [YOURLS](http://yourls.org/). The plugin adds a new share link into the Quick Share box (available for each URL shown in the Yourls admin area).
The added link allows the sharing of the URL to a [Poche](http://http://www.inthepoche.com/en/) installation.

Obviously, you need a valid Yourls installation and a valid Poche installation.

This plugin has been tested on Yourls:
* [1.6](https://github.com/YOURLS/YOURLS/releases/tag/1.6)
* [1.7](https://github.com/YOURLS/YOURLS/releases/tag/1.7)


Installation
------------

1. Unzip the plugin. You get a "yourls-poche" folder
2. Upload this folder into the user/plugins folder of your Yourls installation
3. Edit your config.php file (located at user/config.php in your Yourls installation)
4. Define the URL of your Poche installation by inserting the following line at the end of your config.php file. Adapt the URL "https://my-poche.com" to your Poche installation's URL (No trailing slash !!!), and save changes to config.php

```
define('POCHE_URL', 'https://my-poche.com');
```

Finally, activate the plugin in the admin area



License
------------

This theme is licensed under [MIT License](https://github.com/jonrandoem/yourls-poche/blob/master/LICENSE).
