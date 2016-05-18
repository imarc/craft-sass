Sass Plugin for Craft
=====================

This is a Sass plugin for Craft using [scssphp](http://leafo.net/scssphp/).

It compiles SASS to CSS on the fly, and caches the results to disk until the file changes.


Installation
------------

Installation requires [composer](https://getcomposer.org/). This plugn also is makes use of [composer/installers](https://github.com/composer/installers) to make the plugin composer compatible.

1. In the **root** of your project, run `composer require imarc/craft-sass`.This will create a `vendor/` directory as well as automatically put the plugin it self in `craft/plugins/sass/`.
2. Upload both the `vendor/` and `craft/plugins/sass/` directories.
3. Enable the plugin in the Craft Plugins panel.


Usage
-----

Upload SCSS files within your document root. For example, `public/css/styles.scss`.

Linking to that file from a twig template should look something like this:

```
<link rel="stylesheet" type="text/css" href="{{ craft.sass.link('/css/styles.scss') }}" media="all" />
```

`craft.sass.link()` generates a link that is routed to the plugin, which in turn compiles the SASS file into CSS.

Tests
-----

To run the tests, be sure you have phpunit installed and then:

```
composer install
phpunit
```
