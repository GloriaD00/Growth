<?php


class Progetto
{
    private $id_proj;
    private $cod_utente;
    private $NomeProj;


   /* public function __construct($nome, $cod_utente, $id)
    {
        $this->nome=$nome;
        $this->cod_utente=$cod_utente;

        $this->id=$id;



    }*/

   public function __construct()
   {
   }

    public function createList(){

    }
    public function deleteList(){

    }

    public function getName(){
       return $this->NomeProj;
    }

    public function loadLists(){
        return App::get('query')->selectWhereSingle('Liste', "cod_proj='{$this->id_proj}'", 'Lista');
    }

    public function getId(){
       return $this->id_proj;
    }

    public function setName($name){
       $this->NomeProj=$name;
    }
}