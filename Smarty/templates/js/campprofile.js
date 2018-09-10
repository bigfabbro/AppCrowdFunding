//Funzione che mostra il pulsante per la delete di una campagna
function showdelete(id){
    id="deletebtn"+id
    document.getElementById(id).style.visibility = "visible"
}

//Funzione che nasconde il pulsante per la delete di una campagna
function closedelete(id){
    id="deletebtn"+id
    document.getElementById(id).style.visibility = "hidden"
}

//Funzione che invia la richiesta AJAX per la delete di una campagna e nel caso vada a buon fine fa il reload della pagina
function deletecamp(id){
    var request="/AppCrowdFunding/Campagna/DeleteCamp"
    var xmlhttp= new XMLHttpRequest()
    var param="id="+id
    xmlhttp.onreadystatechange = function(){
        if (this.readyState==4 && this.status==200){
            location.reload()
        }
    }
    xmlhttp.open("POST",request,true)
    xmlhttp.setRequestHeader('X-Requested-With', 'XMLHttpRequest')
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
    xmlhttp.send(param)
}