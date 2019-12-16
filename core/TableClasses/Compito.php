<?php


class Compito
{
    private $id_task;
    private $cod_lista;
    private $Nome;
    private $descr;
    private $tag;
    private $due_date;


    public function __construct()
    {


    }

    public function getNome(){
        return $this->Nome;
    }

    public function getDueDate(){
        return $this->due_date;
    }

    public function getId(){
        return $this->id_task;
    }
    public function move(){

    }
    public function loadAssoc(){
        return App::get('query')->selectAssoc('Tasks', "id_task='{$this->id_task}'")[0];
    }

    public function delete(){

    }
    public function edit(){

    }
    public function complete(){

}


}