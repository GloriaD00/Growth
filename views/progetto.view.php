<?php
if(!isset($_SESSION))
{
session_start();
}
?>
<html>
<head>
    <title id="<?=$id_proj?>">Progetto</title>

    <link rel="stylesheet" href="/styles/project.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

    <script type="module" src="/dist/tasks.js" defer></script>

    <script type="module" src="/dist/lists.js" defer></script>
</head>
<body>
<div class="navbar">
    <p><?= $Nome_progetto?></p>
    <a href="/user/home">Home</a>
    <a href="/profile/?usr_id=<?=$_SESSION['User']->getId() ;?>&nome=<?=$_SESSION['User']->getName()?>">Settings</a>
    <a href="/logout">Logout</a>

    <button id="prompt">New list</button>


</div>
<div class="page">
    <?php if(empty($Liste)) :?>


        <div class="empty">

            <h1>There is nothing in here let's do something!</h1>
            <button class="firstAdd" id="plusB">+ </button>



        </div>

        <div class="appear hide " id="form">
            <button class="hideB" id="hideBTN">X</button>

            <form action="/lista/add" method="post">
                <input type="text" name="NomeLista" placeholder="List name">
                <input type="number" name="priority" placeholder="Priorità" value="2">
                <input type="hidden" name="id_proj" value="<?=$id_proj?>">
                <button type="submit">Create</button>
            </form>


        </div>
        <script defer>
            let form = document.getElementById('form');
            let plus=document.getElementById('plusB');
            plus.onclick=function(){
                form.classList.remove('hide');

            }

        </script>
    <?php else :?>


        <div class="filled">
            <?php foreach($Liste as $lista) :?>

                <div class="list-container" id="<?= $lista->getId()?>">
                    <div class="topbar">

                        <?php if($lista->getNome()!='Completed'):?>
                            <button class="edit">Edit</button>
                        <button class="del"><a href="/lista/del/?list_id=<?= $lista->getId()?>&&proJ_id=<?=$id_proj?>">Delete</a> </button>
                        <?php endif; ?>
                    </div>
                    <h1><?= $lista->getNome() ?></h1>

                    <div class="tasks">
                        <?php $compiti=$lista->loadCompiti();
                        $nome= $lista->getNome();
                        ?>
                        <?php foreach($compiti as $compito) :?>
                            <div class="task-container" id="<?= $compito->getId()?>">
                                <h3 class="task-title"><?=$compito->getNome() ?></h3>
                                <p> Due date: <?=$compito->getDueDate()?></p>
                                <?php $dueDate=$compito->getDueDate()?>
                            </div>

                        <script>
                            var newDate= new Date();
                            var dateStr="<?php echo $dueDate ?>";
                            var myDate= new Date(dateStr);
                            var lista="<?php echo $nome ?>";
                            if(newDate>myDate)
                            {
                               var container= document.getElementById(<?= $compito->getId()?>);

                               container.style.background=' linear-gradient(to right, #fe8c00, #f83600)';
                               container.style.color='#ffffff';

                            }
                            if(lista=='Completed'){
                                var container= document.getElementById(<?= $compito->getId()?>);
                                container.style.background=' linear-gradient(to right, #fe8c00, #f83600)';
                                container.style.color='#ffffff';

                            }






                        </script defer>
                        <?php endforeach; ?>

                    </div>
                    <?php if($lista->getNome()!='Completed'):?>
                    <button class="addTask">Add Task</button>
                    <?php endif;?>
                </div>
                    <div class="appear1 hide1 taskForm">
                        <button class="hideB1" id="hideBTN1">X</button>
                        <form action="/task/add/"  method="post">
                            <input type="text" name="taskName" placeholder="task name">
                            <textarea name="desc" placeholder="description" rows="4" cols="50"></textarea>
                            <input type="date" name="dueDate" placeholder="date" >
                            <input type = "hidden" name ="list_id" value = "<?= $lista->getId()?>" />

                            <button type="submit">Create</button>

                        </form>

                    </div>

            <?php endforeach; ?>

        </div>

    <?php endif; ?>


    <div class="appear hide " id="form">
        <button class="hideB" id="hideBTN">X</button>

        <form action="/lista/add" method="post">
            <input type="text" name="NomeLista"  placeholder="List name">

            <input type="number" name="priority" placeholder="Priorità" value="2">
            <input type="hidden" name="id_proj" value="<?=$id_proj?>">
            <button type="submit">Create</button>
        </form>


    </div>

    <!--<div class="appear hide " id="taskAdder">
        <button class="hideB" id="hideBTN">X</button>

        <form action="/task/add" method="post">
            <input type="text" name="NomeTask" placeholder="Task name">
            <input type="text" name="dueDate" placeholder="date" >
            <textarea name="desc" placeholder="description" rows="4" cols="50"></textarea>
            <button type="submit">Create</button>
        </form>


    </div>-->

</div>


<div class="viewTask appear2 hide2">
    <button class="hideB3" id="hideBTN3">X</button>

    <h2 id="taskName"></h2>
    <p id="taskDesc"></p>
    <p id="taskDD"></p>
    <button id="moveTask">Move</button>
    <button  id="delete">Delete</button>
    <button id="complete">Complete</button>



    <form class="hide4  " action="/task/move" method="post" id="taskMover">
        <input type="text" placeholder="list name" name="nome_lista">
        <button type="submit">Done</button>
    </form>



</div>
<div class="appear hide editForm" id="form">
    <button class="hideB" id="hideBTN5">X</button>

    <form action="/lista/edit" method="post" id="listedit">
        <input type="text" name="NomeLista" placeholder="List name">
        <input type="number" name="priority" placeholder="Priorità" value="2">
        <input type="hidden" name="id_proj" value="<?=$id_proj?>">
        <button type="submit">Edit</button>
    </form>


</div>


</body>



