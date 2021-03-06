<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit709370ea4d9da809afdceb40dce8af2a
{
    public static $prefixLengthsPsr4 = array (
        'C' => 
        array (
            'Capstone\\' => 9,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Capstone\\' => 
        array (
            0 => __DIR__ . '/../..' . '/classes',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit709370ea4d9da809afdceb40dce8af2a::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit709370ea4d9da809afdceb40dce8af2a::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
