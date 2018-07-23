<?php
/* Smarty version 3.1.32, created on 2018-07-23 11:52:50
  from 'C:\xampp\htdocs\AppCrowdFunding\Smarty\templates\profileinfo.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5b55a572b24375_28214761',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '01c46b4c21549a2fc8485377a1f9bc83fbadaa2f' => 
    array (
      0 => 'C:\\xampp\\htdocs\\AppCrowdFunding\\Smarty\\templates\\profileinfo.tpl',
      1 => 1532339541,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b55a572b24375_28214761 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="/AppCrowdFunding/Smarty/templates/css/theme.css">
</head>

<body>
<div class="row wait" id="modalattention" style="visibility:hidden">
        <div class="col-md-3"> </div>
        <div class="col-md-6">
          <div class="card text-white p-5 bg-primary box-input1">
            <div class="card-body">
              <h4 class="card-title">Attenzione! Ti ricordiamo che la cancellazione dell'account è irreversibile e comporta la cancellazione di tutte le campagne!.</h4>
              <a class="btn btn-light text-dark" style="height:40px;width:150px" onclick="cancel()" >Cancel</a>
              <a class="btn btn-danger" style="height:40px;width:150px" href="/AppCrowdFunding/Utente/removeUser/<?php echo $_smarty_tpl->tpl_vars['username']->value;?>
" >Delete Account</a>
            </div>
          </div>
        </div>
      </div>
        <div class="col-md-12">
          <div class="card w-100 h-100">
            <div class="card-body">
              <h5 class="card-title">Description:</h5>
              <p class="card-text" id="cidescription">
                <i>"<?php echo $_smarty_tpl->tpl_vars['description']->value;?>
"</i>
              </p>
            </div>
            <div class="card-body">
              <h5 class="card-title">Address and Telephone number:</h5>
              <p class="card-text" style="display:inline">City: </p><p class="card-text" id="cicity" style="display:inline"><?php echo $_smarty_tpl->tpl_vars['city']->value;?>
</p>
              <br>
              <p class="card-text" style="display:inline">Street: </p><p class="card-text" style="display:inline" id="cistreet"><?php echo $_smarty_tpl->tpl_vars['street']->value;?>
</p><p class="card-text" style="display:inline">, </p><p class="card-text" id="cinumber" style="display:inline"><?php echo $_smarty_tpl->tpl_vars['number']->value;?>
 </p>
              <br>
              <p class="card-text" style="display:inline">Zipcode: </p><p class="card-text" id="cizipcode" style="display:inline"><?php echo $_smarty_tpl->tpl_vars['zipcode']->value;?>
</p>
              <br>
              <p class="card-text" style="display:inline">Country: </p><p class="card-text" id="cicountry" style="display:inline"><?php echo $_smarty_tpl->tpl_vars['country']->value;?>
</p>
              <br>
              <p class="card-text" style="display:inline">Tel. Number:</p><p class="card-text" id="citelnumber" style="display:inline"><?php echo $_smarty_tpl->tpl_vars['telnum']->value;?>
</p>
            </div>
            <div class="card-body">
              <h5 class="card-title">Other:</h5>
              <p class="card-text" style="display:inline">Birth date: </p> <p class="card-text" id="cidatan" style="display:inline"><?php echo $_smarty_tpl->tpl_vars['datan']->value;?>
</p>
              <p class="card-text">Sex: <?php echo $_smarty_tpl->tpl_vars['sex']->value;?>
</p>
            </div>
            <?php if ($_smarty_tpl->tpl_vars['myProf']->value == "true") {?>
            <div class="card-body">
              <h5 class="card-title">Account management:</h5>
              <a class="btn btn-primary text-light" onclick="openmodifypanel()" >Modify profile</a>
              <a class="btn btn-danger text-light" onclick="attention()" >Delete Account</a>
            </div>
            <?php }?>
          </div>

        </div>
  <?php echo '<script'; ?>
 src="/AppCrowdFunding/Smarty/templates/js/modal.js"><?php echo '</script'; ?>
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
