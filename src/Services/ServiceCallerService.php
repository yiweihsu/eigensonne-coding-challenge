<?php

namespace Services;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class ServiceCallerService
{
  private $urlMapperService;
  private $apiFetcherService;

  function __construct(UrlMapperService $urlMapperService, ApiFetcherService $apiFetcherService) 
  { 
    // init services
    $this->urlMapperService = new UrlMapperService();
    $this->apiFetcherService = new ApiFetcherService();
  } 

  public function getItemArrayForController($dataType) 
  {
    $url = $this->urlMapperService->getUrl($dataType);
    $data = $this->apiFetcherService->getData($url);
    $jsonData = json_decode($data->getBody(), TRUE);

    if(!isset($_SERVER['REQUEST_URI'])) {
      // only for unit test
      $pageParams = 2;
    } else {
      // limit the amount of data retrival depending on the page
      $pageParams = basename($_SERVER['REQUEST_URI']);
    }

    $pageNum = (int) substr($pageParams, -1);
    // var_dump($pageNum);
    $beginIndexOfArray = 0;
    if ($pageNum > 1) {
      $beginIndexOfArray = ($pageNum - 1) * 10;
    }

    $resultForTemplate = $this->itemLoopFetcher($jsonData, $beginIndexOfArray);
    return $resultForTemplate;
  }

  private function itemLoopFetcher($data, $beginIndexOfArray) { 
    $dataArr = [];
    $i = $beginIndexOfArray;

    while($i < $beginIndexOfArray + 10) {

      // check if there's still data 
      if (empty($data[$i])) {
        if (count($dataArr) > 0) {
          return $dataArr;
        }
        return; // TODO return a non-data template
      }

      $itemUrl = $this->urlMapperService->getItemUrl($data[$i]);
      $result = $this->apiFetcherService->getData($itemUrl);
      $jsonResult = json_decode($result->getBody(), TRUE);
      $dataArr[$i] = $jsonResult;
      $i++;
    }

    // var_dump($dataArr); 
    return $dataArr;
  }
}