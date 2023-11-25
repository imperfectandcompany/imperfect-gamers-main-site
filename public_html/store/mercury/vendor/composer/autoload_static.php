<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit0fb0c5849a7b276fffe50b3c12e587f4
{
    public static $files = array (
        '1be0779ed5430d7457062cacbd37cd94' => __DIR__ . '/../..' . '/helpers.php',
    );

    public static $prefixLengthsPsr4 = array (
        'N' => 
        array (
            'Noodlehaus\\' => 11,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Noodlehaus\\' => 
        array (
            0 => __DIR__ . '/..' . '/hassankhan/config/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit0fb0c5849a7b276fffe50b3c12e587f4::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit0fb0c5849a7b276fffe50b3c12e587f4::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit0fb0c5849a7b276fffe50b3c12e587f4::$classMap;

        }, null, ClassLoader::class);
    }
}