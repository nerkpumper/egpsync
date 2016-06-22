<?php

require 'config.php';

require 'library/base/Request.php';
require 'library/base/RequestSelector.php';
require 'library/base/RequestController.php';
require 'library/base/RequestService.php';

require 'library/base/Inflector.php';
require 'library/base/Response.php';
require 'library/base/View.php';

require 'library/controllers/Controller.php';
require 'library/controllers/Service.php';
require 'library/entity/Entity.php';

require 'library/data/DB.php';
require 'library/data/DataAccess.php';

require 'src/bussines/managers/BaseManager.php';

if (empty($_GET['url']))
{
    $url = "";
}
else
{
    $url = $_GET['url'];
}

$requestRedirect = new RequestSelector($url);
$request = $requestRedirect->getRequest();
$request->execute();