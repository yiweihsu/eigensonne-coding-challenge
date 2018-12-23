<?php

use Services\UrlMapperService;
use Services\ApiFetcherService;
use Services\ServiceCallerService;
use GuzzleHttp\Client;

$app['url.mapper.service'] = function ($app) {
  return new UrlMapperService();
};

$app['api.fetcher.service'] = function ($app) {
  return new ApiFetcherService();
};

$app['service.caller.service'] = function ($app) {
  return new ServiceCallerService($app['url.mapper.service'], $app['api.fetcher.service']);
};