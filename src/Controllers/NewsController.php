<?php

namespace Controllers;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use GuzzleHttp\Client;

class NewsController
{
    // protected $newsService;

    // protected $blogPosts = array(
    //     1 => array(
    //         'date'      => '2011-03-29',
    //         'author'    => 'igorw',
    //         'title'     => 'Using Silex',
    //         'body'      => '...',
    //     ),
    // );

    // public function __construct($blogPosts)
    // {
    //     $this->blogPosts = $blogPosts;
    // }

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

    public function getPostById($id)
    {
        if (!isset($blogPosts[$id])) {
            $app->abort(404, "Post $id does not exist.");
        }
    
        $post = $blogPosts[$id];
    
        return  "<h1>{$post['title']}</h1>".
                "<p>{$post['body']}</p>" . 
                $id;
    }

    public function getFeedback(Request $request)
    {
        $message = $request->get('message');
        mail('feedback@yoursite.com', '[YourSite] Feedback', $message);
    
        return new Response('Thank you for your feedback!', 201);
    }

    public function getTopstories(Request $request)
    {
        $client = new GuzzleHttp\Client();
        $res = $client->request('GET', 'https://hacker-news.firebaseio.com/v0/user/jl.json');
        echo $res->getStatusCode();
        echo $res->getHeader('content-type');
        echo $res->getBody();
    }

}