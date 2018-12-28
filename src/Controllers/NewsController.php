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
    private function printTemplateWithData(Application $app, $data, $pathName) {
        // var_dump($data);   
        
        $page = !isset($_GET['p']) ? 1 : $_GET['p'];
        $nextPage = $app['url_generator']->generate($pathName, array('p' => $page + 1));

        return $app['twig']->render('item.html.twig', [
            'data' => $data,
            'nextPage'=> $nextPage
        ]);
    }

    public function getBestStories(Application $app)
    {
        $serviceCaller = $app['service.caller.service'];
        $data = $serviceCaller->getItemArrayForController('best');
        return $this->printTemplateWithData($app, $data, 'homepage'); // link with controller provider name
    }

    public function getNewsItems(Application $app)
    {
        $serviceCaller = $app['service.caller.service'];
        $data = $serviceCaller->getItemArrayForController('top');
        return $this->printTemplateWithData($app, $data, 'news');
    }

    public function getNewestItems(Application $app)
    {
        $serviceCaller = $app['service.caller.service'];
        $data = $serviceCaller->getItemArrayForController('new');
        return $this->printTemplateWithData($app, $data, 'newest');
    }

    // TODO 
    public function getComment(Application $app)
    {
        $serviceCaller = $app['service.caller.service'];
        $data = $serviceCaller->getItemArrayForController('newcomments');
        return $this->printTemplateWithData($app, $data);
    }

    public function getShowStories(Application $app)
    {
        $serviceCaller = $app['service.caller.service'];
        $data = $serviceCaller->getItemArrayForController('show');
        return $this->printTemplateWithData($app, $data, 'show');
    }

    public function getAskStories(Application $app)
    {
        $serviceCaller = $app['service.caller.service'];
        $data = $serviceCaller->getItemArrayForController('ask');
        return $this->printTemplateWithData($app, $data, 'ask');
    }

    // TODO
    public function getJobsStories(Application $app)
    {
        $serviceCaller = $app['service.caller.service'];
        $data = $serviceCaller->getItemArrayForController('job');
        return $this->printTemplateWithData($app, $data);
    }
}