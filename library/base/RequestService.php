<?php

class RequestService extends Request
{

    protected $url;
    protected $service;
    protected $defaultService = 'home';
    protected $action;
    protected $defaultAction = 'index';
    protected $params = array();

    public function __construct($url)
    {
        $this->url = $url;

        $segments = explode('/', $this->getUrl());
        $this->resolveService($segments);
        $this->resolveAction($segments);
        $this->resolveParams($segments);
    }


    public function resolveService(&$segments)
    {
        //Remove the first element
        array_shift($segments);

        $this->service = array_shift($segments);

        if (empty($this->service))
        {
            $this->service = $this->defaultService;
        }
    }

    public function resolveAction(&$segments)
    {
        $this->action = array_shift($segments);

        if (empty($this->action))
        {
            $this->action = $this->defaultAction;
        }
    }

    public function resolveParams(&$segments)
    {
        $this->params = $segments;
    }

    public function getUrl()
    {
        return $this->url;
    }

    public function getService()
    {
        return $this->service;
    }

    public function getServiceClassName()
    {
        return Inflector::camel($this->getService()) . 'Service';
    }

    public function getServiceFileName()
    {
        return 'api/' . $this->getServiceClassName() . '.php';
    }

    public function getAction()
    {
        return $this->action;
    }

    public function getActionMethodName()
    {
        return Inflector::lowerCamel($this->getAction()) . 'Action';
    }

    public function getParams()
    {
        return $this->params;
    }

    public function execute()
    {
        $serviceClassName = $this->getServiceClassName();
        $serviceFileName  = $this->getServiceFileName();
        $actionMethodName    = $this->getActionMethodName();
        $params              = $this->getParams();

        if ( ! file_exists($serviceFileName))
        {
            exit('servicio no existe');
        }

        require $serviceFileName;

        $service = new $serviceClassName();

        if(!$service instanceof Service)
            exit("The service class '$serviceClassName ' must inherit from the controllers/Service class");

        $response = call_user_func_array([$service, $actionMethodName], $params);

        $this->executeResponse($response);
    }

    public function executeResponse($response)
    {

        if ($response instanceof Response)
        {
            exit('Invalid Response ');
        }
        elseif (is_string($response))
        {
            echo $response;
        }
        elseif(is_array($response))
        {
            header('Content-Type: application/json; charset=utf8');
            echo json_encode($response);
        }
        else
        {
            exit('Invalid Response ');
        }
    }


}