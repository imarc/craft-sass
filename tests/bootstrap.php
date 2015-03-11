<?php
namespace Craft;

class BaseApplicationComponent {}

class Request {
    function getScriptFile() {
        return __FILE__;
    }
}

define('ROOT', dirname(__DIR__));

include ROOT . '/services/Sass_CompilerService.php';
include ROOT . '/variables/SassVariable.php';


$craft = (object) [
    'sass_compiler' => new Sass_CompilerService(),
    'request' => new Request()
];

function craft() {
    global $craft;
    return $craft;
}

