<?php
/* Smarty version 3.1.32, created on 2018-09-07 12:22:37
  from 'C:\xampp\htdocs\AppCrowdFunding\Smarty\templates\endcreateproject.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5b92516d9e9ea8_34659367',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8c5319d9eeda08e2abb85934bff5364788729f28' => 
    array (
      0 => 'C:\\xampp\\htdocs\\AppCrowdFunding\\Smarty\\templates\\endcreateproject.tpl',
      1 => 1536315550,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:navbar.tpl' => 1,
  ),
),false)) {
function content_5b92516d9e9ea8_34659367 (Smarty_Internal_Template $_smarty_tpl) {
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
          <h1 class="display-3 mb-4 text-primary">Benvenuto!</h1>
          <p class="lead mb-5 text-white">Grande! Hai creato la tua nuova campagna!
            <br>Clicca sul bottone a sinistra per vedere la pagina della tua campagna, oppure sul bottone a destra per tornare alla home!
            <br>
          </p>
          <a href="/AppCrowdFunding/Campagna/profile/<?php echo $_smarty_tpl->tpl_vars['idcamp']->value;?>
" class="btn btn-lg btn-primary mx-1">Vedi Campagna</a>
          <a href="/AppCrowdFunding/Homepage" class="btn btn-lg btn-primary mx-1">Homepage</a>
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
