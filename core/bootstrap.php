<?php

require 'App.php';
require 'database/QueryBuilder.php';
require 'database/Connection.php';
$configuration =require 'config.php';
App::bind('config', $configuration);

App::bind ('query', new QueryBuilder(Connection::make(App::get('config')['database'])));


function view($name, $data=[]){

    extract($data);


    return require'views/'.$name.'.view.php';
}


/*function redirect($path){


    header("Location : /{$path}");
}*/