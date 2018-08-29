/**
 * Funzione che si occupa di disabilitare le scelte non possibili nella ricerca avanzata; 
 * Es: Se si selezione 'Utente' non si può ricercare per categoria. 
 */
$(document).ready(function() {
	//inputKey1 è l'id del primo select
    $("#inputKey1").change(function() {
        if ($("#inputKey1 option:nth(1)").is(":selected")){
		//inputKey2 è il secondo select; 
            $("#inputKey2 option:nth(1)").attr('disabled', '');
            $("#inputKey2 option:nth(0)").attr('disabled', '');
			      $("#inputKey2").val($("#inputKey2 option:nth(2)" ).val())
		}
		else{
			$("#inputKey2 option:nth(0)").removeAttr('disabled');
			$("#inputKey2 option:nth(1)").removeAttr('disabled');
		}
    });
});