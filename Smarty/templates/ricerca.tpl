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
    <div class="ric">
      <h2><b>Risultati ricerca per: "{$string}"</b> </h2><BR>
      <h4><b>UTENTI</b></h4>
	  {if $array1}
      <table class="table table-ric">
        <thead>
          <tr>
            <th> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;  Username</th>
            <th>&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Nome</th>
            <th>&nbsp; &nbsp; &nbsp;&nbsp; &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; Email</th></tr>
          <tbody><!-- Tabella che mostra gli username -->{foreach $array1 as $utenti}
            <tr>
              <td>
                  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;  <a href="/AppCrowdFunding/Utente/profile/{$utenti->getID()}"> <b> {$utenti->getUserName()}</b></a>
              </td>
              <td> &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<b>{$utenti->getName()}</b></td>
              <td> &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; <b>{$utenti->getEmail()} </b></td>
            </tr>
          </tbody>{/foreach}
        </table> {else} 
      <p>Non sono presenti utenti con tale username</p> {/if}

    <h4><b>NOME CAMPAGNA</b></h4>
    {if $array3}
    <table class="table table-ric">
	    <thead>
        <tr><th>Categoria</th><th>Nome Campagna</th><th>Founder</th></tr>
        <tbody><!-- Tabella che mostra le campagne -->{foreach $array3 as $campagna}
          <tr>
            <td><b>{$campagna->getCategory()}</b></td>
            <td> 
              <a href="/AppCrowdFunding/Campagna/profile/{$campagna->getID()}"> <b>{$campagna->getName()} </b></a> </td>
            <td> <b>{$campagna->getFounder()->getUserName()}</b> </td>
          </tr>
        </tbody>{/foreach}
      </table> {else} 
      <p>Non sono presenti campagne con quel nome</p> {/if}

    <h4><b>CATEGORIA CAMPAGNA </b></h4>
    {if $array2}
    <table class="table table-ric">
	    <thead>
        <tr><th>Categoria</th><th>Nome Campagna</th><th>Founder</th></tr>
        <tbody><!-- Tabella che mostra le campagne -->{foreach $array2 as $campagna}
          <tr>
            <td><b>{$campagna->getCategory()}</b></td>
            <td> 
              <a href="/AppCrowdFunding/Campagna/profile/{$campagna->getID()}"> <b>{$campagna->getName()}</b> </a> </td>
            <td> <b>{$campagna->getFounder()->getUserName()} </b></td>
          </tr>
        </tbody>{/foreach}
      </table> {else} 
      <p>Non sono presenti campagne di quella categoria</p> {/if}
          </div>
      </div>
	</font>
</body>

</html>