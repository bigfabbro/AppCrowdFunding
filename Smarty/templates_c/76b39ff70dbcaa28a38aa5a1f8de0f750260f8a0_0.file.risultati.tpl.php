<?php
/* Smarty version 3.1.32, created on 2018-09-01 16:28:10
  from 'C:\xampp\htdocs\AppCrowdFunding\Smarty\templates\risultati.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5b8aa1fa946d68_89700494',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '76b39ff70dbcaa28a38aa5a1f8de0f750260f8a0' => 
    array (
      0 => 'C:\\xampp\\htdocs\\AppCrowdFunding\\Smarty\\templates\\risultati.tpl',
      1 => 1535806938,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:navbar.tpl' => 1,
    'file:utente.tpl' => 1,
    'file:Campagna.tpl' => 1,
  ),
),false)) {
function content_5b8aa1fa946d68_89700494 (Smarty_Internal_Template $_smarty_tpl) {
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
    <div class="ric"> </div>
    <div class="ric">
      <h2><b>Risultati ricerca per: "<?php echo $_smarty_tpl->tpl_vars['string']->value;?>
" </b></h2> 
      <?php if ($_smarty_tpl->tpl_vars['key']->value == "Utente" && $_smarty_tpl->tpl_vars['value']->value == "Username") {?> <?php $_smarty_tpl->_subTemplateRender("file:utente.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
      <?php } elseif ($_smarty_tpl->tpl_vars['key']->value == "Campagna" && ($_smarty_tpl->tpl_vars['value']->value == "Category" || $_smarty_tpl->tpl_vars['value']->value == "Name" || $_smarty_tpl->tpl_vars['value']->value == "Username" || $_smarty_tpl->tpl_vars['value']->value == "Country")) {?> 
        <?php $_smarty_tpl->_subTemplateRender("file:Campagna.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?> <?php }?>
      </div>
  </div>
  </font>
</body>
</html><?php }
}
