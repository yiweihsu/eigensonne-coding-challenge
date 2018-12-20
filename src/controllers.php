<?php

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

// Request::setTrustedProxies(array('127.0.0.1'));

// register routes with controllers
// reference: https://silex.symfony.com/doc/2.0/providers.html#controller-providers

// $app->get('/', function () use ($app) {
//     return $app['twig']->render('index.html.twig', array());
// })
// ->bind('homepage');

$app->mount('/', new Controllers\NewsControllerProvider());

$app->error(function (\Exception $e, Request $request, $code) use ($app) {
    if ($app['debug']) {
        return;
    }

    // 404.html, or 40x.html, or 4xx.html, or error.html
    $templates = array(
        'errors/'.$code.'.html.twig',
        'errors/'.substr($code, 0, 2).'x.html.twig',
        'errors/'.substr($code, 0, 1).'xx.html.twig',
        'errors/default.html.twig',
    );

    return new Response($app['twig']->resolveTemplate($templates)->render(array('code' => $code)), $code);
});
