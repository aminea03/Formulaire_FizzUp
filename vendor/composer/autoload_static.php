<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit678b8ecc0bd00c3021ac7fb6cb85bf1d
{
    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->classMap = ComposerStaticInit678b8ecc0bd00c3021ac7fb6cb85bf1d::$classMap;

        }, null, ClassLoader::class);
    }
}
