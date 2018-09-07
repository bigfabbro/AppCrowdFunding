<?php
/* Smarty version 3.1.32, created on 2018-09-07 20:37:44
  from 'C:\xampp\htdocs\AppCrowdFunding\Smarty\templates\login.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5b92c5785a6475_63759304',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4c1204dc4afc87df3f1b3ff051d7fbdf76e0120c' => 
    array (
      0 => 'C:\\xampp\\htdocs\\AppCrowdFunding\\Smarty\\templates\\login.tpl',
      1 => 1536333778,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b92c5785a6475_63759304 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="/AppCrowdFunding/Smarty/templates/css/theme.css"> </head>

<body style="background-image: url('/AppCrowdFunding/Smarty/img/login.jpg'); background-size:cover;">
  <div class="py-5 w-100 h-100">
    <div class="container">
      <div class="row">
        <div class="align-self-center col-md-6 text-white">
          <h1 class="text-md-left display-3 text-light">
            <b>Society Of Funding!</b>
          </h1>
          <p class="lead text-light">
            <b>Do you have any idea?</b>
          </p>
        </div>
        <?php if (isset($_smarty_tpl->tpl_vars['user']->value)) {?>
        <div class="col-md-6" style="display:none" id="loginstand">
        <?php } else { ?>
        <div class="col-md-6" style="display:block" id="loginstand">
        <?php }?>
          <div class="row">
            <div class="col-md-12">
              <div class="card text-white p-5 bg-light">
                <div class="card-body">
                  <h1 class="mb-4 bg-light text-primary">Login</h1>
                  <form action="/AppCrowdFunding/Utente/Login" method="POST">
                    <div class="form-group bg-light">
                      <label class="text-primary">Username</label>
                      <input type="text" class="form-control" placeholder="Enter username" name="username" required="required"> </div>
                    <div class="form-group bg-light">
                      <label class="text-primary">Password</label>
                      <input type="password" class="form-control" placeholder="Enter password" name="password" required="required"> </div>
                      <div class="form-group" >
                      <label class="text-primary">Remind me later</label>
                      <input type="checkbox" name="remindme" id="remindme" value="yes"> </div>
                    <button type="submit" class="btn btn-primary">Login</button>
                  </form>
                </div>
                <div class="card-header text-primary text-center border border-light bg-light"><?php if (isset($_smarty_tpl->tpl_vars['badlogin']->value) && $_smarty_tpl->tpl_vars['badlogin']->value == "true") {?>Attenzione! Username e/o password errati!<?php }?></div>
              </div>
            </div>
          </div>
        </div>
        <?php if (isset($_smarty_tpl->tpl_vars['user']->value)) {?>
        <div class="col-md-6" style="display:block" id="loginremind">
        <?php } else { ?>
        <div class="col-md-6" style="display:none" id="loginremind">
        <?php }?>
          <div class="row">
            <div class="col-md-12">
              <div class="card text-white p-5 bg-light">
                <div class="card-body">
                  <p class="text-center text-dark" style="display:inline"> Vuoi accedere come </p><p class="text-center text-primary" style="display:inline"> <?php echo $_smarty_tpl->tpl_vars['user']->value->getUsername();?>
</p><p class="text-center text-dark" style="display:inline">?</p>
                  <form action="/AppCrowdFunding/Utente/LoginRemind" method="POST">
                    <button type="submit" class="btn btn-primary">Si</button>  <a class="btn btn-primary" onclick="change()">Cambia Utente</a>
                  </form>
                </div>
                <div class="card-header text-primary text-center border border-light bg-light"><?php if (isset($_smarty_tpl->tpl_vars['badlogin']->value) && $_smarty_tpl->tpl_vars['badlogin']->value == "true") {?>Attenzione! Username e/o password errati!<?php }?></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <nav class="navbar navbar-expand-md bg-dark navbar-dark" style="position:relative">
    <div class="container">
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbar3SupportedContent">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse text-center justify-content-center" id="navbar3SupportedContent">
        <span class="navbar-text text-light">OR</span>
        <a class="ml-3 btn navbar-btn btn-primary" href="registration">Register now</a>
      </div>
    </div>
  </nav>
  <noscript>
  <meta http-equiv=refresh content='0; url=/AppCrowdFunding/Errore/NoJavascript'>
  </noscript>
  <?php echo '<script'; ?>
 src="/AppCrowdFunding/Smarty/templates/js/changeprofile.js"><?php echo '</script'; ?>
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
