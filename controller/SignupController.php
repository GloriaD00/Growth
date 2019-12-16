<?php
//require 'errors.php';

if(!isset($_SESSION))
{
    session_start();
}

class SignupController
{
    private $errors=[
    'unmatching'=>false,
    'weak'=>false,
    'exists'=>false,
     'empty'=>false,
        'isEmail'=>false

        ];
    private $data=[
        'Nome'=>'',
        'Cognome' =>'',
        'email'=>'',
        'pass'=>'',
        'checkPass'=>''
    ];




    public function extract(){

        $this->data['Nome']=$_POST['Nome'];
        $this->data['Cognome']=$_POST['Cognome'];
        $this->data['email']=$_POST['email'];
        $this->data['pass']=$_POST['Password'];
        $this->data['checkPass']=$_POST['confirm_password'];
        $this->errcheck($this->data);





    }

    private function errcheck($data){

            $this->errors['unmatching']=errors::unmatching($data['pass'],$data['checkPass']);
            $this->errors['weak']=errors::weak($data['pass']);
            $this->errors['exists']=errors::UserExists($data['email']);

            if(empty($data['Nome'])||empty($data['Cognome'])||empty($data['email'])||empty($data['pass'])||empty($data['checkPass']))
                $this->errors['empty']=true;
            $this->errors['isEmail']=errors::isEmail($data['email']);


            if(in_array(true,array_values($this->errors))){

                return view('signup', $this->errors);
            }
            else{
                $this->register($data);
            }

    }

    private function register($data){
        $insert=[

            'Nome'=>$data['Nome'],
            'Cognome'=>$data['Cognome'],
            'Email'=>$data['email'],
            'Password'=>$data['pass']

        ];

        App::get('query')->insert('Utenti',$insert);
        $_SESSION['data']=[
            'first_visit'=>true,
            'nome'=>$data['Nome']
        ];


        header('Location: /login');
    }




}