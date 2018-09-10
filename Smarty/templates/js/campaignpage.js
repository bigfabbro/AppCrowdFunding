//Funzione che chiude il form per il commento e resetta il contenuto della textarea
function cancelcomment() {
    document.getElementById("modalcomment").style.display= "none"
    document.getElementById("commentbtn").style.display= "block"
    document.getElementById("commentform").reset()
}

//Funzione che apre il form per il commento e "pone" il cursore nella textarea
function opencommentmodal() {
    document.getElementById("modalcomment").style.display= "block"
    document.getElementById("commentbtn").style.display= "none"
    document.getElementById("commText").focus()
}

//Funzione che apre il form per l'inserimento della reward
function openrewardmodal() {
    document.getElementById("modalreward").style.visibility= "visible"
}

//Funzione che chiude il form per l'inserimento della reward e resetta il suo contenuto
function cancelreward(){
    document.getElementById("modalreward").style.visibility= "hidden"
    document.getElementById("rewardform").reset()
}

//Funzione che invia la richiesta AJAX per il commento di una campagna e nel caso vada a buon fine fa il reload della pagina
function comment(idcamp){
    var request="/AppCrowdFunding/Campagna/Comment"
    var param=""
    var inp=document.getElementById("commText")
    if(inp.value!=""){
        if(inp.classList.contains("border-danger")) inp.classList.remove("border-danger")
        document.getElementById("modalcomment").style.visibility = "hidden"
        param="text="+inp.value+"&idcamp="+idcamp
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function(){
            if (this.readyState==4 && this.status ==200 ){
                location.reload()
            }
        }
        xmlhttp.open("POST",request,true)
        xmlhttp.setRequestHeader('X-Requested-With', 'XMLHttpRequest')
        xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
        xmlhttp.send(param)
    }
    else inp.classList.add("border-danger")
}

//Funzione che invia la richiesta AJAX per la cancellazione di un commento e nel caso vada a buon fine fa il reload della pagina
function deletecomment(id){
    var request="/AppCrowdFunding/Campagna/DeleteComment"
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

//Funzione che invia la richiesta AJAX per l'aggiunta di una reward alla campagna e nel caso vada a buon fine fa il reload della pagina
function AddReward(idcamp){
    var request = "/AppCrowdFunding/Campagna/AddReward/"+idcamp
    var param = ""
    document.getElementById("modalreward").style.visibility = "hidden"
    var inps = [
        document.getElementById("name"),
        document.getElementById("amount"),
        document.getElementById("description")
    ]
    param="name="+inps[0].value+"&amount="+inps[1].value+"&description="+inps[2].value
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {  //readyState==4 --> request finished and response is ready status==200 --> OK
            location.reload();
        }
    }
    xmlhttp.open("POST", request, true)
    xmlhttp.setRequestHeader('X-Requested-With', 'XMLHttpRequest')
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
    xmlhttp.send(param)
}

//Funzione che invia la richiesta AJAX per la cancellazione di una reward e nel caso vada a buon fine fa il reload della pagina
function deletereward(id){
    var request="/AppCrowdFunding/Campagna/DeleteReward"
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
   