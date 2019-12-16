<?php

require 'vendor/autoload.php';
require 'core/bootstrap.php';
//require 'core/Request.php';
//require 'core/Router.php';




$uri = Request::uri();  //getting uri of the request
$parameters= Request::parameters();


//Router::load('routes.php')->direct($uri, Request::method());


  Router::load('routes.php')->direct($uri, Request::method(), $parameters);

