<?php
/**
 * @copyright 2015 iMarc LLC
 * @author Kevin Hamer [kh] <kevin@imarc.net>
 * @license Apache (see LICENSE file)
 */

namespace Craft;

use PHPUnit_Framework_TestCase;

/**
 * CraftSassPluginTest verifies that the sass compiler is working properly by
 * stubbing out some of the Craft classes.
 */
class CraftSassPluginTest extends PHPUnit_Framework_TestCase
{
    public function testCompilation()
    {
        $css = craft()->sass_compiler->compile('sample.scss');

        $s = file_get_contents(__DIR__ . '/result.css');

        $this->assertEquals(file_get_contents(__DIR__ . '/result.css'), $css);
    }
}
