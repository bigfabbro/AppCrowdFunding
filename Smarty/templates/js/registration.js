/** Funzione che si occupa del controllo client-side degli errori. Viene richiamata ogni qualvolta viene cambiato il contenuto di una
 * input box del form ed invia una richiesta AJAX di tipo POST al server che verifica la validità dell'input e restituisce una risposta true o false
 * sottoforma di stringa. Si possono avere due circostanze:
 * 1) l'input inserito dall'utente rispetta i criteri di correttezza --> la input box viene circondata da un bordo verde (nel caso dell'username e
 *    dell'email, il metodo lato server "VerifyRegistration" che viene richiamato dalla richiesta AJAX, verifica anche che siano univoci, cioé che 
 *    non siano già associati ad un altro utente);
 * 2) l'input inserito dall'utente non rispetta i criteri di correttezza --> la input box viene circondata da un bordo rosso.
 * 
 * N.B. nel caso in cui la input box sia quella del primo inserimento della password, viene resettata la input box della ripetizione.
  */

function inputVerifyRegistration(id){
    if(id=="password1"){
        pass2=document.getElementById("password2")
        pass2.value=""
        if(pass2.classList.contains("border-danger")) pass2.classList.remove("border-danger")
        if(pass2.classList.contains("border-success")) pass2.classList.remove("border-success")
    }
    var inp=document.getElementById(id)
    var param=id+"="+inp.value
    var request="/AppCrowdFUnding/Utente/VerifyRegistration"
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

/** Funzione che va a controllare che il contenuto di tutte le input box del form di registrazione obbligatorie sia corretto. Si possono avere
 *  due situazioni:
 * 1) il contenuto di tutte le input box obbligatorie è corretto (viene rilevato dall'appartenenza delle input box alla classe border-success)
 *    --> il click del tasto "submit" effettua il submit del form con tutto ciò che ne consegue;
 * 2) il contenuto di una o più input box obbligatorie manca oppure non è corretto --> il click del tasto "submit" esplicita le input box 
 *    non corrette circondandole con un bordo rosso.
 */

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
            document.getElementById("date"),
            document.getElementById("username"),
            document.getElementById("email"),
            document.getElementById("password1"),
            document.getElementById("password2")
        ]
        var cansubmit=true
        for(i=0; i<inps.length; i++){
            if(!inps[i].classList.contains("border-success")){
                cansubmit=false
            }
        }
        if(document.getElementById("telnumber").classList.contains("border-danger")) {cansumbit=false}
        if(document.getElementById("upicture").files.length!=0){
            if(document.getElementById("upicture").classList.contains("border-danger")) {cansubmit=false}
        }
        if(cansubmit) {
            document.getElementById("modalwait").style.visibility = "visible"
            document.getElementById("registrationform").submit()
        }
}

/** Funzione che viene richiamata quando l'utente inserisce la ripetizione della password per verificare che questa sia uguale alla prima versione.
 *  Si possono avere due situazioni:
 *  1) se le due password sono uguali la input box della "password2" sarà circondata da un bordo verde;
 *  2) se le due password sono diverse la input box della "password2" sarà circondata da un bordo rosso.
 */
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