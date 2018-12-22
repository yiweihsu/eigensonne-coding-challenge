<?php

use Services\ApiFetcherService;
use Services\UrlMapperService;
use Services\DataProcessorService;
use Services\ServiceCallerService;
use GuzzleHttp\Client;

$app['api.fetcher.service'] = function ($app) {
  return new ApiFetcherService();
};

$app['url.mapper.service'] = function ($app) {
  return new UrlMapperService();
};

$app['data.processor.service'] = function ($app) {
  return new DataProcessorService();
};

$app['service.caller.service'] = function ($app) {
  return new ServiceCallerService();
};