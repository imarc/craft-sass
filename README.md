Sass Plugin for Craft
=====================

This is a Sass plugin for Craft using [scssphp](http://leafo.net/scssphp/).

It compiles SASS to CSS on the fly.


Installation
------------

0. Extract this plugin in your craft/plugins directory, in a directory named 'sass'.
0. From this directory, run [composer](https://getcomposer.org/) to get the dependencies for this plugin.
0. Upload the whole directory, including the dependencies, to your server.
0. Hop over into the Craft Plugins panel and enable it.


Usage
-----

Upload SCSS files within your document root. For example, `public/css/styles.scss`.

Linking to that file from a twig template should look something like this:

```
<link rel="stylesheet" type="text/css" href="{{ craft.sass.link('/css/styles.scss') }}" media="all" />
```

`craft.sass.link()` generates a link that is routed to the plugin, which in turn compiles the SASS file into CSS.
