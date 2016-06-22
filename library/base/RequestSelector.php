<?php

class RequestSelector
{
    private $url;

    public function __construct($url)
    {
        $this->url = $url;
    }

    public function getUrl()
    {
        return $this->url;
    }

    public function getRequest()
    {
        $segments = explode('/', $this->getUrl());
        if($segments[0]=='api')
            return new RequestService($this->url);
        else
            return new RequestController($this->url);
    }

}