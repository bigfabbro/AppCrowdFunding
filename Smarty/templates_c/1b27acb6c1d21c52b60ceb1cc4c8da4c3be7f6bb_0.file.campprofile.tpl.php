<?php
/* Smarty version 3.1.32, created on 2018-08-21 11:45:13
  from 'C:\xampp\htdocs\AppCrowdFunding\Smarty\templates\campprofile.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5b7bdf293f9661_83117744',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1b27acb6c1d21c52b60ceb1cc4c8da4c3be7f6bb' => 
    array (
      0 => 'C:\\xampp\\htdocs\\AppCrowdFunding\\Smarty\\templates\\campprofile.tpl',
      1 => 1534407772,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b7bdf293f9661_83117744 (Smarty_Internal_Template $_smarty_tpl) {
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
        <div class="col-md-3">
          <?php if ($_smarty_tpl->tpl_vars['photo']->value != null) {?>
          <img class="img-fluid d-block" src="data:image/jpeg;base64,<?php echo $_smarty_tpl->tpl_vars['photo']->value;?>
">
          <?php } else { ?>
          <img class="img-fluid d-block" src="https://pingendo.com/assets/photos/wireframe/photo-1.jpg">
          <?php }?>
        </div>
        <div class="col-md-9">
          <div class="row">
            <div class="col-md-6">
              <a href="/AppCrowdFunding/Campagna/profile/<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
"><p class="lead text-center"><?php echo $_smarty_tpl->tpl_vars['name']->value;?>
</p></a>
              <div class="progress">
                <div class="progress-bar progress-bar-striped" role="progressbar" style="width: <?php echo (100*$_smarty_tpl->tpl_vars['funds']->value)/$_smarty_tpl->tpl_vars['goal']->value;?>
%"><?php echo (100*$_smarty_tpl->tpl_vars['funds']->value)/$_smarty_tpl->tpl_vars['goal']->value;?>
%</div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="row">
                <div class="col-md-12">
                  <p class="lead text-left">Goal:<?php echo $_smarty_tpl->tpl_vars['goal']->value;?>
</p>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="row">
                    <div class="col-md-12">
                      <p class="lead text-left">Funds collected:<?php echo $_smarty_tpl->tpl_vars['funds']->value;?>
</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <p class="lead text-justify">Description:<?php echo $_smarty_tpl->tpl_vars['description']->value;?>
</p>
            </div>
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
