<!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" href="css/theme.css">
</head>

<body>{if $array}
<font color="white">
  <table class="table table-ric">
	<thead>
		<tr><th>Categoria</th><th>Nome Campagna</th><th>Founder</th> <th>Country</th> <th>End Date</th></tr>
    <tbody><!-- Tabella che mostra le campagne -->{foreach $array as $campagna}
      <tr>
        <td><b>{$campagna->getCategory()}</b></td>
        <td> 
          <a href="/AppCrowdFunding/Campagna/profile/{$campagna->getID()}"> <b>{$campagna->getName()} </b></a> </td>
        <td> <b>{$campagna->getFounder()->getUserName()}</b> </td>
        <td> <b>{$campagna->getCountry()}</b> </td>
        <td> <b> {$campagna->getEndDate()}</b> </td>
      </tr>
    </tbody>{/foreach}
  </table> {else} 
  <p>Non sono presenti campagne di quella categoria</p> {/if}
  <pingendo onclick="window.open('https://pingendo.com/', '_blank')" style="cursor:pointer;position: fixed;bottom: 10px;right:10px;padding:4px;background-color: #00b0eb;border-radius: 8px; width:250px;display:flex;flex-direction:row;align-items:center;justify-content:center;font-size:14px;color:white">Made with Pingendo Free&nbsp;&nbsp;
    <img src="https://pingendo.com/site-assets/Pingendo_logo_big.png" class="d-block" alt="Pingendo logo" height="16">
  </pingendo>
  </font>
</body>

</html>