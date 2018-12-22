<?php

use Services\ApiFetcherService;
use GuzzleHttp\Client;

$app['api.fetcher.service'] = function ($app) {
  return new ApiFetcherService();
};