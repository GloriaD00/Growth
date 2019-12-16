<?php

if(!isset($_SESSION))
{
    session_start();
}
class LoginController
{
    private $data=[

        'email'=>'',
        'pass'=>'',

    ];



    public function extract(){


        $this->data['email']=$_POST['email'];
        $this->data['pass']=$_POST['password'];

        $this->errcheck($this->data);
    }

    private function errcheck($data){
        $condition="Email ='{$data['email']}' AND Password = '{$data['pass']}' ";
        $utenti=App::get('query')->selectWhere('Utenti',$condition);


        if(!empty($utenti)){
            $this->log($data);
        }
        else{
            return view('login', ['error'=>true, 'first_visit'=>false]);
        }

    }

    private function log($data){
        $_SESSION['login']=$data;

        header('Location: /user/home');
    }


}