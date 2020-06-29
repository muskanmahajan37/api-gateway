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
$app->middleware([
    App\Http\Middleware\CorsMiddleware::class
]);


$app->router->group([
    'namespace' => 'App\Http\Controllers',
], function ($router) {
    require __DIR__.'/../routes/web.php';
});

return $app;
