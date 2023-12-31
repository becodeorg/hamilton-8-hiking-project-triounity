<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit791e62f6e9f02ffc60428ad5fe03576c
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
    );

    public static $classMap = array (
        'ComposerAutoloaderInit791e62f6e9f02ffc60428ad5fe03576c' => __DIR__ . '/..' . '/composer/autoload_real.php',
        'Composer\\Autoload\\ClassLoader' => __DIR__ . '/..' . '/composer/ClassLoader.php',
        'Composer\\Autoload\\ComposerStaticInit791e62f6e9f02ffc60428ad5fe03576c' => __DIR__ . '/..' . '/composer/autoload_static.php',
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
        'PHPMailer\\PHPMailer\\DSNConfigurator' => __DIR__ . '/..' . '/phpmailer/phpmailer/src/DSNConfigurator.php',
        'PHPMailer\\PHPMailer\\Exception' => __DIR__ . '/..' . '/phpmailer/phpmailer/src/Exception.php',
        'PHPMailer\\PHPMailer\\OAuth' => __DIR__ . '/..' . '/phpmailer/phpmailer/src/OAuth.php',
        'PHPMailer\\PHPMailer\\OAuthTokenProvider' => __DIR__ . '/..' . '/phpmailer/phpmailer/src/OAuthTokenProvider.php',
        'PHPMailer\\PHPMailer\\PHPMailer' => __DIR__ . '/..' . '/phpmailer/phpmailer/src/PHPMailer.php',
        'PHPMailer\\PHPMailer\\POP3' => __DIR__ . '/..' . '/phpmailer/phpmailer/src/POP3.php',
        'PHPMailer\\PHPMailer\\SMTP' => __DIR__ . '/..' . '/phpmailer/phpmailer/src/SMTP.php',
        'app\\controllers\\AuthController' => __DIR__ . '/../..' . '/app/controllers/AuthController.php',
        'app\\controllers\\AuthException' => __DIR__ . '/../..' . '/app/controllers/ErrorController.php',
        'app\\controllers\\EmailException' => __DIR__ . '/../..' . '/app/controllers/ErrorController.php',
        'app\\controllers\\EmailService' => __DIR__ . '/../..' . '/app/controllers/EmailController.php',
        'app\\controllers\\ErrorHandler' => __DIR__ . '/../..' . '/app/controllers/ErrorController.php',
        'app\\controllers\\FormValidationException' => __DIR__ . '/../..' . '/app/controllers/ErrorController.php',
        'app\\controllers\\HikeController' => __DIR__ . '/../..' . '/app/controllers/HikeController.php',
        'app\\controllers\\NotFoundException' => __DIR__ . '/../..' . '/app/controllers/ErrorController.php',
        'app\\controllers\\PageController' => __DIR__ . '/../..' . '/app/controllers/PageController.php',
        'app\\controllers\\tagcontroller' => __DIR__ . '/../..' . '/app/controllers/tagcontroller.php',
        'app\\models\\Database' => __DIR__ . '/../..' . '/app/models/database.php',
        'app\\models\\Hike' => __DIR__ . '/../..' . '/app/models/hike.php',
        'app\\models\\User' => __DIR__ . '/../..' . '/app/models/User.php',
        'app\\models\\tag' => __DIR__ . '/../..' . '/app/models/tag.php',
        'core\\Router' => __DIR__ . '/../..' . '/core/Router.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit791e62f6e9f02ffc60428ad5fe03576c::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit791e62f6e9f02ffc60428ad5fe03576c::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit791e62f6e9f02ffc60428ad5fe03576c::$classMap;

        }, null, ClassLoader::class);
    }
}
