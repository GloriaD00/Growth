<?php


class ListController
{

    public function Add(){
        $param=[
            'cod_lista'=>$_POST['list_id'],
            'Nome'=>$_POST['taskName'],
            'descr'=>$_POST['desc'],
            'due_date'=>$_POST['dueDate']

        ];

        if($param['Nome']=="")
            $param['Nome']='Untitled';



        App::get('query')->insert('Tasks',$param);
        header("Location: /user/project/view/?proj_id={$_SESSION['id_proj']}");

    }

    public function edit(){
        $newName=$_POST['mod'][0]['value'];
        $newPrior=$_POST['mod'][1]['value'];
        $listID=$_POST['list'];

        if($newName=="")
            echo 'oops something went wrong';
        else if( empty(App::get('query')->selectWhere('Liste',"nome='{$newName}'")) &&
        App::get('query')->modify($newName,'nome','Liste',"id_lista='{$listID}'") &&
        App::get('query')->modify($newPrior,'Scala','Liste',"id_lista='{$listID}'") )
            echo 'success';
        else
            echo 'oops something went wrong';


    }

    public function Delete($id){
        App::get('query')->delete('Liste',"id_lista='{$id['list_id']}'");
        header('Location: /user/project/view/?proj_id='.$id['proJ_id']);
    }
}