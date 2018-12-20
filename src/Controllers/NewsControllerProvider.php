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
 
        return $newsController;
    }
}