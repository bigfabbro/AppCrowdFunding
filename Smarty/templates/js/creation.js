function Next(id){
    var num=parseInt(id[1])
    var thisid="c"+num.toString()
    var nextid="c"+(num+1).toString()
    document.getElementById(thisid).style.visibility = "hidden"
    document.getElementById(nextid).style.visibility = "visible"
}

function Back(id){
    var num=parseInt(id[1])
    var thisid="c"+num.toString()
    var precid="c"+(num-1).toString()
    document.getElementById(thisid).style.visibility = "hidden"
    document.getElementById(precid).style.visibility = "visible"
}

function inputVerifyCreation(id){
    var inp=document.getElementById(id)
    var param=id+"="+inp.value
    var request="/AppCrowdFUnding/Campagna/VerifyCreation"
    var xmlhttp = new XMLHttpRequest()
    xmlhttp.onreadystatechange= function(){
        if(this.readyState == 4 && this.status == 200){ //readyState==4 --> request finished and response is ready status==200 --> OK
            if(this.responseText.toString()==="true") {
                inp.classList.add("border-success")
                if(inp.classList.contains("border-danger")) inp.classList.remove("border-danger")
            }
            else{
                inp.classList.add("border-danger")
                if(inp.classList.contains("border-success")) inp.classList.remove("border-success")
            }
        }
    }
    xmlhttp.open("POST",request,true)
    if(id=="upicture"){
        if(inp.files.length!=0){
            var formData= new FormData()
            formData.append("upicture",inp.files[0])
            xmlhttp.send(formData)
        }
        else{
            if(inp.classList.contains("border-danger")) inp.classList.remove("border-danger")
            else if(inp.classList.contains("border-success")) inp.classList.remove("border-success")
        }
    }
    else{   
        xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded")
        xmlhttp.send(param)
    }
}

function SubmitOrNot() 
    {
        var inps=[
            document.getElementById("name"),
            document.getElementById("country"),
            document.getElementById("enddate"),
            document.getElementById("bankcount"),
            document.getElementById("goal")
        ]
        var cansubmit=true
        for(i=0; i<inps.length; i++){
            if(!inps[i].classList.contains("border-success")){
                cansubmit=false
            }
        }
        if(cansubmit) {
            document.getElementById("creationform").submit()
        }
        else{
            if(!inps[0].classList.contains("border-success") || !inps[1].classList.contains("border-success")){
                document.getElementById("c1").style.visibility="visible"
                document.getElementById("c5").style.visibility="hidden"
            }
            else{
                document.getElementById("c3").style.visibility="visible"
                document.getElementById("c5").style.visibility="hidden"
            }
        }
}