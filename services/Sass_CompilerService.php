<?php
/**
 * @copyright 2015 iMarc LLC
 * @author Kevin Hamer [kh] <kevin@imarc.net>
 * @license Apache (see LICENSE file)
 */

namespace Craft;

use Leafo\ScssPhp\Server;

/**
 * Sass_Compileview-source:rService is a Craft plugin service that exposes the sass
 * compiler to Sass_CompilerController.
 */
class Sass_CompilerService extends BaseApplicationComponent
{
    /**
     * compiler is an instance of Leafo\ScssPhp\Server;
     *
     * @var server
     */
    private static $scss_server = null;

    /**
     * server() returns an instance of Leafo\ScssPhp\Server, constructing it if
     * necessary.
     *
     * If you provide an instance of Server as argument, it uses that instead.
     *
     * @return Server
     */
    public static function server($instance = null)
    {
        if ($instance !== null) {
            static::$scss_server = $instance;
        } elseif (static::$scss_server === null) {
            $sass_cache_dir = craft()->path->getStoragePath() . '/scss_cache';
            IOHelper::ensureFolderExists($sass_cache_dir);

            static::$scss_server = new Server(
                 $_SERVER['DOCUMENT_ROOT'],
                $sass_cache_dir
            );

            static::$scss_server->showErrorsAsCSS();
        }

        return static::$scss_server;
    }

    /**
     * compile() returns the compiled CSS of the SASS source file $filename.
     *
     * @param string $filename  File to compile.
     * @return string           Compiled CSS.
     */
    public function compile($filename)
    {
        $_GET['p'] = $filename;

        ob_start();
        static::server()->serve();
        $css = ob_get_contents();
        ob_end_clean();

        return $css;
    }
}
