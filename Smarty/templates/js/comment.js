function cancelcomment() {
    document.getElementById("modalcomment").style.display= "none"
    document.getElementById("commentbtn").style.display= "block"
    document.getElementById("commentform").reset();
}

function opencommentmodal() {
    document.getElementById("modalcomment").style.display= "block"
    document.getElementById("commentbtn").style.display= "none"
    document.getElementById("commText").focus()
}

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
        xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
        xmlhttp.send(param)
    }
    else inp.classList.add("border-danger")
}

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
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
    xmlhttp.send(param)
}