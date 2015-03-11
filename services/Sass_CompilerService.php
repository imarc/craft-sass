<?php
/**
 * @copyright 2015 iMarc LLC
 * @author Kevin Hamer [kh] <kevin@imarc.net>
 * @license Apache (see LICENSE file)
 */

namespace Craft;

use Exception;
use scssc;

/**
 * Sass_CompilerService is a Craft plugin service that exposes the sass
 * compiler to Sass_CompilerController.
 */
class Sass_CompilerService extends BaseApplicationComponent
{
    /**
     * compiler is an instance of scssc;
     *
     * @var scssc
     */
    protected $compiler = null;

    /**
     * getCompiler() reurns and instance of scssc, constructing one if
     * necessary.
     *
     * @return scssc
     */
    public function getCompiler()
    {
        if ($this->compiler === null) {
            include dirname(__DIR__) . '/vendor/autoload.php';
            $this->compiler = new scssc();
        }

        return $this->compiler;
    }

    /**
     * compile() returns the compiled CSS of the SASS source file $filename.
     *
     * @param string $filename  File to compile.
     * @return string           Compiled CSS.
     */
    public function compile($filename)
    {
        $document_root = dirname(craft()->request->getScriptFile());

        $filename = realpath("$document_root/$filename");

        if (file_exists($filename) && strpos($filename, $document_root) === 0) {
            $scss = file_get_contents($filename);

            $compiler = $this->getCompiler();
            $compiler->setImportPaths($document_root);

            try {

                return $compiler->compile($scss);

            } catch (Exception $e) {
                $msg = $e->getFile() . ":\n\n";
                $msg .= $e->getMessage();
                $msg = str_replace(array("'", "\n"), array("\\'", "\\A"), $msg);
                return "body { display: none !important; }
                    html:after {
                        background: white;
                        color: black;
                        content: '$msg';
                        display: block !important;
                        font-family: Mono;
                        padding: 1em;
                        white-space: pre;
                    }";
            }
        }
    }
}
