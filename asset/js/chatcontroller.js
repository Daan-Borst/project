$(document).ready(function(){
 
});

function update()
{
    $.post("chatsessie.php", {}, function(data){ $("#screen").val(data);});  
 
    setTimeout('update()', 1000);
}

function chatwindowstate(a)
{
    if(a==1)
    {
        document.getElementById("chatwindow").style.display="none";
        document.getElementById("chatwindowclosed").style.display="block";
    } 
    else
    {
        document.getElementById("chatwindow").style.display="block";
        document.getElementById("chatwindowclosed").style.display="none";
    }
}    
