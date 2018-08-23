<!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" href="css/theme.css">
</head>

<body>{if $array}
  <!-- Tabella che mostra le campagne -->{foreach $array as $campagna} {/foreach}
  <table class="table table-ric">
	<thead>
		<tr><th>Categoria</th><th>Nome Campagna</th><th>Founder</th></tr>
    <tbody>
      <tr>
        <td>{$campagna->getCategory()}</td>
        <td> 
          <a href="/AppCrowdFunding/Campagna/profile/{$campagna->getID()}"> {$campagna->getName()} </a> </td>
        <td> {$campagna->getFounder()->getUserName()} </td>
      </tr>
    </tbody>
  </table> {else}
  <p>Non sono presenti campagne di quella categoria</p> {/if}
  <pingendo onclick="window.open('https://pingendo.com/', '_blank')" style="cursor:pointer;position: fixed;bottom: 10px;right:10px;padding:4px;background-color: #00b0eb;border-radius: 8px; width:250px;display:flex;flex-direction:row;align-items:center;justify-content:center;font-size:14px;color:white">Made with Pingendo Free&nbsp;&nbsp;
    <img src="https://pingendo.com/site-assets/Pingendo_logo_big.png" class="d-block" alt="Pingendo logo" height="16">
  </pingendo>
</body>

</html>