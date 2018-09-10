<?php
/* Smarty version 3.1.32, created on 2018-09-10 10:07:45
  from 'C:\xampp\htdocs\AppCrowdFunding\Smarty\templates\donprofile.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5b9626518b7512_40339500',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '844d9199f23049129b946b3b86915110977deb0c' => 
    array (
      0 => 'C:\\xampp\\htdocs\\AppCrowdFunding\\Smarty\\templates\\donprofile.tpl',
      1 => 1536520868,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b9626518b7512_40339500 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="/AppCrowdFunding/Smarty/templates/css/theme.css" type="text/css"> 
</head>

<body>
  <div class="row">
    <div class="container bg-light">
      <div class="row">
        <div class="col-md-12">
          <div class="row">
            <div class="col-md-12">
              <a href="/AppCrowdFunding/Campagna/profile/<?php echo $_smarty_tpl->tpl_vars['campaign']->value->getId();?>
"><p class="lead text-center"><?php echo $_smarty_tpl->tpl_vars['campaign']->value->getName();?>
</p></a>
            </div>
            <div class="col-md-6">
              <div class="row">
                <div class="col-md-12">
                  <p class="lead text-left">Date: <?php echo $_smarty_tpl->tpl_vars['date']->value;?>
</p>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="row">
                    <div class="col-md-12">
                      <p class="lead text-left">Amount: <?php echo $_smarty_tpl->tpl_vars['amount']->value;?>
</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <p class="lead text-justify">Reward: <?php if ($_smarty_tpl->tpl_vars['reward']->value != null) {
echo $_smarty_tpl->tpl_vars['reward']->value;
} else { ?> niente <?php }?></p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <noscript>
  <meta http-equiv=refresh content='0; url=/AppCrowdFunding/Errore/NoJavascript'>
  </noscript>
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
