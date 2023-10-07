<?php

spl_autoload_register ( function ($class) {
    $sources = array(
        "Controllers/$class.php",
        "Core/$class.php",
        "DAO/$class.php",
        "Models/$class.php"
    );

        foreach ($sources as $source) {
            if (file_exists($source)) {
                require_once $source;
            } 
        } 
    });
