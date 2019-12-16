<?php


class Connection
{

    public static function make($database){

        try{
            $pdo= new PDO($database['connection'] .';dbname=' . $database['name'],$database['user'],$database['password']);
            return $pdo;
        }
        catch(PDOException $e){

            die($e->getMessage());
        }

    }
}