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
        document.getElementById("telnum"),
        document.getElementById("datan")
        ]
    for(i=0; i<inp.length; i++){
        if(inp[i].value!=inp[i].defaultValue){
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
                location.reload();
            }
        }
        xmlhttp.open("POST",request,true);
        xmlhttp.send();
    }
}