<?php
/* Smarty version 3.1.32, created on 2018-09-09 11:52:32
  from 'C:\xampp\htdocs\AppCrowdFunding\Smarty\templates\grazie.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5b94ed60930c74_39451778',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a465823a57ba47cfeb1d0586521459ba55696395' => 
    array (
      0 => 'C:\\xampp\\htdocs\\AppCrowdFunding\\Smarty\\templates\\grazie.tpl',
      1 => 1536409476,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:navbar.tpl' => 2,
  ),
),false)) {
function content_5b94ed60930c74_39451778 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="/AppCrowdFunding/Smarty/templates/css/theme.css" type="text/css"> </head>

<body style="background-image: url('/AppCrowdFunding/Smarty/img/wallpaperRazzo.jpg'); background-size:cover;"><?php $_smarty_tpl->_subTemplateRender('file:navbar.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?> <?php $_smarty_tpl->_subTemplateRender('file:navbar.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
  <div class="py-5 text-center">
    <div class="container py-5" >
      <div class="row">
        <div class="col-md-6">
          <h1 class="display-3 mb-4 text-light">You have just helped a dreamer like you.</h1>
          <span>
            <h1 class="display-3 mb-4 text-primary">Thanks <?php echo $_smarty_tpl->tpl_vars['Helper']->value;?>
!</h1>
          </span>
          <a href="/AppCrowdFunding/" class="btn btn-lg mx-1 btn-primary">Torna alla HomePage</a>
          <a href="/AppCrowdFunding/Utente/profile" class="btn btn-lg btn-primary mx-1">Visita il tuo profilo</a>
        </div>
        <div class="col-md-6 ">
          <div class="list-group">
            <a href="#" class="list-group-item list-group-item-action flex-column align-items-start active">
              <div class="d-flex w-100 justify-content-between">
                <h5 class="mb-1">About your donation</h5>
              </div>
              <small></small>
            </a>
            <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
              <div class="d-flex w-100 justify-content-between">
                <h5 class="mb-1">
                  <br>Amount: <?php echo $_smarty_tpl->tpl_vars['Amount']->value;?>
$
                  <br>
                  <br>
                </h5>
              </div>
              <div class="d-flex w-100 justify-content-between">
                <h5 class="mb-1">Campaign supported: <?php echo $_smarty_tpl->tpl_vars['Campaign']->value;?>
</h5>
              </div>
              <div class="d-flex w-100 justify-content-between">
                <h5 class="mb-1">
                  <br>Dreamer helped: <?php echo $_smarty_tpl->tpl_vars['Dreamer']->value;?>
</h5>
              </div>
              <div class="d-flex w-100 justify-content-between">
                <h5 class="mb-1">
                  <br>Date of the donation: <?php echo $_smarty_tpl->tpl_vars['Date']->value;?>
</h5>
              </div>
              <div class="d-flex w-100 justify-content-between">
                
                <h5 class="mb-1 text-left" >
                  <br>Reward*: <?php echo $_smarty_tpl->tpl_vars['Reward']->value;?>
 - <?php echo $_smarty_tpl->tpl_vars['Description']->value;?>
</h5>
              </div>
              <div class="d-flex w-100 justify-content-between">
                <h5 class="mb-1">
                  <br>*In case of reward, it will be sent to the address indicated on your own profile.</h5>
              </div>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
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
