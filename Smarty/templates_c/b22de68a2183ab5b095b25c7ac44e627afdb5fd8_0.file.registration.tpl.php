<?php
/* Smarty version 3.1.32, created on 2018-07-23 18:33:37
  from 'C:\xampp\htdocs\AppCrowdFunding\Smarty\templates\registration.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5b560361caebb9_73835233',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b22de68a2183ab5b095b25c7ac44e627afdb5fd8' => 
    array (
      0 => 'C:\\xampp\\htdocs\\AppCrowdFunding\\Smarty\\templates\\registration.tpl',
      1 => 1532363340,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:navbar.tpl' => 1,
  ),
),false)) {
function content_5b560361caebb9_73835233 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="/AppCrowdFunding/Smarty/templates/css/theme.css" type="text/css"> 
</head>

<body style="background-image: url('/AppCrowdFunding/Smarty/img/wallpaperRazzo.jpg');background-size:cover;">
<?php $_smarty_tpl->_subTemplateRender('file:navbar.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
      <div class="row wait" id="modalwait" style="visibility:hidden">
        <div class="col-md-3"> </div>
        <div class="col-md-6">
          <div class="card text-white p-5 bg-primary ">
            <div class="card-body">
              <h4 class="card-title">Attendi qualche secondo, stiamo elaborando la tua richiesta.</h4>
            </div>
          </div>
        </div>
      </div>
  <div class="py-5" style="height:940px">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h1 class="text-center text-light">Registration</h1>
        </div>
      </div>
    </div>
    <form action="registration" method="POST" enctype="multipart/form-data">
     <div class="container">
      <div class="row">
        <div class="col-md-6">
          <div class="card">
            <div class="card-body p-5 style="height:940px"">
              <h3 class="pb-3">Basic Information</h3>
                <div class="form-group">
                  <label>Name</label>
                  <?php if (isset($_smarty_tpl->tpl_vars['errors']->value) && $_smarty_tpl->tpl_vars['errors']->value['name'] == "true") {?>
                  <input class="form-control border border-danger" placeholder="Your name, please" required="required" name="name" id="name"></div>
                  <?php } elseif (isset($_smarty_tpl->tpl_vars['errors']->value)) {?>
                      <input class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['values']->value['name'];?>
" required="required" name="name" id="name"></div>
                  <?php } else { ?>
                      <input class="form-control" placeholder="Your name, please" required="required" name="name" id="name"></div>
                  <?php }?>
                <div class="form-group">
                  <label>Surname</label>
                  <?php if (isset($_smarty_tpl->tpl_vars['errors']->value) && $_smarty_tpl->tpl_vars['errors']->value['surname'] == "true") {?>
                  <input class="form-control border border-danger" required="required" placeholder="You surname, please" required="required" name="surname" id="surname"> </div>
                  <?php } elseif (isset($_smarty_tpl->tpl_vars['errors']->value)) {?>
                  <input class="form-control required="required"  value="<?php echo $_smarty_tpl->tpl_vars['values']->value['surname'];?>
" required="required" name="surname" id="surname"> </div>
                  <?php } else { ?>
                  <input class="form-control" required="required" placeholder="You surname, please" required="required" name="surname" id="surname"> </div>
                  <?php }?>
                  <div class="form-group">
                  <label>Sesso</label>
                  <br>
                  <center><label>M</label></center><input class="form-control" name="sex" type="radio" value="M" required="required" checked="checked">
                  <center><label>F</label></center><input class="form-control" name="sex" type="radio" value="F"> 
                  </div>
                <div class="form-group">
                  <label>Date of Birth</label>
                  <?php if (isset($_smarty_tpl->tpl_vars['errors']->value) && $_smarty_tpl->tpl_vars['errors']->value['date'] == "true") {?>
                  <input type="date" class="form-control border border-danger"  required="required" name="date" id="data"> </div>
                  <?php } elseif (isset($_smarty_tpl->tpl_vars['errors']->value)) {?>
                  <input type="date" class="form-control"  value="<?php echo $_smarty_tpl->tpl_vars['values']->value['date'];?>
" required="required" name="date" id="data"> </div>
                  <?php } else { ?>
                  <input type="date" class="form-control"  required="required" name="date" id="data"> </div>
                  <?php }?>
                <div class="form-group">
                  <label>Address</label>
                  <?php if (isset($_smarty_tpl->tpl_vars['errors']->value) && $_smarty_tpl->tpl_vars['errors']->value['city'] == "true") {?>
                  <input type="text" class="form-control border border-danger" placeholder="City" required="required" name="city" id="city">
                  <?php } elseif (isset($_smarty_tpl->tpl_vars['errors']->value)) {?>
                  <input type="text" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['values']->value['city'];?>
" required="required" name="city" id="city">
                  <?php } else { ?>
                  <input type="text" class="form-control" placeholder="City" required="required" name="city" id="city">
                  <?php }?>
                  <?php if (isset($_smarty_tpl->tpl_vars['errors']->value) && $_smarty_tpl->tpl_vars['errors']->value['street'] == "true") {?>
                  <input type="text" class="form-control border border-danger" placeholder="Street" required="required" name="street" id="street">
                  <?php } elseif (isset($_smarty_tpl->tpl_vars['errors']->value)) {?>
                  <input type="text" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['values']->value['street'];?>
"  required="required" name="street" id="street">
                  <?php } else { ?>
                  <input type="text" class="form-control" placeholder="Street" required="required" name="street" id="street">
                  <?php }?>
                  <?php if (isset($_smarty_tpl->tpl_vars['errors']->value) && $_smarty_tpl->tpl_vars['errors']->value['number'] == "true") {?>
                  <input type="number" class="form-control border border-danger" placeholder="Number" required="required" name="number" id="number">
                  <?php } elseif (isset($_smarty_tpl->tpl_vars['errors']->value)) {?>
                  <input type="number" class="form-control border" value="<?php echo $_smarty_tpl->tpl_vars['values']->value['number'];?>
" required="required" name="number" id="number">
                  <?php } else { ?>
                  <input type="number" class="form-control" placeholder="Number" required="required" name="number" id="number">
                  <?php }?>
                  <?php if (isset($_smarty_tpl->tpl_vars['errors']->value) && $_smarty_tpl->tpl_vars['errors']->value['zipcode'] == "true") {?>
                  <input type="text" class="form-control border border-danger" placeholder="Zipcode" required="required" name="zipcode" id="zipcode">
                  <?php } elseif (isset($_smarty_tpl->tpl_vars['errors']->value)) {?>
                  <input type="text" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['values']->value['zipcode'];?>
" required="required" name="zipcode" id="zipcode">
                  <?php } else { ?>
                  <input type="text" class="form-control" placeholder="Zipcode" required="required" name="zipcode" id="zipcode">
                  <?php }?>
                  <?php if (isset($_smarty_tpl->tpl_vars['errors']->value) && $_smarty_tpl->tpl_vars['errors']->value['country'] == "true") {?>
                  <input type="text" class="form-control border border-danger" required="required" placeholder="Country" name="country" id="country"> </div>
                  <?php } elseif (isset($_smarty_tpl->tpl_vars['errors']->value)) {?>
                  <input type="text" class="form-control" required="required" value="<?php echo $_smarty_tpl->tpl_vars['values']->value['country'];?>
" name="country" id="country"> </div>
                  <?php } else { ?>
                  <input type="text" class="form-control" required="required" placeholder="Country" name="country" id="country"> </div>
                  <?php }?>
                  <label>Telephon number</label>
                  <?php if (isset($_smarty_tpl->tpl_vars['errors']->value) && $_smarty_tpl->tpl_vars['errors']->value['telnumber'] == "true") {?>
                  <input type="text" class="form-control border border-danger" placeholder="Your telephon number, please" name="telnumber" > </div>
                  <?php } elseif (isset($_smarty_tpl->tpl_vars['errors']->value)) {?>
                  <input type="text" class="form-control border" value="<?php echo $_smarty_tpl->tpl_vars['values']->value['telnumber'];?>
" name="telnumber" > </div>
                  <?php } else { ?>
                  <input type="text" class="form-control border" placeholder="Your telephon number, please" name="telnumber" > </div>
                  <?php }?>
                <div class="form-group">
              </form>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="card">
            <div class="card-body p-5 style="height:955px">
              <h3 class="pb-3">Profile information</h3>
                <div class="form-group">
                  <label>E-mail</label>
                  <?php if (isset($_smarty_tpl->tpl_vars['errors']->value) && $_smarty_tpl->tpl_vars['errors']->value['email'] == "true") {?>
                  <input type="email" class="form-control border border-danger" placeholder="Your email, please" required="required" name="email" id="email"> </div>
                  <?php } elseif (isset($_smarty_tpl->tpl_vars['errors']->value)) {?> 
                  <input type="email" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['values']->value['email'];?>
" required="required" name="email" id="email"> </div>
                  <?php } else { ?>
                  <input type="email" class="form-control" placeholder="Your email, please" required="required" name="email" id="email"> </div>
                  <?php }?>
                <div class="form-group">
                  <label>Username</label>
                  <?php if (isset($_smarty_tpl->tpl_vars['errors']->value) && $_smarty_tpl->tpl_vars['errors']->value['email'] == "true") {?>
                  <input class="form-control border border-danger" placeholder="Choose a username!" required="required" name="username" id="username"> </div>
                  <?php } elseif (isset($_smarty_tpl->tpl_vars['errors']->value)) {?>
                  <input class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['values']->value['username'];?>
" required="required" name="username" id="username"> </div>
                  <?php } else { ?>
                  <input class="form-control" placeholder="Choose a username!" required="required" name="username" id="username"> </div>
                  <?php }?>
                <div class="form-group">
                  <label>Password</label>
                 <?php if (isset($_smarty_tpl->tpl_vars['errors']->value) && $_smarty_tpl->tpl_vars['errors']->value['password'] == "true") {?>
                  <input type="password" class="form-control border border-danger" placeholder="Choose a password" required="required" name="password1" id="password1"> </div>
                 <?php } else { ?>
                 <input type="password" class="form-control" placeholder="Choose a password" required="required" name="password1" id="password1"> </div>
                 <?php }?>
                <div class="form-group">
                  <label>Confirm Password</label>
                  <?php if (isset($_smarty_tpl->tpl_vars['errors']->value) && $_smarty_tpl->tpl_vars['errors']->value['password'] == "true") {?>
                  <input type="password" class="form-control border border-danger" placeholder="Re-insert the same password" required="required" name="password2" id="password2"> </div>
                 <?php } else { ?>
                 <input type="password" class="form-control" placeholder="Re-insert the same password" required="required" name="password2" id="password2"> </div>
                 <?php }?>
                <div class="form-group">
                  <label>Short description</label>
                  <textarea class="form-control form-control-lg" id="exampleTextarea" rows="3" name="description"></textarea>
                </div>
                <div class="form-group">
                  <label>Picture&nbsp;</label>
                  <?php if (isset($_smarty_tpl->tpl_vars['errors']->value) && $_smarty_tpl->tpl_vars['errors']->value['profpic'] == "true") {?>
                  <input type="file" class="form-control-file border boder-danger" name="upicture" accept="image/*"> </div>
                  <?php } else { ?>
                  <input type="file" class="form-control-file" name="upicture" accept="image/*"> </div>
                  <?php }?>
                <button type="submit" class="btn btn-primary btn-lg submit-button" onclick="wait()">Submit</button>
            </div>
          </div>
        </div>
      </div>
    </div>
    </form>
  </div>
  <?php echo '<script'; ?>
 src="/AppCrowdFunding/Smarty/templates/js/wait.js"><?php echo '</script'; ?>
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
