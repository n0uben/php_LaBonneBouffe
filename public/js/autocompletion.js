/**
** Kevin : essais autocompletion
**/

function getxhr(){
    try{xhr = new XMLHttpRequest();}
    catch(e){
        try{xhr = new ActiveXObject("Microsoft.XMLHTTP");}
        catch(el){
            alert("Erreur !");
        }
    }
    return xhr;
}

function ajaxing(){
    // cache le volet des suggestions
    if(document.getElementById("mot").value==""){
        document.getElementById("suggestion").style.visibility="hidden";
    }
    else{
        xhr = getxhr();
        xhr.onreadystatechange=function (){
            if(xhr.readyState==4 && xhr.status==200){
                // gestion de la visibilité du volet de suggestions de l'autocompletion
                if(xhr.responseText=""){
                    document.getElementById("suggestion".style.visibility="hidden")
                }
                else{
                    document.getElementById("suggestion").style.visibility="visible";
                }
                document.getElementById("suggestion").innerHTML=xhr.responseText;
            }
            else {
                document.getElementById("suggestion").innerHTML="<img src='src/autocompletion/autocompletion' />";
            }
            xhr.open("post","contenu.php", true);
            xhr.setRequestHeader("content-type","application/x-www-form-urlencoded")
            xhr.send("mot="+document.getElementById("mot").value);
        }
    }
}