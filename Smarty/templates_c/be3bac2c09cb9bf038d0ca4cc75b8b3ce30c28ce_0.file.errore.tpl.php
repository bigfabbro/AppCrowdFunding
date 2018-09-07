<?php
/* Smarty version 3.1.32, created on 2018-09-07 10:59:58
  from 'C:\xampp\htdocs\AppCrowdFunding\Smarty\templates\errore.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5b923e0e865f48_20473158',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'be3bac2c09cb9bf038d0ca4cc75b8b3ce30c28ce' => 
    array (
      0 => 'C:\\xampp\\htdocs\\AppCrowdFunding\\Smarty\\templates\\errore.tpl',
      1 => 1535810124,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:navbar.tpl' => 1,
  ),
),false)) {
function content_5b923e0e865f48_20473158 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html>
<br>
<br>
<br>
<br>
<br>
<br>
<head>
  <title> Pagina di Errore </title>
  <link rel="stylesheet" href="/AppCrowdFunding/Smarty/templates/css/theme.css"> 
</head>

<body style="background-image: url('/AppCrowdFunding/Smarty/img/wallpaperRazzo.jpg'); background-size:cover;"> <?php $_smarty_tpl->_subTemplateRender("file:navbar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
<font color="white">
	<div class="container text-center well">
        <h1><b>ERRORE<b></h1>
		<h3><b><?php echo $_smarty_tpl->tpl_vars['messaggio']->value;?>
 Torna alla <a href="/AppCrowdFunding/HomePage">home</a></b></h3>
	</div>
</font>
</body>
</html><?php }
}
