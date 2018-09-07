<?php
/* Smarty version 3.1.32, created on 2018-09-07 17:17:53
  from 'C:\xampp\htdocs\AppCrowdFunding\Smarty\templates\nojavascript.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5b9296a1f10e83_45522354',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9cd3306e396ce116623189d813b687954ffa1782' => 
    array (
      0 => 'C:\\xampp\\htdocs\\AppCrowdFunding\\Smarty\\templates\\nojavascript.tpl',
      1 => 1536332186,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:navbar.tpl' => 1,
  ),
),false)) {
function content_5b9296a1f10e83_45522354 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="/AppCrowdFunding/Smarty/templates/css/theme.css" type="text/css"> 
</head>

<body>
<?php $_smarty_tpl->_subTemplateRender('file:navbar.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
  <div class="py-5 text-center w-100 h-100" style="background-image: url('/AppCrowdFunding/Smarty/img/wallpaperRazzo.jpg');background-size:cover;">
    <div class="container py-5">
      <div class="row">
        <div class="col-md-12">
          <h1 class="display-3 mb-4 text-primary">Noooo!</h1>
          <p class="lead mb-5 text-white">Il tuo browser non supporta JavaScript!
            <br> Se è disattivato, attivalo nelle impostazioni del browser!
            <br>
          </p>
        </div>
      </div>
    </div>
  </div>
</body>

</html><?php }
}
