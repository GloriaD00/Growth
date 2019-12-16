<?php


class User
{
    public $id_utente;
    public $Nome;
    public $Cognome;

    public $Email;
    public $Password;


    public function __construct()
    {


    }

    /*public function __construct($id, $nome, $cognome,  $email, $pass)
    {
        $this->nome=$nome;
        $this->cognome=$cognome;

        $this->id=$id;

        $this->email=$email;

        $this->pass=$pass;

    }*/

    public function getName()
    {
        return $this->Nome;
    }

    public function creaProgetto($nome)
    {


    }

    public function loadPrjs()
    {


        return App::get('query')->selectWhereSingle('Progetti', "cod_utente='{$this->id_utente}'", 'Progetto');

    }

    public function getPrjAt($id){


        return App::get('query')->selectWhereSingle('Progetti',"cod_utente='{$this->id_utente}' AND id_proj='{$id}'", "Progetto");
    }
    public function getId(){
        return $this->id_utente;
    }

    public function getLN(){
        return $this->Cognome;
    }
    public function getEmail(){
        return $this->Email;
    }

    public function getPass()
    {

        return $this->Password;
    }
}


