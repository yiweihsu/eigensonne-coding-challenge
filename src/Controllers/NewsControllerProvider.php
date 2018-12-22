<?php

namespace Controllers;

use Silex\Api\ControllerProviderInterface;
use Silex\Application;
use Silex\ControllerCollection;

class NewsControllerProvider implements ControllerProviderInterface
{
    public function connect(Application $app)
    {
        $newsController = $app['controllers_factory'];
        $newsController->get('/', 'Controllers\NewsController::getPosts')->bind('homepage');
        // $newsController->get('/news', 'Controllers\NewsController::getPosts')->bind('homepage');
        $newsController->get('/feed', 'Controllers\NewsController::getTopstories')->bind('feed');
        $newsController->get('/items', 'Controllers\NewsController::getItems')->bind('items');

        // define routers here

        return $newsController;
    }
}