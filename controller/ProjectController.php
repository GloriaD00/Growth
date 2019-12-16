<?php

if(!isset($_SESSION))
{
    session_start();
}

class ProjectController
{

    private $User;
    private $project;
    private $lists;
    private $param=[];



    public function load(){
        $this->User=$_SESSION['User'];

        $this->project=$this->User->getPrjAt($_SESSION['IdProj'])[0];

        $this->lists=$this->project->loadLists();

        $this->prepare();
        $_SESSION['enc_arr']=$this->encode($this->lists);


        return view('progetto',$this->param);

    }

    private function prepare(){
        $this->param['Nome_utente']=$this->User->getName();
        $this->param['Liste']=$this->lists;
        $this->param['Nome_progetto']= $this->project->getName();
        $this->param['id_proj']=$this->project->getId();

    }

    public function view($id){
        $this->project=App::get('query')->selectWhereSingle('Progetti',"id_proj='{$id['proj_id']}'",'Progetto')[0];
        $this->lists=$this->project->loadLists();
        $this->lists= $this->order($this->lists);

        $this->param['Liste']=$this->lists;
        $this->param['Nome_progetto']= $this->project->getName();
        $this->param['id_proj']=$this->project->getId();

        $_SESSION['id_proj']=$this->project->getId();


        $_SESSION['enc_arr']=$this->encode($this->lists);

        return view('progetto',$this->param);


    }

    public function delete($id){
        App::get('query')->delete('Progetti',"id_proj='{$id['proj_id']}'");
        header('Location: /user/home');

    }

    public function Add(){
        $data=[
            'Scala'=>$_POST['priority'],
            'cod_proj'=>$_POST['id_proj'],
            'nome'=>$_POST['NomeLista']
        ];

        $this->User=$_SESSION['User'];
        $this->project=$this->User->getPrjAt($data['cod_proj'])[0];
        $this->lists=$this->project->loadLists();

        if($_POST['NomeLista']==''){
            $data['nome']='Untitled';
        }



        for($i=0; $i<count($this->lists);$i++){
            if($this->lists[$i]->getNome()==$data['nome']) {
                $_SESSION['enc_arr']=$this->encode($this->lists);

                header("Location: /user/project/view/?proj_id={$_POST['id_proj']}");
                return;
            }

        }


        App::get('query')->insert('Liste',$data);
        $this->encode($this->lists);
        $_SESSION['enc_arr']=$this->encode($this->lists);
        header("Refresh:0; url=/user/project/view/?proj_id={$_POST['id_proj']}");

    }

 private function order($arr){
    $num=count($arr);
    $support=0;
    for($i=0; $i<$num;$i++){
        for($j=0; $j<$num-1;$j++){
            if($arr[$j]->getScala()>$arr[$j+1]->getScala()){
                $support=$arr[$j];
                $arr[$j]=$arr[$j+1];
                $arr[$j+1]=$support;
            }
        }
    }
    return $arr;
 }


 /*public function Share(){

        $email=$_POST['usrEmail'];
        $usr= App::get('query')->selectWhereSingle('Utenti',"email='{$email}'",'User')[0];

        if($usr==null){
            header("Location: /something-went-wrong");

        }
        else {
            $usr_id=$usr->getId();
            $proj=App::get('query')->selectWhereSingle('Progetti', "id_proj='{$_POST['proj_id']}'",'Progetto')[0];

            $data = [
                'cod_utente' => $usr_id,
                'NomeProj' => $proj->getName()

            ];

            App::get('query')->insert('Progetti',$data);
            header("Location: /success");

        }



 }*/



 public function Modify(){
        $nome=$_POST['newName'];
        $id=$_POST['proj_id'];

        $proj=App::get('query')->selectWhereSingle('Progetti', "id_proj='{$id}'",'Progetto')[0];

     App::get('query')->modify($nome,'NomeProj', 'Progetti',"id_proj='{$id}'");
     header("Location: /user/home");

 }
private function encode($lists){
        $enc_arr=[];

        for($i=0; $i<count($lists);$i++){
            $tasks=$lists[$i]->loadCompiti();
            $k=0;
            while($k<count($tasks)) {
                $enc_arr[$tasks[$k]->getId()] = $tasks[$k]->loadAssoc();
                $k++;
            }
        }


    return $enc_arr;


}


}