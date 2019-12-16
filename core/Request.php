<?php
//questa classe serve a farci tornare uri e metodo di richiesta

class Request
{
    public static function uri(){


        return trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');
    }


    public static function method(){
        return $_SERVER['REQUEST_METHOD'];
    }



      public static function parameters(){
            //die(var_dump($_GET));
        return $_GET;
     }







}