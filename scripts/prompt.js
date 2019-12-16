/* PROJECT ADDER CODE*/

let form = document.getElementById('form');
let button= document.getElementById('prompt');
let hide = document.getElementById('hideBTN');






button.onclick=function () {
    form.classList.remove('hide');

};



hide.onclick=function () {

    form.classList.add('hide');
};





    /* MODIFY CODE */

    let modifyForm=document.getElementsByClassName('modifyForm');
    let modifyButton=document.getElementsByClassName('modifyBTN');
    let hideModifyForm=document.getElementsByClassName('hideB2');


    for(let i=0; i<modifyForm.length; i++){
        modifyButton[i].addEventListener('click', function () {

            modifyForm[i].classList.remove('hide2');
        });
        hideModifyForm[i].addEventListener('click', function () {
            modifyForm[i].classList.add('hide2');

        });

    }


