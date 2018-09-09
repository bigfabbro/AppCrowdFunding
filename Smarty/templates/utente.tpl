<!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" href="css/theme.css">
</head>

<body>{if $array}
<font color="white">
  <table class="table table-ric">
	<thead>
		<tr><th>Username</th><th>Nome</th><th>Email</th></tr>
    <tbody><!-- Tabella che mostra gli username -->{foreach $array as $utenti}
      <tr>
        <td>
            <a href="/AppCrowdFunding/Utente/profile/{$utenti->getUserName()}"> <b>{$utenti->getUserName()}<b></a>
        </td>
        <td><b> {$utenti->getName()}</b></td>
        <td> <b>{$utenti->getEmail()}</b> </td>
      </tr>
    </tbody>{/foreach}
  </table> {else} 
  <p>Non sono presenti utenti con tale username</p> {/if}
  </font>
</body>
<noscript>
<meta http-equiv=refresh content='0; url=/AppCrowdFunding/Errore/NoJavascript'>
</noscript>
</html>