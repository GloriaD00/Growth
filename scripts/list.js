
/* LIST ADDER CODE */

let form = document.getElementById('form');
let button= document.getElementById('prompt');
let hide = document.getElementById('hideBTN');


button.onclick=function () {
    form.classList.remove('hide');

};



hide.onclick=function () {

    form.classList.add('hide');
};

/* TASK ADDER CODE*/

let taskForm=document.getElementsByClassName('taskForm');
let taskButton=document.getElementsByClassName('addTask');
let hideTaskForm=document.getElementsByClassName('hideB1');



for(let i=0; i<taskForm.length; i++){
    taskButton[i].addEventListener('click', function () {
        taskForm[i].classList.remove('hide1');
    });
    hideTaskForm[i].addEventListener('click', function () {
        taskForm[i].classList.add('hide1');

    });

}






