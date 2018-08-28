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

<body> {include file="navbar.tpl"}


  <div class="container text-center">
    <div class="ric">
      <h4>Risultati ricerca per: "{$string}" </h4><BR>
      {if $array1}
      <h4>UTENTI</h4>
      <table class="table table-ric">
        <thead>
          <tr>
            <th> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;  Username</th>
            <th>&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Nome</th>
            <th>&nbsp; &nbsp; &nbsp;&nbsp; &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; Email</th></tr>
          <tbody><!-- Tabella che mostra gli username -->{foreach $array1 as $utenti}
            <tr>
              <td>
                  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;  <a href="/AppCrowdFunding/Utente/profile/{$utenti->getID()}"> {$utenti->getUserName()}</a>
              </td>
              <td> &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;{$utenti->getName()}</td>
              <td> &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; {$utenti->getEmail()} </td>
            </tr>
          </tbody>{/foreach}
        </table> {else} 
      <p>Non sono presenti utenti con tale username</p> {/if}

    <h4>NOME CAMPAGNA </h4>
    {if $array3}
    <table class="table table-ric">
	    <thead>
        <tr><th>Categoria</th><th>Nome Campagna</th><th>Founder</th></tr>
        <tbody><!-- Tabella che mostra le campagne -->{foreach $array3 as $campagna}
          <tr>
            <td>{$campagna->getCategory()}</td>
            <td> 
              <a href="/AppCrowdFunding/Campagna/profile/{$campagna->getID()}"> {$campagna->getName()} </a> </td>
            <td> {$campagna->getFounder()->getUserName()} </td>
          </tr>
        </tbody>{/foreach}
      </table> {else} 
      <p>Non sono presenti campagne con quel nome</p> {/if}

    <h4>CATEGORIA CAMPAGNA </h4>
    {if $array2}
    <table class="table table-ric">
	    <thead>
        <tr><th>Categoria</th><th>Nome Campagna</th><th>Founder</th></tr>
        <tbody><!-- Tabella che mostra le campagne -->{foreach $array2 as $campagna}
          <tr>
            <td>{$campagna->getCategory()}</td>
            <td> 
              <a href="/AppCrowdFunding/Campagna/profile/{$campagna->getID()}"> {$campagna->getName()} </a> </td>
            <td> {$campagna->getFounder()->getUserName()} </td>
          </tr>
        </tbody>{/foreach}
      </table> {else} 
      <p>Non sono presenti campagne di quella categoria</p> {/if}
          </div>
      </div>
</body>

</html>