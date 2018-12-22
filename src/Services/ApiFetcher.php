<?php

namespace Services;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class ApiFetcher
{
	// https://hacker-news.firebaseio.com/v0/topstories.json
	// topstories
	// newstories
	// beststories
	// askstories
	// showstories
	// jobstories
	
	private $typeArray = array(
		'topstories',
		'newstories',
		'beststories',
		'askstories',
		'showstories',
		'jobstories'
	);

	private $baseUrl = 'https://hacker-news.firebaseio.com/v0/';

  public function getItems($apiUrl)
  {
		$client = new Client();
		$res = $client->request('GET', $apiUrl);
		return $res;
  }

  public function getItemById($apiUrl, $id)
  {
		$client = new Client();
		$res = $client->request('GET', $apiUrl . $id . '.json');
		return $res;
  }

  public function getStories($dataType) 
  {
		$typeArray = $this->typeArray;
		if (!in_array($dataType, $typeArray)) {
			return;
		}

		$baseUrl = $this->baseUrl;
		$client = new Client();
		$res = $client->request('GET', $baseUrl . $dataType . '.json');
		return $res;
  }
}