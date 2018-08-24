<?php
/* Smarty version 3.1.32, created on 2018-08-23 17:00:01
  from 'C:\xampp\htdocs\AppCrowdFunding\Smarty\templates\navbar.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5b7ecbf189bf11_29037672',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7ee9defdfd6e8654ab1d6c42e02279c280ba6b9b' => 
    array (
      0 => 'C:\\xampp\\htdocs\\AppCrowdFunding\\Smarty\\templates\\navbar.tpl',
      1 => 1535035770,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b7ecbf189bf11_29037672 (Smarty_Internal_Template $_smarty_tpl) {
?><<<<<<< HEAD
<!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" href="css/theme.css"> </head>

<body><?php $_smarty_tpl->_assignInScope('userlogged', (($tmp = @$_smarty_tpl->tpl_vars['userlogged']->value)===null||$tmp==='' ? 'nouser' : $tmp));?>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="/AppCrowdFunding/Smarty/templates/css/theme.css" type="text/css">
=======
<?php $_smarty_tpl->_assignInScope('userlogged', (($tmp = @$_smarty_tpl->tpl_vars['userlogged']->value)===null||$tmp==='' ? 'nouser' : $tmp));?>


>>>>>>> 264fb67624f8da7997d418ee603ffdd4101efd31
  <nav class="navbar navbar-expand-md navbar-dark bg-primary">
    <a class="navbar-brand" href="/AppCrowdFunding/HomePage">
      <i class="fa d-inline fa-lg fa-cloud"></i>
      <b>&nbsp;Society Of Funding</b>
    </a>
    <div class="container">
      <ul class="navbar-nav">
        <li class="nav-item text-light">
          <a class="nav-link" href="/AppCrowdFunding/HomePage"> Home Page</a>
        </li>
      </ul>
      <ul class="navbar-nav">
        <li class="nav-item text-light">
          <a class="nav-link" href="/AppCrowdFunding/Info/info"> Chi siamo</a>
        </li>
      </ul>
      <ul class="navbar-nav">
        <li class="nav-item text-light">
          <a class="nav-link" href="/AppCrowdFunding/Info/info"> Perché sceglierci</a>
        </li>
      </ul>
      <ul class="navbar-nav">
        <li class="nav-item text-light">
          <a class="nav-link" href="/AppCrowdFunding/Info/info"> Contatti</a>
        </li>
      </ul>
      <form class="form-inline my-2 my-lg-0" action="/AppCrowdFunding/Ricerca/rBase" method="get">
        <input class="form-control mr-sm-2 mx-auto py-1 d-inline-flex flex-row justify-content-center align-items-center align-self-center box-campaign form-control-sm" type="search" style="background-size:cover;background-position:right center;background-repeat:no-repeat;"
          placeholder="Cerca tra le categorie" name="str">
        <button class="btn my-sm-0 ml-auto p-2 btn-outline-dark flex-row d-inline-flex submit-button" type="submit" style="background-image: url('../lente.ico');background-size:cover;background-position:right center;"></button>
      </form> 
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbar2SupportedContent">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse text-center justify-content-end" id="navbar2SupportedContent">
        <ul class="navbar-nav"> <?php if ($_smarty_tpl->tpl_vars['userlogged']->value != 'nouser') {?>
          <li class="nav-item text-light">
			<a class="nav-link" href="/AppCrowdFunding/Ricerca/rAvanzata"> Ricerca Avanzata </a>
            <a class="nav-link" href="/AppCrowdFunding/Utente/profile">
              <i class="fa d-inline fa-lg fa-user-circle-o"></i> My Profile</a>
          </li>
        </ul>
        <span class="navbar-text text-light">&nbsp; Benvenuto, <?php echo $_smarty_tpl->tpl_vars['userlogged']->value;?>
</span>
        <a class="btn navbar-btn ml-2 text-primary btn-light" href="/AppCrowdFunding/Utente/logout">&nbsp; Logout &nbsp;</a> <?php } else { ?>
        <a href="/AppCrowdFunding/Utente/login" class="btn navbar-btn ml-2 text-primary btn-light">
          <i class="fa d-inline fa-lg fa-user-circle-o text-primary"></i>&nbsp; Login</a>
        <span class="navbar-text text-light">&nbsp; OR</span>
        <a class="btn navbar-btn ml-2 text-primary btn-light" href="/AppCrowdFunding/Utente/registration">&nbsp; Sign Up &nbsp;</a> <?php }?> </div>
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
  <pingendo onclick="window.open('https://pingendo.com/', '_blank')" style="cursor:pointer;position: fixed;bottom: 10px;right:10px;padding:4px;background-color: #00b0eb;border-radius: 8px; width:250px;display:flex;flex-direction:row;align-items:center;justify-content:center;font-size:14px;color:white">Made with Pingendo Free&nbsp;&nbsp;
    <img src="https://pingendo.com/site-assets/Pingendo_logo_big.png" class="d-block" alt="Pingendo logo" height="16">
  </pingendo>
</body>

</html>
<?php }
}
