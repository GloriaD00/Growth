let id = document.getElementsByTagName('title')[0].getAttribute('id');

$('#deleteAcc').on('click',function () {
    if(confirm('Are you sure you want to delete your account?')){
        var objXMLHttpRequest = new XMLHttpRequest();
        objXMLHttpRequest.onreadystatechange = function() {
            if(objXMLHttpRequest.readyState === 4) {
                if(objXMLHttpRequest.status === 200) {
                   // alert(objXMLHttpRequest.responseText);
                    window.location.href = "/";

                } else {
                    alert('Error Code: ' +  objXMLHttpRequest.status);
                    alert('Error Message: ' + objXMLHttpRequest.statusText);
                }
            }
        }
        objXMLHttpRequest.open('GET',  '/user/delete/?usr_id='+id);
        objXMLHttpRequest.send();
    }
});