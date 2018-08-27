<!DOCTYPE html>
<html>
<br>
<br>
<br>
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
      <h4>Risultati ricerca per: "{$string}" </h4> 
      {if $key eq "Utente" && $value eq "Username"} {include file="utente.tpl"}
      {else if $key eq "Campagna" && ($value eq "Category" || $value eq "Name" || $value eq "Username")} 
        {include file="Campagna.tpl"} {/if}
      </div>
  </div>
</body>
</html>