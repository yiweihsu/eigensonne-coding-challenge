<?php

namespace Services;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class ApiFetcherService
{
	public function getData($url) {
		$client = new Client();
		$res = $client->request('GET', $url);
		return $res;
	}
}