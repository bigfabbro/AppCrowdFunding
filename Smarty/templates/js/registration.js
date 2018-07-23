function inputVerify(id){
    var param=""
    var request="/AppCrowdFUnding/Utente/VerifyRegistration"
    var inp=document.getElementById(id)
    param=id+"="+inp.value
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange= function(){
        if(this.readyState == 4 && this.status == 200){ //readyState==4 --> request finished and response is ready status==200 --> OK
            if(this.responseText.toString()==="?>?>true") {
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
    xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded")
    xmlhttp.send(param)
}


function SubmitOrNot() 
    {
        var inps=[
            document.getElementById("name"),
            document.getElementById("surname"),
            document.getElementById("city"),
            document.getElementById("street"),
            document.getElementById("number"),
            document.getElementById("zipcode"),
            document.getElementById("country"),
            document.getElementById("telnumber"),
            document.getElementById("date"),
            document.getElementById("username"),
            document.getElementById("email"),
            document.getElementById("password1"),
            document.getElementById("password2"),
        ]
        var cansubmit=false
        for(i=0; i<inps.length; i++){
            if(inps[i].classList.contains("border-success")) cansubmit=true
            else{
                cansubmit=false
                break
            }
        }
        if(cansubmit) {
            document.getElementById("modalwait").visibility= "visible"
            document.getElementById("registrationform").submit()
        }
        else alert("Ci sono errori!")
    
}

function passverification(){
    var pass1=document.getElementById("password1")
    var pass2=document.getElementById("password2")
    if(pass1.value==pass2.value && pass1.classList.contains("border-success")){
        pass2.classList.add("border-success")
        pass2.classList.remove("border-danger")
    }
    else{
        pass2.classList.add("border-danger")
        pass2.classList.remove("border-success")
    }
}