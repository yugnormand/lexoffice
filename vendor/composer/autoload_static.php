<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitae94ebdda441c9f9fb8f3742d694a978
{
    public static $prefixLengthsPsr4 = array (
        'T' => 
        array (
            'Todocoding\\Lexoffice\\' => 21,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Todocoding\\Lexoffice\\' => 
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
            $loader->prefixLengthsPsr4 = ComposerStaticInitae94ebdda441c9f9fb8f3742d694a978::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitae94ebdda441c9f9fb8f3742d694a978::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitae94ebdda441c9f9fb8f3742d694a978::$classMap;

        }, null, ClassLoader::class);
    }
}
