<?php

namespace App\tests\Services;

use Services\ServiceCallerService;
use Services\UrlMapperService;
use Services\ApiFetcherService;
use PHPUnit\Framework\TestCase;

class ServiceCallerServiceTest extends TestCase 
{
    private $serviceCallerService;

    public function setUp()
    {
        $this->serviceCallerService = new serviceCallerService(new UrlMapperService(), new ApiFetcherService());
    }

    public function testGetItemArrayForController()
    {
        $itemArray = $this->serviceCallerService->getItemArrayForController('best');
        $this->assertEquals('array', gettype($itemArray));
    }
}