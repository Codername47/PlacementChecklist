<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit23a8ac157fcf7b755ddeb5582b328bda
{
    public static $prefixLengthsPsr4 = array (
        'D' => 
        array (
            'Dread\\Htdocs\\' => 13,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Dread\\Htdocs\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit23a8ac157fcf7b755ddeb5582b328bda::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit23a8ac157fcf7b755ddeb5582b328bda::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit23a8ac157fcf7b755ddeb5582b328bda::$classMap;

        }, null, ClassLoader::class);
    }
}
