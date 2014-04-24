<?php
namespace Craft;

/**
 * SassVariable provides the Twig variable `craft.sass` when inside a Craft
 * template.
 *
 * @copyright 2014 iMarc LLC
 * @author Kevin Hamer [kh] <kevin@imarc.net>
 */
class SassVariable
{
	/**
	 * craft.sass.compile() takes raw sass and converts it to css.
	 *
	 * @param string  $filename
	 * @return string
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
	 * @param string  $filename
	 * @return string
	 */
	public function link($filename)
	{
		return UrlHelper::getActionUrl('sass/compiler/sass', ['filename' => $filename]);
	}
}
