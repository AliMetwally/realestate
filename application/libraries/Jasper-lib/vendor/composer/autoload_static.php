<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit7f6f41030960b232401034a8c8bc6237
{
    public static $prefixesPsr0 = array (
        'J' => 
        array (
            'Jaspersoft' => 
            array (
                0 => __DIR__ . '/../..' . '/src',
            ),
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixesPsr0 = ComposerStaticInit7f6f41030960b232401034a8c8bc6237::$prefixesPsr0;

        }, null, ClassLoader::class);
    }
}
