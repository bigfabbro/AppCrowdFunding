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
  <pingendo onclick="window.open('https://pingendo.com/', '_blank')" style="cursor:pointer;position: fixed;bottom: 10px;right:10px;padding:4px;background-color: #00b0eb;border-radius: 8px; width:250px;display:flex;flex-direction:row;align-items:center;justify-content:center;font-size:14px;color:white">Made with Pingendo Free&nbsp;&nbsp;
    <img src="https://pingendo.com/site-assets/Pingendo_logo_big.png" class="d-block" alt="Pingendo logo" height="16">
  </pingendo>
  </font>
</body>
<noscript>
<meta http-equiv=refresh content='0; url=/AppCrowdFunding/Errore/NoJavascript'>
</noscript>
</html>