<?php
namespace Craft;

// do not bootstrap a second time for
// tests that are run in their own process
if (defined('ROOT')) {
    return;
}

define('ROOT', dirname(__DIR__));

include ROOT . '/vendor/autoload.php';
include ROOT . '/services/Sass_CompilerService.php';
include ROOT . '/variables/SassVariable.php';

// some dead simple mocks

class BaseApplicationComponent {}

class Request {
    function getScriptFile() {
        return __FILE__;
    }
}

class IOHelper {
    static function ensureFolderExists($dir)
    {
        if (!is_dir($dir)) {
            throw new \Exception('Dir doesn\'t exist');
        }
    }
}

class Path {
    function getStoragePath() {
        return __DIR__ . '/storage';
    }
}

$craft = (object) [
    'sass_compiler' => new Sass_CompilerService(),
	'request' => new Request(),
	'path' => new Path()
];

function craft() {
    global $craft;
    return $craft;
}
