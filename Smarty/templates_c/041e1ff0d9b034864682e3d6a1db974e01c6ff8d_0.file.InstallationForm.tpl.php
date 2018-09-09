<?php
/* Smarty version 3.1.32, created on 2018-09-09 11:32:13
  from 'C:\xampp\htdocs\AppCrowdFunding\Smarty\templates\InstallationForm.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5b94e89db38d96_60709176',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '041e1ff0d9b034864682e3d6a1db974e01c6ff8d' => 
    array (
      0 => 'C:\\xampp\\htdocs\\AppCrowdFunding\\Smarty\\templates\\InstallationForm.tpl',
      1 => 1536485436,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b94e89db38d96_60709176 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="/AppCrowdFunding/Smarty/templates/css/theme.css">
</head>

<body>
  <div class="py-5">
    <div class="container">
      <div class="row">
        <div class="align-self-center col-md-6 text-white">
          <h1 class="text-center text-md-left display-3 text-primary">Installazione</h1>
        </div>
        <div class="col-md-6">
          <div class="card">
            <div class="card-body p-5">
              <h3 class="pb-3">Profilo Database <?php if (isset($_smarty_tpl->tpl_vars['nophpv']->value)) {?> php:NO <?php }?> <?php if (isset($_smarty_tpl->tpl_vars['nocoockie']->value)) {?> coockie:NO <?php }?> <?php if (isset($_smarty_tpl->tpl_vars['nojs']->value)) {?> js:NO <?php }?></h3>
              <form action="/AppCrowdFunding/" method="POST">
                <div class="form-group">
                  <label>Nome del database</label>
                  <input class="form-control" name="nomedb"> </div>
                <div class="form-group">
                  <label>Nome Utente</label>
                  <input type="text" class="form-control" name="nomeutente"> </div>
                <div class="form-group">
                  <label>Password</label>
                  <input type="password" class="form-control" name="password"> </div>
                <div class="form-group">
                  <label>Populate</label>
                  <input type="checkbox" class="form-control" name="populate" value="yes"> </div>
                <button type="submit" class="btn mt-2 btn-outline-primary" onclick="setcookie()">Installa</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php echo '<script'; ?>
 src="/AppCrowdFunding/Smarty/templates/js/checkjs.js"><?php echo '</script'; ?>
>
  <?php echo '<script'; ?>
 src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"><?php echo '</script'; ?>
>
  <?php echo '<script'; ?>
 src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"><?php echo '</script'; ?>
>
  <?php echo '<script'; ?>
 src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"><?php echo '</script'; ?>
>
</body>

</html><?php }
}
