<?php
/* Smarty version 3.1.32, created on 2018-08-23 17:22:31
  from 'C:\xampp\htdocs\AppCrowdFunding\Smarty\templates\ricerca.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5b7ed13789d566_91801115',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4c6ddf13f804a0f5ea4690426850427fed57d9cf' => 
    array (
      0 => 'C:\\xampp\\htdocs\\AppCrowdFunding\\Smarty\\templates\\ricerca.tpl',
      1 => 1535037725,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:navbar.tpl' => 1,
    'file:Campagna.tpl' => 1,
  ),
),false)) {
function content_5b7ed13789d566_91801115 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html>
<br>
<br>
<br>
<br>


<head>
  <title> Ricerca </title>
  <link rel="stylesheet" href="css/theme.css"> 
  </head>

<body> <?php $_smarty_tpl->_subTemplateRender("file:navbar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

  <div class="container text-center">
    <div class="ric"> </div>
    <div class="ric">
      <h4>Risultati ricerca per: "<?php echo $_smarty_tpl->tpl_vars['string']->value;?>
" </h4> <?php $_smarty_tpl->_subTemplateRender("file:Campagna.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?> </div>
  </div>
</body>

</html><?php }
}
