<?php

namespace Controllers;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class NewsController
{
    // public function getItems(Application $app)
    // {
    //     $ApiFetcherService = $app['api.fetcher.service'];
    //     return $result;
    // }

    public function getBestStories(Application $app)
    {
        // ServiceCallerService->getItem('best');
        // something like this
    }

    public function getNewsItems(Application $app)
    {
    }

    public function getNewestItems(Application $app)
    {
    }

    public function getComment(Application $app)
    {
    }

    public function getShowStories(Application $app)
    {
    }

    public function getAskStories(Application $app)
    {
    }

    public function getJobsStories(Application $app)
    {
    }
}