/** Funzione che va a controllare che il contenuto di tutte le input box del form di donazione obbligatorie sia corretto. Si possono avere
 *  due situazioni:
 * 1) il contenuto di tutte le input box obbligatorie è corretto (viene rilevato dall'appartenenza delle input box alla classe border-success)
 *    --> il click del tasto "submit" effettua il submit del form con tutto ciò che ne consegue;
 * 2) il contenuto di una o più input box obbligatorie manca oppure non è corretto --> il click del tasto "submit" esplicita le input box 
 *    non corrette circondandole con un bordo rosso.
 */

function Submit() 
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
            if(inps[i].classList.contains("border-danger")){
                cansubmit=false
            }
        }

        if(cansubmit) {
            document.getElementById("modalwait").visibility = "visible"
            document.getElementById("registrationform").submit()
        }
}
