<?php
/**
 * @copyright 2016 Imarc
 * @author Kevin Hamer [kh] <kevin@imarc.com>
 * @license Apache (see LICENSE file)
 */

namespace Craft;

/**
 * SassPlugin is a Craft plugin that uses [scssphp](http://leafo.net/scssphp/)
 * to compile SASS files on the server as needed.
 */
class SassPlugin extends BasePlugin
{
    public function init()
    {
        require_once CRAFT_BASE_PATH . '../vendor/autoload.php';

        return parent::init();
    }

    public function getName()
    {
        return Craft::t('Sass: Syntactically Awesome Style Sheets');
    }

    public function getVersion()
    {
        return '1.0';
    }

    public function getDeveloper()
    {
        return 'Imarc';
    }

    public function getDeveloperUrl()
    {
        return 'https://www.imarc.com';
    }
}
