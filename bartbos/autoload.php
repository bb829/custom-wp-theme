<?php

namespace StoutLogic\AcfBuilder;

spl_autoload_register(function($cls) {
    $cls = ltrim($cls, '\\');
    if (strpos($cls, __NAMESPACE__) !== 0) {
        return;
    }

    $classWithoutBaseNamespace = str_replace(__NAMESPACE__, '', $cls);

    $path = dirname(__FILE__).
            DIRECTORY_SEPARATOR.
            'src'.
            str_replace('\\', DIRECTORY_SEPARATOR, $classWithoutBaseNamespace).
            '.php';

    require_once($path);
});
