<?php

namespace Services;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class ServiceCallerService
{

  private $url;
  private $data;

  function __construct($dataType, UrlMapperService $urlMapperService, ApiFetcherService $apiFetcherService) 
  { 
    // init services
    $this->url = $urlMapperService->getUrl($dataType);
    $this->data = $apiFetcherService->getData($this->url);
  } 

  public function getUrl()
  {
    return $this->url;
  }

  public function getData() 
  {
    return $this->data;
  }

  private function itemLoopFetcher($data) { 
    /* 
      refetch the data in while loop until there's no
        return template with resulte
    */
    foreach ($data as $item) {
      return item;
    }
  }
}