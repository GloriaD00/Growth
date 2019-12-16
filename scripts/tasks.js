
require('jquery');
var query = $('#query').valueOf();


let arr=[];
/*******VARIABILI DOM*********/
let lists= document.getElementsByClassName('list-container');
let tasks=document.getElementsByClassName('task-container');
let hide=document.getElementById('hideBTN3');
let taskView= document.getElementsByClassName('viewTask')[0];
let taskTitle=document.getElementById('taskName');
let taskDesc=document.getElementById('taskDesc');
let taskDD=document.getElementById('taskDD');
let del=document.getElementById('delete');
let title=document.getElementsByTagName('title')[0];
let id_proj=title.getAttribute('id');
let move=document.getElementById('moveTask');
let taskMover=document.getElementById('taskMover');
let edit = document.getElementsByClassName('edit');
let editform= document.getElementsByClassName('editForm')[0];
let compl = document.getElementById('complete');

/********GET DATI DI TUTTI I TASK************/

 $.ajax({
    url : '/hey.php',
    type : 'POST',
    dataType : 'json',
    cache: false,
    data:query,
    success : function (result) {
        arr.push(result);

    },
    error: function(xhr, status, error) {
        console.log(error.message);

    }
});



/********AGGIUNTA EVENT LISTENERS*************/
     for(let i=0; i<tasks.length;i++){
         tasks[i].addEventListener('click', function () {
             let compito= (arr[0][tasks[i].getAttribute('id')]);

             taskView.classList.remove('hide2');
             /*****DISPLAY COMPITO********/
             taskTitle.innerHTML=compito['Nome'];
             taskDesc.innerHTML="Description: "+compito['descr'];
             taskDD.innerHTML="Due: "+compito['due_date'];


             /*******AJAX PER RIMUOVERE IL COMPITO*******/
             del.onclick= function () {
                 //let compito= (arr[0][tasks[i].getAttribute('id')]);

                 var objXMLHttpRequest = new XMLHttpRequest();
                 objXMLHttpRequest.onreadystatechange = function() {
                     if(objXMLHttpRequest.readyState === 4) {
                         if(objXMLHttpRequest.status === 200) {
                             //alert(objXMLHttpRequest.responseText);
                             window.location.href = "/user/project/view/?proj_id="+id_proj;

                         } else {
                             alert('Error Code: ' +  objXMLHttpRequest.status);
                             alert('Error Message: ' + objXMLHttpRequest.statusText);
                         }
                     }
                 }
                 objXMLHttpRequest.open('GET',  '/task/delete/?id_task='+compito['id_task']+'&id_proj='+id_proj);
                 objXMLHttpRequest.send();
             }

             /*******AJAX PER COMPLETARE UN TASK*********/

             compl.onclick= function(){
                 var objXMLHttpRequest = new XMLHttpRequest();
                 objXMLHttpRequest.onreadystatechange = function() {
                     if(objXMLHttpRequest.readyState === 4) {
                         if(objXMLHttpRequest.status === 200) {
                             //alert(objXMLHttpRequest.responseText);
                             window.location.href = "/user/project/view/?proj_id="+id_proj;

                         } else {
                             alert('Error Code: ' +  objXMLHttpRequest.status);
                             alert('Error Message: ' + objXMLHttpRequest.statusText);
                         }
                     }
                 }
                 objXMLHttpRequest.open('GET',  '/task/complete/?id_task='+compito['id_task']+'&&id_proj='+id_proj);
                 objXMLHttpRequest.send();


         }


             /********AJAX PER MUOVERE IL COMPITO*********/

             $('#taskMover').on('submit',function(e){
                 e.preventDefault();
                 console.log('Sending request to '+$(this).attr('action')+' with data: '+$(this).serialize());
                 $.ajax({
                     type     : "POST",
                     cache    : false,
                     url      : $(this).attr('action'),
                     data     : {list: $(this).serializeArray(), task:compito['id_task']},
                     success  : function(data) {
                         console.log(data);
                         alert(data);
                         window.location.href = "/user/project/view/?proj_id="+id_proj;

                     }
                 });

             });


         });



     }

     hide.addEventListener('click', function(){
         taskView.classList.add('hide2');
     });

move.onclick=function () {
    if(taskMover.classList.contains('hide4'))
        taskMover.classList.remove('hide4');
    else
        taskMover.classList.add('hide4');
}

for(let i=0;i<edit.length;i++){
    edit[i].addEventListener('click', function () {
        editform.classList.remove('hide');
        let listID=lists[i].getAttribute('id');
        $('#listedit').on('submit',function(e){
            e.preventDefault();
            $.ajax({
                type     : "POST",
                cache    : false,
                url      : $(this).attr('action'),
                data     : {mod: $(this).serializeArray(), list:listID},
                success  : function(data) {
                    console.log(data);
                    alert(data);
                    window.location.href = "/user/project/view/?proj_id="+id_proj;

                }
            });

        });

    })
}

document.getElementById('hideBTN5').addEventListener('click',function () {
    editform.classList.add('hide');
});


