<?php


class TaskController
{


    public function delete($id)
    {
        App::get('query')->delete('Tasks', "id_task='{$id['id_task']}'");
        header('Location: /user/project/view/?proj_id=' . $id['id_proj']);

    }

    public function move()
    {
        $id = $_POST['task'];
        $lista = $_POST['list'][0]['value'];

        $retrived = App::get('query')->selectWhereSingle('Liste', "nome='{$lista}'", 'Lista')[0];

        if (!empty($retrived)) {
            $lista = $retrived;
            if (App::get('query')->modify($lista->getId(), 'cod_lista', 'Tasks', "id_task='{$id}'"))
                echo 'Success';
            else
                echo 'oops something went wrong';
        } else {
            echo "list doesn't exist";
        }

    }

    public function complete($id)
    {
        $retrived = App::get('query')->selectWhereSingle('Liste', "nome='Completed' AND cod_proj='{$id['id_proj']}'", 'Lista')[0];

        App::get('query')->modify($retrived->getId(), 'cod_lista', 'Tasks', "id_task='{$id['id_task']}'");
        //header('Location: /user/project/view/?proj_id='.$id['id_proj']);
    }
}

   