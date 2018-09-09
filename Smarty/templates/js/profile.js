//Funzione utilizzata per l'apertura del messaggio di warning per la cancellazione dell'account 

function attention() {
    document.getElementById("modalmodify").style.visibility = "hidden"
    document.getElementById("modalattention").style.visibility = "visible"
}

// Funzione utilizzata per la chiusura del messaggio di warning per la cancellazione dell'account

function cancelattention() {
    document.getElementById("modalattention").style.visibility = "hidden"
}

// Funzione per l'apertura del pannello di modifica del profilo

function openmodifypanel() {
    document.getElementById("modalattention").style.visibility = "hidden"
    document.getElementById("modalmodify").style.visibility = "visible"
}

/** Funzione per la chiusura del pannello di modifica del profilo. In primis verifica se sono state apportate delle modifiche e:
 * 1) Se non sono presenti delle modifiche si limita a rendere invisibile il pannello;
 * 2) Se sono presenti delle modifiche:
 *    a) crea la stringa dei parametri della richiesta POST da inviare al server;
 *    b) invia una richiesta AJAX di tipo POST al server --> quest'ultimo attraverso un apposito metodo effettua (dopo quello effettuato client-side
 *       con il metodo "inputVerify()") un controllo sull'input e inserisce i nuovi dati nel database.
 */
function closemodifypanel() {
    var change = false
    var request = "/AppCrowdFunding/Utente/UpdateProfile"
    var param = ""
    document.getElementById("modalmodify").style.visibility = "hidden"
    var inp = [
        document.getElementById("city"),
        document.getElementById("street"),
        document.getElementById("number"),
        document.getElementById("country"),
        document.getElementById("zipcode"),
        document.getElementById("telnumber"),
        document.getElementById("description"),
        document.getElementById("datan")
    ]
    for (i = 0; i < inp.length; i++) {
        if (inp[i].value != document.getElementById("ci" + inp[i].getAttribute('id')).innerHTML) {
            if (i > 0 && change == true) {
                param = param + "&" + inp[i].getAttribute('id') + "=" + inp[i].value
            }
            else {
                param = param + inp[i].getAttribute('id') + "=" + inp[i].value
            }
            change = true
        }
    }
    if (change == true) {
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
}

/** Funzione che si occupa del controllo client-side degli errori. Viene richiamata ogni qualvolta viene cambiato il contenuto di una
 * input box del form ed invia una richiesta AJAX di tipo POST al server che verifica la validità dell'input e restituisce una risposta true o false
 * sottoforma di stringa. Si possono avere due circostanze:
 * 1) se l'input è corretto è possibile rendere permanenti le modifiche cliccando sul tasto finish;
 * 2) se l'input di una o più input box non è corretto, l'errore viene esplicitato dal fatto che le input box vengono circondate da un bordo rosso
 *   e il bottone "finish" viene disabilitato --> verrà riabilitato quando tutte le input box con bordo rosso saranno corrette.
  */

function inputVerifyModify(id) {
    var param = ""
    var request = "/AppCrowdFunding/Utente/VerifyModify"
    var inp = document.getElementById(id)
    var inps = [
        document.getElementById("city"),
        document.getElementById("street"),
        document.getElementById("number"),
        document.getElementById("country"),
        document.getElementById("zipcode"),
        document.getElementById("telnumber"),
        document.getElementById("description"),
        document.getElementById("datan")
    ]
    var cansubmit = true
    param = id + "=" + inp.value
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) { //readyState==4 --> request finished and response is ready status==200 --> OK
            if (this.responseText.toString() === "true") {
                document.getElementById(id).classList.remove("border-danger")
                document.getElementById(id).classList.add("border-success")
                for (i = 0; i < inps.length; i++) {
                    if (inps[i].classList.contains("border-danger")) {
                        cansubmit = false
                        break
                    }
                    else cansubmit = true
                }
                if (cansubmit) document.getElementById("endbutton").disabled = false
                else document.getElementById("endbutton").disabled = true
            }
            else {
                document.getElementById(id).classList.add("border-danger")
                document.getElementById("endbutton").disabled = true
            }
        }
    }
    xmlhttp.open("POST", request, true)
    xmlhttp.setRequestHeader('X-Requested-With', 'XMLHttpRequest')
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
    xmlhttp.send(param)
}

/** Funzione che si occupa del reset del form di modifica del profilo. Viene attivata cliccando sul bottone "cancel". */

function cancelmodify() {
    var inps = [
        document.getElementById("city"),
        document.getElementById("street"),
        document.getElementById("number"),
        document.getElementById("country"),
        document.getElementById("zipcode"),
        document.getElementById("telnumber"),
        document.getElementById("description"),
        document.getElementById("datan")
    ]
    for (i = 0; i < inps.length; i++) {
        if (inps[i].classList.contains("border-danger")) {
            inps[i].classList.remove("border-danger")
        }
        else if (inps[i].classList.contains("border-success")) {
            inps[i].classList.remove("border-success")
        }
    }
    document.getElementById("modalmodify").style.visibility = "hidden"
    document.getElementById("endbutton").disabled = false
    document.getElementById("formmodify").reset()
}

function changeimg(){
    document.getElementById("btnchangeimg").style.visibility="visible"
}

function closechangeimg(){
    document.getElementById("btnchangeimg").style.visibility="hidden"
}

function imageselect(){
    document.getElementById("inputimage").click();
}

function uploadimg(){
    var request="/AppCrowdFunding/Utente/UpdateImg"
    var file=document.getElementById("inputimage").files
    if(file[0].type.match('image.*')){
        var formData= new FormData()
        formData.append("inputimage",file[0],file[0].name)
        var xmlhttp=new XMLHttpRequest()
        xmlhttp.onload = function () {
            if (this.readyState == 4 && this.status == 200) {  //readyState==4 --> request finished and response is ready status==200 --> OK
                location.reload()
            }
        }
        xmlhttp.open("POST", request, true)
        xmlhttp.setRequestHeader('X-Requested-With', 'XMLHttpRequest')
        xmlhttp.send(formData)
    }
    else{
        alert("Il file caricato non è un'immagine!")
    }
}
