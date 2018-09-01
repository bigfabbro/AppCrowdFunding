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
  <link rel="stylesheet" href="/AppCrowdFunding/Smarty/templates/css/theme.css"> 
  </head>

<body style="background-image: url('/AppCrowdFunding/Smarty/img/wallpaperRazzo.jpg'); background-size:cover;"> {include file="navbar.tpl"}
<font color="white">


  <div class="container text-center">
    <div class="ric"> </div>
    <div class="ric">
      <h2><b>Risultati ricerca per: "{$string}" </b></h2> 
      {if $key eq "Utente" && $value eq "Username"} {include file="utente.tpl"}
      {else if $key eq "Campagna" && ($value eq "Category" || $value eq "Name" || $value eq "Username" || $value eq "Country")} 
        {include file="Campagna.tpl"} {/if}
      </div>
  </div>
  </font>
</body>
</html>