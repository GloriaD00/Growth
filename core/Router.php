<?php

require 'controller/PagesController.php';
require 'controller/SignupController.php';
class Router
{
    protected $routes=[

        "GET"=>[],
        "POST"=>[]

    ];



    public  function get($uri, $controller){

        $this->routes['GET'][$uri]=$controller;

    }
    public  function post($uri, $controller){

        $this->routes['POST'][$uri]=$controller;


    }


    public static function load($file){
        $router = new static;

        require $file;

        return $router;
    }

//    public function direct($uri, $callType){
//        // if(array_key_exists($uri, $routes[$callType])){
//        // 	return $this->routes[$callType][$uri];
//        // }
//        // throw new Exception("no route defined for this uri");
//
//
//
//
//
//            $this->callAction(
//                ...explode('@', $this->routes[$callType][$uri])
//
//
//            );
//
//    }
//
//
//    protected function callAction($controller, $action){
//        $controller= new $controller;
//
//
//        if(!method_exists($controller, $action)){
//            throw new Exception("no such method for this request");
//
//        }
//
//
//
//                return $controller->$action();
//
//
//    }

      public function direct($uri, $callType, $parameters=[]){



            $function=explode('@', $this->routes[$callType][$uri])[1];
            $controller=explode('@', $this->routes[$callType][$uri])[0];



            $this->callAction($controller,$function,$parameters);

    }


    protected function callAction($controller, $action,$parameters=[]){
        $controller= new $controller;


        if(!method_exists($controller, $action)){
            throw new Exception("no such method for this request");

        }

                if(empty($parameters)){
                     return $controller->$action();
                    }
                   else{
                    return($controller->$action($parameters));
                   }


    }


}