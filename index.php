<?php
	mb_internal_encoding("UTF-8");

    //classess autoloading
	spl_autoload_extensions("_class.php");
	spl_autoload_register(function ($className) {
        $prefix = '';
        $baseDir = __DIR__ . '/';
        $len = strlen($prefix);
        if (strncmp($prefix, $className, $len) !== 0) return;

        $relativeClass = substr($className, $len);
        $file = $baseDir . str_replace('\\', '/', $relativeClass) . '_class.php';
        
        if (file_exists($file)) {
            require $file;
        }
    });

    //start routing
    Route::start();
?>