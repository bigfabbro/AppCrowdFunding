function attention() 
    {
        document.getElementById("modalattention").style.visibility = "visible"
 
    }

function cancel()
{
    document.getElementById("modalattention").style.visibility = "hidden"
}

function openmodifypanel()
{
    document.getElementById("modalattention").style.visibility = "hidden"
    document.getElementById("modalmodify").style.visibility= "visible"
}

function closemodifypanel()
{
    var change=false
    var request="/AppCrowdFunding/Utente/UpdateProfile?"
    document.getElementById("modalmodify").style.visibility= "hidden"
    var inp=[
        document.getElementById("city"),
        document.getElementById("street"),
        document.getElementById("number"),
        document.getElementById("country"),
        document.getElementById("zipcode"),
        document.getElementById("telnumber"),
        document.getElementById("datan")
        ]
    for(i=0; i<inp.length; i++){
        if(inp[i].value!=("ci"+inp[i].getAttribute('id')).innerHTML){
            if(i>0 && change==true){
                request=request+"&"+inp[i].getAttribute('id')+"="+inp[i].value
            }
            else{
                request=request+inp[i].getAttribute('id')+"="+inp[i].value
            }
            change=true
        }
    }
    if(change==true){
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange= function(){
            if(this.readyState == 4 && this.status == 200){
                for(i=0; i<inp.length;  i++){
                    if(inp[i].value!=("ci"+inp[i].getAttribute('id')).innerHTML){
                        document.getElementById("ci"+inp[i].getAttribute('id')).innerHTML=inp[i].value
                    }
                }
            }
        }
        xmlhttp.open("POST",request,true)
        xmlhttp.send()
    }
}

function inputVerify(id){
    var request="/AppCrowdFunding/Utente/Modify?"
    var inp=document.getElementById('id')
    if(inp.value!=("ci"+id.innerHTML)){
        request=request+id+"="+inp.value
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange= function(){
            if(this.readyState == 4 && this.status == 200){ //readyState==4 --> request finished and response is ready status==200 --> OK
                if(this.responseText==true) alert("YES")
                else alert("NO")
            }
        }
        xmlhttp.open("POST",request,true)
        xmlhttp.send()
    }
}