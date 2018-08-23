<?php
/* Smarty version 3.1.32, created on 2018-05-30 23:18:38
  from 'C:\xampp\htdocs\APP\Smarty\templates\Homepage.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5b0f152ed9fa23_72872490',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9c3abfe81f9e5fd6760474b0071aacc7dc5675e1' => 
    array (
      0 => 'C:\\xampp\\htdocs\\APP\\Smarty\\templates\\Homepage.tpl',
      1 => 1527675620,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:navbar.tpl' => 1,
  ),
),false)) {
function content_5b0f152ed9fa23_72872490 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="Smarty/templates/css/theme.css" type="text/css"> </head>

<body>
<?php $_smarty_tpl->_subTemplateRender('file:navbar.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
  <div class="py-5 text-center" style="background-image: url('Smarty/img/wallpaperRazzo.jpg');background-size:cover;">
    <div class="container py-5">
      <div class="row">
        <div class="col-md-12">
          <h1 class="display-3 mb-4 text-primary">Hero image intro</h1>
          <p class="lead mb-5 text-light">Pingendo is a HTML editor for everyone. Easy for newbies, useful for professionals.
            <br>Code quality is a must. Pingendo generates clean, battle-tested, modular Bootstrap 4 code. </p>
          <a href="#" class="btn btn-lg mx-1 btn-primary">Start a Project!</a>
          <a href="#" class="btn btn-lg btn-primary mx-1">Back a Project!</a>
        </div>
      </div>
    </div>
  </div>
  <div class="py-5 text-center bg-light">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h1>Start a Project in three simple steps!</h1>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4 p-4">
          <img class="img-fluid d-block rounded-circle mx-auto" src="https://pingendo.github.io/templates/sections/assets/test_meow.jpg">
          <p class="my-4">
            <i>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa.</i>
          </p>
          <p>
            <b>Meow</b>
            <br>Senior developer</p>
        </div>
        <div class="col-md-4 p-4">
          <img class="img-fluid d-block rounded-circle mx-auto" src="https://pingendo.github.io/templates/sections/assets/test_fish.jpg">
          <p class="my-4">
            <i>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec. </i>
          </p>
          <p>
            <b>J. L. Fish</b>
            <br>UI designer</p>
        </div>
        <div class="col-md-4 p-4">
          <img class="img-fluid d-block rounded-circle mx-auto" src="https://pingendo.github.io/templates/sections/assets/test_carlito.jpg">
          <p class="my-4">
            <i>Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Cum sociis natoque penatibus et magnis dis parturient montes.</i>
          </p>
          <p>
            <b>Carlito</b>
            <br>Boss</p>
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
