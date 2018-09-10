function showdelete(id){
    id="deletebtn"+id
    document.getElementById(id).style.visibility = "visible"
}

function closedelete(id){
    id="deletebtn"+id
    document.getElementById(id).style.visibility = "hidden"
}

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