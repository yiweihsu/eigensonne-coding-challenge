<?php

namespace App\tests\Services;

use Services\ApiFetcher;
use PHPUnit\Framework\TestCase;

class ApiFetcherTest extends TestCase 
{
    private $apiFetcherService;

    public function setUp()
    {
        $this->apiFetcherService = new ApiFetcher;
    }

    public function testGetItems()
    {
        $data = $this->apiFetcherService->getItems('https://hacker-news.firebaseio.com/v0/item/8863.json');
        $this->assertEquals('object', gettype($data));
        $this->assertEquals(200, $data->getStatusCode());
        
        // TODO filter the data
        $this->assertEquals('{"by":"dhouston","descendants":71,"id":8863,"kids":[9224,8952,8917,8884,8887,8869,8940,8908,8958,9005,8873,9671,9067,9055,8865,8881,8872,8955,10403,8903,8928,9125,8998,8901,8902,8907,8894,8870,8878,8980,8934,8943,8876],"score":104,"time":1175714200,"title":"My YC app: Dropbox - Throw away your USB drive","type":"story","url":"http://www.getdropbox.com/u/2/screencast.html"}', $data->getBody()->getContents());
    }

    public function testGetItemById()
    {
        $data = $this->apiFetcherService->getItemById('https://hacker-news.firebaseio.com/v0/item/', '8863');
        $this->assertEquals('object', gettype($data));
        $this->assertEquals(200, $data->getStatusCode());
        
        // TODO filter the data
        $this->assertEquals('{"by":"dhouston","descendants":71,"id":8863,"kids":[9224,8952,8917,8884,8887,8869,8940,8908,8958,9005,8873,9671,9067,9055,8865,8881,8872,8955,10403,8903,8928,9125,8998,8901,8902,8907,8894,8870,8878,8980,8934,8943,8876],"score":104,"time":1175714200,"title":"My YC app: Dropbox - Throw away your USB drive","type":"story","url":"http://www.getdropbox.com/u/2/screencast.html"}', $data->getBody()->getContents());
    }

    public function testGetStories()
    {
        $data = $this->apiFetcherService->getStories('topstories');
        $this->assertEquals('object', gettype($data));
        $this->assertEquals(200, $data->getStatusCode());
        // TODO testing assert contexts
    }
}