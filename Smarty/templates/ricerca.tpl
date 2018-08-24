<!DOCTYPE html>
<html>
<br>
<br>
<br>

<head>
  <title> Ricerca </title>
  <link rel="stylesheet" href="css/theme.css"> 
  </head>

<body> {include file="navbar.tpl"}

  <div class="container text-center">
    <div class="ric"> </div>
    <div class="ric">
      <h4>Risultati ricerca per: "{$string}" </h4> {if $key eq "Campagna"} {include file="Campagna.tpl"} {elseif $key eq "Utente"} {include file="Utenti.tpl"} {/if} </div>
  </div>
</body>

</html>