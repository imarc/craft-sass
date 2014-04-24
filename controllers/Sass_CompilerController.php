<?php
namespace Craft;

/**
 * Sass_CompilerController is a Craft plugin controller that is routed to directly.
 *
 * @copyright 2014 iMarc LLC
 * @author Kevin Hamer [kh] <kevin@imarc.net>
 */
class Sass_CompilerController extends BaseController
{
	protected $allowAnonymous = true;

	/**
	 * GET Requests to /actions/sass/compiler/sass are routed here.
	 *
	 * actionSass() looks for a filename parameter in the query string, and
	 * returns the compiled version of that file.
	 *
	 * @return void
	 */
	public function actionSass()
	{
		if ($filename = craft()->request->getQuery('filename')) {
			header('Content-type: text/css');
			echo craft()->sass_compiler->compile($filename);

		} else {
			header('HTTP/1.0 404 Not Found');
		}
		exit(0);
	}
}
