function submitChat(){
    if(form1.msg.value == '')
    {
        alert("Type message!");
        return;
    }
    var sessid = form1.sessid.value;
    var msg = form1.msg.value;
    var sentBy = form1.sentBy.value;
    var xml = new XMLHttpRequest();
    xml.onreadystatechange = function(){
        if(xml.readyState == 4 && xml.status == 200)
        {
            document.getElementById('chatlogs').innerHTML = xml.responseText;
        }
    }
    xml.open('GET', 'insert.php?sentBy='+sentBy+'sessid='+sessid+'&msg='+msg, true);
    xml.send();
}
$(document).ready(function(e){
    $.ajaxSetup({cache: false});
    setInterval(function(){ $('#chatlogs').load('logs.php'); }, 2000)
});