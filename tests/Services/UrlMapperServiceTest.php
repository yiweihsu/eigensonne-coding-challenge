<?php

namespace App\tests\Services;

use Services\UrlMapperService;
use PHPUnit\Framework\TestCase;

class UrlMapperServiceTest extends TestCase 
{
    private $urlMapperService;

    public function setUp()
    {
        $this->urlMapperService = new UrlMapperService();
    }

    public function testGetUrl()
    {
        $url = $this->urlMapperService->getUrl('ask');
        $this->assertEquals('string', gettype($url));
        $this->assertEquals('https://hacker-news.firebaseio.com/v0/askstories.json', $url);
    }

    public function testGetItemUrl()
    {
      $url = $this->urlMapperService->getItemUrl(126809);
      $this->assertEquals('string', gettype($url));
      $this->assertEquals('https://hacker-news.firebaseio.com/v0/item/126809.json', $url);
    }

    public function testGetStoryUrl()
    {
      $url = $this->urlMapperService->getUserUrl('jl');
      $this->assertEquals('string', gettype($url));
      $this->assertEquals('https://hacker-news.firebaseio.com/v0/user/jl.json', $url);
    }
}