<?php


class Lista
{
    private $id_lista;
    private $Scala;
    private $cod_proj;
    private $nome;

    public function __construct()
    {
    }

    public function getNome(){
        return $this->nome;
    }

    public function loadCompiti(){
        return App::get('query')->selectWhereSingle('Tasks', "cod_lista='{$this->id_lista}'",'Compito');
    }

    public function loadAssoc(){
        return App::get('query')->selectAssoc('Tasks', "cod_lista='{$this->id_lista}'");
    }

    public function getId(){
        return $this->id_lista;
    }
    public function getScala(){
        return $this->Scala;
    }
}