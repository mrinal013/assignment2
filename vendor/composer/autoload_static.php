<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit3198171f78454e704f92f00cbac3e72f
{
    public static $prefixLengthsPsr4 = array (
        'M' => 
        array (
            'Movie\\Includes\\' => 15,
            'Movie\\Frontend\\' => 15,
            'Movie\\Admin\\' => 12,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Movie\\Includes\\' => 
        array (
            0 => __DIR__ . '/../..' . '/includes',
        ),
        'Movie\\Frontend\\' => 
        array (
            0 => __DIR__ . '/../..' . '/public',
        ),
        'Movie\\Admin\\' => 
        array (
            0 => __DIR__ . '/../..' . '/admin',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit3198171f78454e704f92f00cbac3e72f::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit3198171f78454e704f92f00cbac3e72f::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit3198171f78454e704f92f00cbac3e72f::$classMap;

        }, null, ClassLoader::class);
    }
}
