<?php
/* Smarty version 3.1.32, created on 2018-05-31 01:21:38
  from 'C:\xampp\htdocs\APP\Smarty\templates\login.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5b0f32027a8696_00968896',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8958cd88301dd8f36ec0a46035e445b8b5798d93' => 
    array (
      0 => 'C:\\xampp\\htdocs\\APP\\Smarty\\templates\\login.tpl',
      1 => 1527722493,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b0f32027a8696_00968896 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="Smarty/templates/css/theme.css" type="text/css">
  <link rel="stylesheet" href="css/theme.css"> </head>

<body>
  <div class="py-5" style="background-image: url(&quot;http://kb4images.com/images/funky-images/35893063-funky-images.jpg&quot;); background-size:fit;">
    <div class="container">
      <div class="row">
        <div class="align-self-center col-md-6 text-white">
          <h1 class="text-md-left display-3 text-light">
            <b>Society Of Funding!</b>
          </h1>
          <p class="lead text-light">
            <b>Have you any dreams?</b>
          </p>
        </div>
        <div class="col-md-6">
          <div class="row">
            <div class="col-md-12">
              <div class="card text-white p-5 bg-light">
                <div class="card-body">
                  <h1 class="mb-4 bg-light text-primary">Login</h1>
                  <form action="#" method="POST">
                    <div class="form-group bg-light">
                      <label class="text-primary">Username</label>
                      <input type="text" class="form-control" placeholder="Enter username" name="username"> </div>
                    <div class="form-group bg-light">
                      <label class="text-primary">Password</label>
                      <input type="password" class="form-control" placeholder="Enter password" name="password"> </div>
                    <button type="submit" class="btn btn-primary">Login</button>
                  </form>
                </div>
                <div class="card-header text-primary text-center border border-light bg-light"><?php if ($_smarty_tpl->tpl_vars['badlogin']->value == "true") {?>Attenzione! Username e/o password errati!<?php }?></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <nav class="navbar navbar-expand-md bg-dark navbar-dark">
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
