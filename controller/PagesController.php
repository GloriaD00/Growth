<?php
if(!isset($_SESSION))
{
    session_start();
}
class PagesController
{
    public function hme(){

        return view('index');

    }

    public function signup(){
        $errors=[
            'unmatching'=>false,
            'weak'=>false,
            'exists'=>false,
            'empty'=>false,
            'isEmail'=>false

        ];
        return view('signup',$errors);
    }


    public function login(){
        $data=[];


        if(isset($_SESSION['data'])) {
            $data = $_SESSION['data'];
            $data['error'] = false;
        }
        else{
            $data=[
                'first_visit'=>false,
                'error'=>false
            ];
        }


        unset($_SESSION['data']);


            return view('login', $data);

    }

    public function SWR(){
        return view('SWR');
    }

    public function success(){
        return view('success');
    }

    public function Profile($id){
        $err=[
            'old_fail'=>false,
            'unmatching_fail'=>false,
            'weak_fail'=>false,
            'unm_email'=>false,
            'is_email'=>false,
            'empty_ps'=>false,
            'empty_em'=>false


        ];

            $usr=App::get('query')->selectWhereSingle('Utenti',"id_utente='{$id['usr_id']}'",'User')[0];

        return view('settings', ["usr"=>$usr, "errors"=>$err]);
    }

    public function SuccessChange()
    {
        return view('success-change');
    }


}