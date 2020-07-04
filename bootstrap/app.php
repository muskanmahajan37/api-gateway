<?php


require_once __DIR__ . '/../vendor/autoload.php';

try {
    (new Dotenv\Dotenv(dirname(__DIR__)))->load();
} catch (Dotenv\Exception\InvalidPathException $e) {
}

$app = new Laravel\Lumen\Application(
    dirname(__DIR__)
);

$app->withFacades();
$app->withFacades(true, [
    'Illuminate\Support\Facades\Mail' => 'Mail'
]);
$app->withEloquent();
$app->register(App\Providers\RouteBindingServiceProvider::class);

$app->configure('services');
$app->configure('auth');


$app->singleton(
    Illuminate\Contracts\Debug\ExceptionHandler::class,
    App\Exceptions\Handler::class
);

$app->singleton(
    Illuminate\Contracts\Console\Kernel::class,
    App\Console\Kernel::class
);


 $app->routeMiddleware([

     'jwt.auth' => App\Http\Middleware\JwtMiddleware::class,
 ]);



$app->register(App\Providers\AuthServiceProvider::class);
$app->register(Tymon\JWTAuth\Providers\LumenServiceProvider::class);
$app->register(Flipbox\LumenGenerator\LumenGeneratorServiceProvider::class);
$app->register(App\Providers\AppServiceProvider::class);
$app->register(Laravel\Socialite\SocialiteServiceProvider::class);
$app->configure('mail');
$app->register(Illuminate\Mail\MailServiceProvider::class);
$app->register(Illuminate\Notifications\NotificationServiceProvider::class);
$app->middleware([
    App\Http\Middleware\CorsMiddleware::class
]);

$app->alias('mailer', \Illuminate\Contracts\Mail\Mailer::class);
/*
|--------------------------------------------------------------------------
| Load The Application Routes
|--------------------------------------------------------------------------
|
| Next we will include the routes file so that they can all be added to
| the application. This will provide all of the URLs the application
| can respond to, as well as the controllers that may handle them.
|
*/

$app->router->group([
    'namespace' => 'App\Http\Controllers',
], function ($router) {
    require __DIR__.'/../routes/web.php';
});

return $app;
