<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit791e62f6e9f02ffc60428ad5fe03576c
{
    public static $classMap = array (
        'ComposerAutoloaderInit791e62f6e9f02ffc60428ad5fe03576c' => __DIR__ . '/..' . '/composer/autoload_real.php',
        'Composer\\Autoload\\ClassLoader' => __DIR__ . '/..' . '/composer/ClassLoader.php',
        'Composer\\Autoload\\ComposerStaticInit791e62f6e9f02ffc60428ad5fe03576c' => __DIR__ . '/..' . '/composer/autoload_static.php',
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
        'app\\controllers\\AuthController' => __DIR__ . '/../..' . '/app/controllers/AuthController.php',
        'app\\controllers\\PageController' => __DIR__ . '/../..' . '/app/controllers/PageController.php',
        'app\\controllers\\hikecontroller' => __DIR__ . '/../..' . '/app/controllers/hikecontroller.php',
        'app\\controllers\\tagcontroller' => __DIR__ . '/../..' . '/app/controllers/tagcontroller.php',
        'app\\models\\Database' => __DIR__ . '/../..' . '/app/models/database.php',
        'app\\models\\User' => __DIR__ . '/../..' . '/app/models/User.php',
        'app\\models\\hike' => __DIR__ . '/../..' . '/app/models/hike.php',
        'app\\models\\tag' => __DIR__ . '/../..' . '/app/models/tag.php',
        'core\\Error' => __DIR__ . '/../..' . '/core/Error.php',
        'core\\Router' => __DIR__ . '/../..' . '/core/Router.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->classMap = ComposerStaticInit791e62f6e9f02ffc60428ad5fe03576c::$classMap;

        }, null, ClassLoader::class);
    }
}
