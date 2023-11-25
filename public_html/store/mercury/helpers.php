<?php

use Noodlehaus\Config;
use Noodlehaus\Parser\Php;

if (!function_exists('config')) {
    function config()
    {
        $files = [];

        $directory = new RecursiveDirectoryIterator(realpath(__DIR__ . '/config'));

        $iterator = new RecursiveIteratorIterator($directory, RecursiveIteratorIterator::SELF_FIRST);

        foreach ($iterator as $file) {
            if ($file->isFile()) {
                $files[] = $file->getPathname();
            }
        }

        return new Config($files, new Php());
    }
}

if (!function_exists('strRandom')) {
    function strRandom($number) {

        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

        $randomString = '';



        for ($i = 0; $i < $number; $i++) {

            $index = rand(0, strlen($characters) - 1);

            $randomString .= $characters[$index];

        }



        return $randomString;
    }
}

if (!function_exists('version_hash')) {
    function version_hash()
    {
        return config()->get('app.development_mode') === false ?  md5(config()->get('app.version')) : strRandom(32);
    }
}

if (!function_exists('dd')) {
    function dd(...$args) {
        die(var_dump($args));
    }
}