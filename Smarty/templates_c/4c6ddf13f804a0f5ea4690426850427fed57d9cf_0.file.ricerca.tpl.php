<?php
/* Smarty version 3.1.32, created on 2018-09-05 17:57:01
  from 'C:\xampp\htdocs\AppCrowdFunding\Smarty\templates\ricerca.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5b8ffccd9f31c0_97079368',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4c6ddf13f804a0f5ea4690426850427fed57d9cf' => 
    array (
      0 => 'C:\\xampp\\htdocs\\AppCrowdFunding\\Smarty\\templates\\ricerca.tpl',
      1 => 1536163018,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:navbar.tpl' => 1,
  ),
),false)) {
function content_5b8ffccd9f31c0_97079368 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
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

<body style="background-image: url('/AppCrowdFunding/Smarty/img/wallpaperRazzo.jpg'); background-size:cover;"> <?php $_smarty_tpl->_subTemplateRender("file:navbar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
<font color="white">

  <div class="container text-center">
    <div class="ric">
      <h2><b>Risultati ricerca per: "<?php echo $_smarty_tpl->tpl_vars['string']->value;?>
"</b> </h2><BR>
      <h4><b>UTENTI</b></h4>
	  <?php if ($_smarty_tpl->tpl_vars['array1']->value) {?>
      <table class="table table-ric">
        <thead>
          <tr>
            <th> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;  Username</th>
            <th>&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Nome</th>
            <th>&nbsp; &nbsp; &nbsp;&nbsp; &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; Email</th></tr>
          <tbody><!-- Tabella che mostra gli username --><?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['array1']->value, 'utenti');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['utenti']->value) {
?>
            <tr>
              <td>
                  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;  <a href="/AppCrowdFunding/Utente/profile/<?php echo $_smarty_tpl->tpl_vars['utenti']->value->getUserName();?>
"> <b> <?php echo $_smarty_tpl->tpl_vars['utenti']->value->getUserName();?>
</b></a>
              </td>
              <td> &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<b><?php echo $_smarty_tpl->tpl_vars['utenti']->value->getName();?>
</b></td>
              <td> &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; <b><?php echo $_smarty_tpl->tpl_vars['utenti']->value->getEmail();?>
 </b></td>
            </tr>
          </tbody><?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </table> <?php } else { ?> 
      <p>Non sono presenti utenti con tale username</p> <?php }?>

    <h4><b>NOME CAMPAGNA</b></h4>
    <?php if ($_smarty_tpl->tpl_vars['array3']->value) {?>
    <table class="table table-ric">
	    <thead>
        <tr><th>Categoria</th><th>Nome Campagna</th><th>Founder</th> <th>Country</th> <th>End Date</th></tr>
        <tbody><!-- Tabella che mostra le campagne --><?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['array3']->value, 'campagna');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['campagna']->value) {
?>
          <tr>
            <td><b><?php echo $_smarty_tpl->tpl_vars['campagna']->value->getCategory();?>
</b></td>
            <td> 
              <a href="/AppCrowdFunding/Campagna/profile/<?php echo $_smarty_tpl->tpl_vars['campagna']->value->getID();?>
"> <b><?php echo $_smarty_tpl->tpl_vars['campagna']->value->getName();?>
 </b></a> </td>
            <td> <a href="/AppCrowdFunding/Utente/profile/<?php echo $_smarty_tpl->tpl_vars['campagna']->value->getFounder()->getUserName();?>
"><b><?php echo $_smarty_tpl->tpl_vars['campagna']->value->getFounder()->getUserName();?>
</b></a> </td>
			<td> <b><?php echo $_smarty_tpl->tpl_vars['campagna']->value->getCountry();?>
</b> </td>
            <td> <b> <?php echo $_smarty_tpl->tpl_vars['campagna']->value->getEndDate();?>
</b> </td>
          </tr>
        </tbody><?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
      </table> <?php } else { ?> 
      <p>Non sono presenti campagne con quel nome</p> <?php }?>

    <h4><b>CATEGORIA CAMPAGNA </b></h4>
    <?php if ($_smarty_tpl->tpl_vars['array2']->value) {?>
    <table class="table table-ric">
	    <thead>
        <tr><th>Categoria</th><th>Nome Campagna</th><th>Founder</th> <th>Country</th> <th>End Date</th></tr>
        <tbody><!-- Tabella che mostra le campagne --><?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['array2']->value, 'campagna');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['campagna']->value) {
?>
          <tr>
            <td><b><?php echo $_smarty_tpl->tpl_vars['campagna']->value->getCategory();?>
</b></td>
            <td> 
              <a href="/AppCrowdFunding/Campagna/profile/<?php echo $_smarty_tpl->tpl_vars['campagna']->value->getID();?>
"> <b><?php echo $_smarty_tpl->tpl_vars['campagna']->value->getName();?>
</b> </a> </td>
            <td> <b><?php echo $_smarty_tpl->tpl_vars['campagna']->value->getFounder()->getUserName();?>
 </b></td>
			<td> <b><?php echo $_smarty_tpl->tpl_vars['campagna']->value->getCountry();?>
</b> </td>
            <td> <b> <?php echo $_smarty_tpl->tpl_vars['campagna']->value->getEndDate();?>
</b> </td>
          </tr>
        </tbody><?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
      </table> <?php } else { ?> 
      <p>Non sono presenti campagne di quella categoria</p> <?php }?>
          </div>
      </div>
	</font>
</body>

</html><?php }
}
