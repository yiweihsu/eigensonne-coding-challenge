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
    public function getPosts()
    {

        $blogPosts = array(
            1 => array(
                'date'      => '2011-03-29',
                'author'    => 'igorw',
                'title'     => 'Using Silex',
                'body'      => '...',
            ),
        );

        $output = '';
        foreach ($blogPosts as $post) {
            $output .= $post['title'];
            $output .= '<br />';
        }

        return $output;
    }

    public function getTopstories()
    {
        $client = new Client();
        $res = $client->request('GET', 'https://hacker-news.firebaseio.com/v0/user/jl.json');
        echo $res->getStatusCode();
        echo $res->getHeader('content-type');
        return $res->getBody();
    }

    public function getItems(Application $app)
    {
        $apiFetcher = $app['api.fetcher'];

        try {
            $result = $apiFetcher->getItems('https://hacker-news.firebaseio.com/v0/user/jl.json');
        } catch(GuzzleException $exception) {
            return $exception;
        } catch (NotFoundHttpException $exception) {
            return $exception;
        } catch (\Exception $exception) {
            return $exception;
        }

        return $result;
    }
}