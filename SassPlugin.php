<?php
namespace Craft;

/**
 * SassPlugin is a Craft plugin made by iMarc that uses
 * [scssphp](http://leafo.net/scssphp/) to compile sass on the fly.
 *
 * @version 1.0
 * @copyright 2014 iMarc LLC
 * @author Kevin Hamer [kh] <kevin@imarc.net>
 */
class SassPlugin extends BasePlugin
{
	public function getName()
	{
		return Craft::t('Sass: Syntactically Awesome Style Sheeets');
	}

	public function getVersion()
	{
		return '1.0';
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
