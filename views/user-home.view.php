<html>
<head>
    <title>Desktop</title>
    <script src="/scripts/prompt.js" defer></script>


    <link rel="stylesheet" href="/styles/user-home.css">

</head>
<body>
<div class="navbar">
    <p><?= $nome?></p>
    <a href="/profile/?usr_id=<?=$id ;?>&nome=<?=$nome?>">Settings</a>
    <a href="/logout">Logout</a>
    <button id="prompt">New project</button>

</div>
<div class="page">
<?php if(empty($projects)) :?>


    <div class="empty">

        <h1>There is nothing in here let's do something!</h1>
        <button id="plusB">+</button>

    </div>
    <div class="appear hide " id="form">
        <button class="hideB" id="hideBTN">X</button>

        <form action="/proj/add" method="post">
            <input type="text" name="NomeProj" placeholder="Projetc name">
            <button type="submit">Create</button>
        </form>





    </div>


    <script defer>

        document.getElementById('plusB').onclick=function(){
            let form = document.getElementById('form');

            form.classList.remove('hide');

        };

    </script >

<?php else :?>


    <div class="filled">
        <?php foreach($projects as $proj) :?>


            <div class="project-container">
                <h1><?= $proj->getName(); ?></h1>
                <div class="bottolm-bar">
                    <a href=project/view/?proj_id=<?=$proj->getId(); ?>>View</a>
                    <a href=project/delete/?proj_id=<?=$proj->getId(); ?>>Delete</a>
                    <button class="modifyBTN">Modify</button>
                    <!--<button class="ShareBTN">Share</button> -->               </div>

            </div>
            <div class="appear1 hide1 shareForm">
                <button class="hideB1" id="hideBTN1">X</button>
                <form action="/proj/share"  method="post">
                    <input type="text" name="usrEmail" placeholder="User Email">

                    <input type = "hidden" name ="proj_id" value = "<?= $proj->getId()?>" />

                    <button type="submit">Share</button>

                </form>

            </div>


            <div class="appear2 hide2 modifyForm">
                <button class="hideB2" id="hideBTN2">X</button>
                <form action="/proj/modify"  method="post">
                    <input type="text" name="newName" placeholder="New project name">

                    <input type = "hidden" name ="proj_id" value = "<?= $proj->getId()?>" />

                    <button type="submit">Modify</button>

                </form>


            </div>

        <?php endforeach; ?>

    </div>

<?php endif; ?>

<div class="appear hide " id="form">
    <button class="hideB" id="hideBTN">X</button>

    <form action="/proj/add" method="post">
        <input type="text" name="NomeProj" placeholder="Projetc name">
        <button type="submit">Create</button>
    </form>





</div>


</body>
</html>