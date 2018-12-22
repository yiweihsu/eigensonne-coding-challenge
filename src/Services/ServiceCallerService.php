<?php

namespace Services;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class DataCallerService
{
  private $dataType;
  private $url;
  private $data;
  private $result;

  function __construct($dataType, UrlMapperService $urlMapperService, ApiFetcherService $apiFetcherService, DataProcessorService $dataProcessorService) 
  { 
    $this->dataType = $dataType;
    $this->url = $urlMapperService->getUrl(dataType);
    $this->data = $apiFetcherService->getData(url);
    $this->result = $dataProcessorService->getResult(data);
  } 

  public function getNewsTemplate() {
    /* 
      /
      /news
      /newest
    */

    // return result;
  }


  public function getStoriesTemplate()
  {
    /*
      /show
      /ask
    */
  }

  public function getCommentsTemplate()
  {
    // /comments
  }

  public function getJobsTemplate()
  {
    // /job
  }
}