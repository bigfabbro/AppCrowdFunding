/** Funzione che va a controllare che il contenuto di tutte le input box del form di donazione obbligatorie sia corretto. Si possono avere
 *  due situazioni:
 * 1) il contenuto di tutte le input box obbligatorie è corretto (viene rilevato dall'appartenenza delle input box alla classe border-success)
 *    --> il click del tasto "submit" effettua il submit del form con tutto ciò che ne consegue;
 * 2) il contenuto di una o più input box obbligatorie manca oppure non è corretto --> il click del tasto "submit" esplicita le input box 
 *    non corrette circondandole con un bordo rosso.
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

    
      
