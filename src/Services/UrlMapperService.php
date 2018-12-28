<?php

namespace Services;

class UrlMapperService
{  
	private $baseUrl = 'https://hacker-news.firebaseio.com/v0/';
  private $category;

  public function getUrl($category) {
    $this->category = $category;
    switch ($category) {
      case 'best':  // root url
      case 'new':
      case 'top':
      case 'show':
      case 'ask':
      case 'job':
        $url = $this->getStoryUrl($category);
        break;
      case 'newcomments':
        $url = $this->getCommentUrl();
        break;
      default:
        break;
    }
    return $url;
  }

  public function getItemUrl($id)
  {
    // items
    // https://hacker-news.firebaseio.com/v0/item/126809.json
    $url = $this->baseUrl . 'item/' . $id . '.json';
    return $url;
  }

  public function getStoryUrl($category)
  {
    /*
      top
      newest
      best
      ask
      show
      job
    */
    // https://hacker-news.firebaseio.com/v0/askstories.json
    $url = $this->baseUrl . $category . 'stories.json';
    return $url;
  }

  public function getUserUrl($id)
  {
    // https://hacker-news.firebaseio.com/v0/user/jl.json
    $url = $this->baseUrl . 'user/' . $id . '.json';
    return $url;
  }

  private function getCommentUrl()
  {
    // users
  }
}