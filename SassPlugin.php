<?php
/**
 * @copyright 2015 iMarc LLC
 * @author Kevin Hamer [kh] <kevin@imarc.net>
 * @license Apache (see LICENSE file)
 */

namespace Craft;

/**
 * SassPlugin is a Craft plugin that uses [scssphp](http://leafo.net/scssphp/)
 * to compile SASS files on the server as needed.
 */
class SassPlugin extends BasePlugin
{
    public function getName()
    {
        return Craft::t('Sass: Syntactically Awesome Style Sheeets');
    }

    public function getVersion()
    {
        return '1.0.1';
    }

    public function getDeveloper()
    {
        return 'iMarc';
    }

    public function getDeveloperUrl()
    {
        return 'http://www.imarc.net';
    }
}
