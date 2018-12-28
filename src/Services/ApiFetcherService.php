<?php

namespace Services;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Exception\GuzzleException;

class ApiFetcherService
{
	public function getData($url) {
		$client = new Client();
		$res = $client->request('GET', $url);
		return $res;
	}

	public function getDataContents($url) {
		$client = new Client();
		$res = $client->request('GET', $url);
		return $res->getBody();
	}
}