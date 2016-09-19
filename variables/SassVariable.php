<?php
/**
 * @copyright 2015 iMarc LLC
 * @author Kevin Hamer [kh] <kevin@imarc.net>
 * @license Apache (see LICENSE file)
 */

namespace Craft;

/**
 * SassVariable provides the Twig variable `craft.sass` when inside a Craft
 * template. It is primarily used to get the generated link for a SASS file.
 *
 */
class SassVariable
{
    /**
     * craft.sass.compile() takes raw sass and converts it to css.
     *
     * @param string $filename  File to compile.
     * @return string           Compiled CSS.
     */
    public function compile($filename)
    {
        return craft()->sass_compiler->compile($filename);
    }

    /**
     * craft.sass.link() returns a URL that will return the compiled, CSS
     * version of a specified Sass file. The path should be relative to the
     * document root.
     *
     * @param string $filename  File to compile.
     * @return string           Relative URL to the compiled CSS version.
     */
    public function link($filename)
    {
        return UrlHelper::getActionUrl('sass/compiler/sass', array('filename' => $filename));
    }
}
