<?php

use Services\ApiFetcher;
use GuzzleHttp\Client;

$app['api.fetcher'] = function ($app) {
  return new ApiFetcher();
};