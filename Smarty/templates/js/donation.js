/**
 * Funzione che effettua il controllo dell'input. Ogni volta che viene cambiato il contenuto di una input box invia una richiesta AJAX al server
 * che attraverso un apposito metodo controlla se il contenuto della input box rispetta i requisiti previsti per quel campo e:
 * - se il contenuto è corretto circonda la input box con un bordo verde;
 * - se il contenuto è sbagliato circonda la input box con un bordo rosso.
 */
function inputVerifyDonation(id){
    var inp=document.getElementById(id)
    var param=id+"="+inp.value
    var request="/AppCrowdFunding/Donazione/VerifyDonation"
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
    xmlhttp.setRequestHeader('X-Requested-With', 'XMLHttpRequest')
    xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded")
    xmlhttp.send(param)
}
/**
 * Funzione che permette o meno il submit del form a seconda che il form sia corretto o meno:
 * - form corretto --> tutte le input box sono circondate da bordo verde;
 * - form non corretto --> almeno una delle input box è circondata da bordo rosso.
 */
function SubmitOrNot() 
    {
        var inps=[
            document.getElementById("ownername"),
            document.getElementById("ownersurname"),
            document.getElementById("ccnumber"),
            document.getElementById("expirationdate"),
            document.getElementById("ccv"),
            document.getElementById("amount")
        ]
        var cansubmit=true
        for(i=0; i<inps.length; i++){
            if(!inps[i].classList.contains("border-success")){
                cansubmit=false
            }
        }
        if(cansubmit) {
            document.getElementById("donationform").submit()
        }
}

    
      
