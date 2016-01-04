<?php
/**
 * @copyright 2015 iMarc LLC
 * @author Kevin Hamer [kh] <kevin@imarc.net>
 * @license Apache (see LICENSE file)
 */

namespace Craft;

/**
 * Sass_CompilerController is a Craft plugin controller that is routed to directly.
 */
class Sass_CompilerController extends BaseController
{
    /**
     * Without this, all actions default to requiring a login.
     */
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
        $css = null;
        if ($filename = craft()->request->getQuery('filename')) {
            header('Content-type: text/css');
            $css = craft()->sass_compiler->compile($filename);
        }

        if ($css) {
            echo $css;
        } else {
            header('HTTP/1.0 404 Not Found');
        }

        exit(0);
    }
}
