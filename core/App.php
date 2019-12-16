<?php


class App
{
    protected static $registry;

    public static function bind($key, $value){

          static::$registry[$key]=$value; //associa in registry un valore a key, il valore puo anche essere un array
    }

    public static function get($key){


        if (!array_key_exists($key, static::$registry)){

            throw new Exception("no {$key} is bound in the array");  //se in registry esiste una key allora ne ritorna il valore

        }
        return static::$registry[$key];

    }



}