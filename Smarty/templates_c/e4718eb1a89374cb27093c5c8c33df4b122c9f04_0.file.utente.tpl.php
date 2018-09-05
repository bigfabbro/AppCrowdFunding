<?php
/* Smarty version 3.1.32, created on 2018-09-05 17:54:43
  from 'C:\xampp\htdocs\AppCrowdFunding\Smarty\templates\utente.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5b8ffc4331ad04_91655240',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e4718eb1a89374cb27093c5c8c33df4b122c9f04' => 
    array (
      0 => 'C:\\xampp\\htdocs\\AppCrowdFunding\\Smarty\\templates\\utente.tpl',
      1 => 1535804990,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b8ffc4331ad04_91655240 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" href="css/theme.css">
</head>

<body><?php if ($_smarty_tpl->tpl_vars['array']->value) {?>
<font color="white">
  <table class="table table-ric">
	<thead>
		<tr><th>Username</th><th>Nome</th><th>Email</th></tr>
    <tbody><!-- Tabella che mostra gli username --><?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['array']->value, 'utenti');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['utenti']->value) {
?>
      <tr>
        <td>
            <a href="/AppCrowdFunding/Utente/profile/<?php echo $_smarty_tpl->tpl_vars['utenti']->value->getUserName();?>
"> <b><?php echo $_smarty_tpl->tpl_vars['utenti']->value->getUserName();?>
<b></a>
        </td>
        <td><b> <?php echo $_smarty_tpl->tpl_vars['utenti']->value->getName();?>
</b></td>
        <td> <b><?php echo $_smarty_tpl->tpl_vars['utenti']->value->getEmail();?>
</b> </td>
      </tr>
    </tbody><?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
  </table> <?php } else { ?> 
  <p>Non sono presenti utenti con tale username</p> <?php }?>
  <pingendo onclick="window.open('https://pingendo.com/', '_blank')" style="cursor:pointer;position: fixed;bottom: 10px;right:10px;padding:4px;background-color: #00b0eb;border-radius: 8px; width:250px;display:flex;flex-direction:row;align-items:center;justify-content:center;font-size:14px;color:white">Made with Pingendo Free&nbsp;&nbsp;
    <img src="https://pingendo.com/site-assets/Pingendo_logo_big.png" class="d-block" alt="Pingendo logo" height="16">
  </pingendo>
  </font>
</body>

</html><?php }
}
