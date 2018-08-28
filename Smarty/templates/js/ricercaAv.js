$(document).ready(function() {
	//inputKey1 è l'id del primo select
    $("#inputKey1").change(function() {
		//option:nth(numero), numero è l'indice dell'elemento che ti annulla le cose da selezionare nell'altro select
        if ($("#inputKey1 option:nth(1)").is(":selected")){
		//inputKey2 è il secondo select; option:nth(2) è quello da disabilitare
            $("#inputKey2 option:nth(1)").attr('disabled', '');
            $("#inputKey2 option:nth(0)").attr('disabled', '');
			      $("#inputKey2").val($("#inputKey2 option:nth(2)" ).val())
		}
		else
			//qui lo riabiliti
			$("#inputKey2 option:nth(0)").removeAttr('disabled');
      $("#inputKey2 option:nth(1)").removeAttr('disabled');
    });
});