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

        $newsController->get('/', 'Controllers\NewsController::getBestStories')->bind('homepage');
        $newsController->get('/news', 'Controllers\NewsController::getNewsItems')->bind('news');
        $newsController->get('/newest', 'Controllers\NewsController::getNewestItems')->bind('newest');
        $newsController->get('/comment', 'Controllers\NewsController::getComment')->bind('comment');
        $newsController->get('/show', 'Controllers\NewsController::getShowStories')->bind('show');
        $newsController->get('/ask', 'Controllers\NewsController::getAskStories')->bind('ask');
        $newsController->get('/jobs', 'Controllers\NewsController::getJobsStories')->bind('jobs');

        return $newsController;
    }
}