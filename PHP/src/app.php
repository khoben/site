<?php
use Silex\Application;
use Silex\Provider\TwigServiceProvider;
use Silex\Provider\DoctrineServiceProvider;

$app->register(new DoctrineServiceProvider(),
['db.options' => ['driver' => 'pdo_mysql', 'dbname' => 'spec_car_tech', 'charset' => 'utf8']]);
$app->register(new TwigServiceProvider(), [
    'twig.path' => [__DIR__.'/views'],
    'twig.options' => ['cache' => __DIR__.'/../cache/twig'],
]);

$app['debug'] = true;

return $app;