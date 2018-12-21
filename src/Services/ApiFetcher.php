<?php

namespace Services;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class ApiFetcher
{
	private $typeArray = array(
		'topstories',
		'newstories',
		'beststories',
		'askstories',
		'showstories',
		'jobstories'
	);

  public function getItems($apiUrl)
  {
		$client = new Client();
		$res = $client->request('GET', $apiUrl);
		return $res->getBody();
  }

  public function getItemById($baseUrl, $id)
  {
		$client = new Client();
		$res = $client->request('GET', $apiUrl . '/' . $id);
		return $res->getBody();
  }

  public function getStories($dataType) 
  {
		// https://hacker-news.firebaseio.com/v0/topstories.json
		// topstories
		// newstories
		// beststories
		// askstories
		// showstories
		// jobstories

		if (!in_array($dataType, $typeArray)) {
			return;
		}


  }
}