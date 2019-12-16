<?php


class errors
{


    public static function unmatching($pass1, $pass2){
        return($pass1!=$pass2);   //se sono uguali ritorna falso

    }
    public static function weak($pass){
        return (strlen($pass)<8 && !strpbrk($pass, '1234567890') && !(strpbrk($pass, 'ABCDEFGHIJKLMNOPQRSTUVWXYZ')));//&& preg_match("/[A-Z]/", $pass)!==0);
    }

    public static function UserExists($email){

        $db=App::get('query');
        $utenti=$db->selectWhere('Utenti', "Email='{$email}'");

        return(count($utenti)!=0);


    }

    public static function isEmail($email){
        return stripos($email,'@')===false && strpos(strstr($email, '@'),'.')===false;
    }





}