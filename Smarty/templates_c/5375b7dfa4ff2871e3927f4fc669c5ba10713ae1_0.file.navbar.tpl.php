<?php
/* Smarty version 3.1.32, created on 2018-05-30 23:46:54
  from 'C:\xampp\htdocs\APP\Smarty\templates\navbar.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5b0f1bcee1b349_17445774',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5375b7dfa4ff2871e3927f4fc669c5ba10713ae1' => 
    array (
      0 => 'C:\\xampp\\htdocs\\APP\\Smarty\\templates\\navbar.tpl',
      1 => 1527716757,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b0f1bcee1b349_17445774 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_assignInScope('user', (($tmp = @$_smarty_tpl->tpl_vars['user']->value)===null||$tmp==='' ? 'nouser' : $tmp));?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="Smarty/templates/css/theme.css" type="text/css">
  <link rel="stylesheet" href="css/theme.css">
</head>

<body>
  <nav class="navbar navbar-expand-md bg-primary navbar-dark">
    <div class="container">
      <a class="navbar-brand" href="homepage">
        <i class="fa d-inline fa-lg fa-cloud"></i>
        <b>&nbsp;Society Of Funding</b>
      </a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbar2SupportedContent">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse text-center justify-content-end" id="navbar2SupportedContent">
        <ul class="navbar-nav">
          <li class="nav-item text-light">
            <a class="nav-link" href="#">
              <i class="fa d-inline fa-lg fa-envelope-o"></i> Contacts</a>
          </li>
        </ul>
        <?php if ($_smarty_tpl->tpl_vars['user']->value != 'nouser') {?>
        <span class="navbar-text text-light">&nbsp; Benvenuto, <?php echo $_smarty_tpl->tpl_vars['user']->value;?>
</span>
        <a class="btn navbar-btn ml-2 text-primary btn-light" href="logout">&nbsp; Logout &nbsp;</a>
        <?php } else { ?>
        <a href="login" class="btn navbar-btn ml-2 text-primary btn-light">
          <i class="fa d-inline fa-lg fa-user-circle-o text-primary"></i>&nbsp; Login</a>
        
        <span class="navbar-text text-light">&nbsp; OR</span>
        <a class="btn navbar-btn ml-2 text-primary btn-light" href="registration">&nbsp; Sign Up &nbsp;</a>
        <?php }?>
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
