<?php

if(!isset($_SESSION))
{
    session_start();
}
class UserController
{

    private $User;
    private $projects=[];

    private $projArr=[];




    public function load(){

        $this->retrive();
        $this->projects=$this->User[0]->loadPrjs();

        $_SESSION['User']=$this->User[0];
        $_SESSION['Projetcs']=$this->projects;


        return view('user-home', ['projects'=>$this->projects, 'nome'=>$this->User[0]->getName(), 'id'=>$this->User[0]->getId()]);
    }

    private function retrive(){
        $temp_mail=$_SESSION['login']['email'];
        $condition="Email ='{$temp_mail}' ";

        $this->User=App::get('query')->selectWhereSingle('Utenti',$condition,'User');

    }

    public function Add(){

        $User=$_SESSION['User'];
        $this->projArr['cod_utente']=$User->getId();
        if($_POST['NomeProj']==''){
            $this->projArr['NomeProj']='Untitled';
        }
        else
             $this->projArr['NomeProj']=$_POST['NomeProj'];

        App::get('query')->insert('Progetti',$this->projArr);
        $proj=App::get('query')->selectWhereSingle('Progetti', "id_proj=(SELECT MAX(Id_proj) FROM Progetti WHERE cod_utente = '{$User->getId()}')",'Progetto')[0];
        $list1=[
            'Scala'=>'1',
            'cod_proj'=>$proj->getId(),
            'nome'=>'To do'

        ];
        $list2=[
            'Scala'=>'2',
            'cod_proj'=>$proj->getId(),
            'nome'=>'In progess'


        ];
        $list3=[
            'Scala'=>'100',
            'cod_proj'=>$proj->getId(),
            'nome'=>'Completed'
        ];
        //WHERE ID = (SELECT MAX(ID) FROM bugs WHERE user = 'me')
        App::get('query')->insert('Liste',$list1);
        App::get('query')->insert('Liste',$list2);
        App::get('query')->insert('Liste',$list3);




        //$_SESSION['NomeP']=$this->projArr['NomeProj'];
        $_SESSION['IdProj']=$proj->getId();
        header("Location: /user/project/view/?proj_id={$proj->getId()}");

    }

    public function ChangePass(){
        $oldPass=$_POST['old-pass'];
        $newPass=$_POST['new-pass'];
        $confirmPass=$_POST['confirm-pass'];
        $usrId=$_POST['usr'];
        $usr=App::get('query')->selectWhereSingle('Utenti', "id_utente='{$usrId}'",'User')[0];
        $err=[
            'old_fail'=>false,
            'unmatching_fail'=>false,
            'weak_fail'=>false,
            'unm_email'=>false,
            'empty_ps'=>false

        ];

            if(errors::unmatching($usr->getPass(),$oldPass)){
                $err['old_fail']=true;
            }
            if(errors::unmatching($confirmPass,$newPass)){
                $err['unmatching_fail']=true;
            }
            if(errors::weak($newPass) || $newPass==""){
                $err['weak_fail']=true;
            }

            if($oldPass==""|| $newPass==""||$confirmPass==""){
                $err['empty_ps']=true;
            }




        if(!$err['old_fail'] && !$err['unmatching_fail'] &&  !$err['weak_fail'] && !$err['empty_ps']){
            App::get('query')->modify($newPass,'Password', 'Utenti',"id_utente='{$usrId}'");
            header('Location: /success-change');
        }
        else{
            return view('settings', ["errors"=>$err, 'usr'=>$usr]);

        }



    }

    public function EmailChange(){
        $email=$_POST['new-email'];
        $confirm=$_POST['confirm-email'];
        $usrId=$_POST['usr'];
        $usr=App::get('query')->selectWhereSingle('Utenti', "id_utente='{$usrId}'",'User')[0];


        $err=[
            'old_fail'=>false,
            'unmatching_fail'=>false,
            'weak_fail'=>false,
            'unm_email'=>false,
            'is_email'=>false,
            'empty_ps'=>false,
            'empty_em'=>false


        ];

                if(errors::unmatching($email,$confirm)){
                    $err['unm_email']=true;
                }
                if(errors::isEmail($email)){
                    $err['is_email']=true;
                }
                if($email==""|| $confirm==""){
                    $err['empty_em']=true;
                }
                 if(!$err['unm_email'] && !$err['is_email'] &&  !$err['empty_em']){
                    App::get('query')->modify($email,'Email', 'Utenti',"id_utente='{$usrId}'");
                    header('Location: /success-change');

        }
        else{
            return view('settings', ["errors"=>$err, 'usr'=>$usr]);

        }

             /*if(!errors::unmatching($email,$confirm) && $email!=""){
                 App::get('query')->modify($email,'Email', 'Utenti',"id_utente='{$usrId}'");
                 header('Location: /success-change');

             }
             else{
                 $err['unm_email']=true;
                 return view('settings', ["errors"=>$err, 'usr'=>$usr]);
             }*/




    }

    public function logout(){
        session_destroy();
        header('Location: /');
    }

    public function deleteUser($id){
        $idU=$id['usr_id'];
        App::get('query')->delete('Utenti',"id_utente={$idU}");
    }



}