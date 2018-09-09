<?php
/* Smarty version 3.1.32, created on 2018-09-07 17:26:17
  from 'C:\xampp\htdocs\AppCrowdFunding\Smarty\templates\modifyprof.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5b929899c45f46_37664089',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '394ab027d9776fbc7938f53d6abfaa75caabaa7b' => 
    array (
      0 => 'C:\\xampp\\htdocs\\AppCrowdFunding\\Smarty\\templates\\modifyprof.tpl',
      1 => 1536333778,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b929899c45f46_37664089 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="C:/Users/Bigfa/Documents/GitHub/AppCrowdFunding/Smarty/templates/css/theme.css"> </head>

<body>
  <div class="py-5 wait" style="top:0%;visibility:hidden"" id="modalmodify" >
    <div class="container">
      <div class="row box-input1 bg-light">
        <div class="col-md-6">
          <div class="card-body p-5">
            <h3 class="pb-3">Modify your profile&nbsp;</h3>
            <form action="#" id="formmodify">
              <div class="form-group">
                <label>Address</label>
                <input class="form-control" placeholder="City" value="<?php echo $_smarty_tpl->tpl_vars['city']->value;?>
" id="city" name="city" onchange="inputVerifyModify(this.id)"> </div>
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Street" value="<?php echo $_smarty_tpl->tpl_vars['street']->value;?>
" id="street" name="street" onchange="inputVerifyModify(this.id)"> </div>
              <div class="form-group">
                <input type="number" class="form-control" placeholder="Number" value="<?php echo $_smarty_tpl->tpl_vars['number']->value;?>
" id="number" name="number" onchange="inputVerifyModify(this.id)"> </div>
              <div class="form-group">
                <input type="number" class="form-control" placeholder="Zipcode" value="<?php echo $_smarty_tpl->tpl_vars['zipcode']->value;?>
" id="zipcode" name="zipcode" onchange="inputVerifyModify(this.id)"> </div>
            <div class="form-group">
              <input type="text" class="form-control" placeholder="Country" value="<?php echo $_smarty_tpl->tpl_vars['country']->value;?>
" id="country" name="country"  onchange="inputVerifyModify(this.id)"> 
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="card-body p-5">
              <div class="form-group">
                <label>Telephone number</label>
                <input class="form-control" placeholder="Tel. number" value="<?php echo $_smarty_tpl->tpl_vars['telnum']->value;?>
" id="telnumber" name="telnumber"  onchange="inputVerifyModify(this.id)"> 
              </div>
              <div class="form-group">
                <label>Date of Birth</label>
                <input class="form-control" type="date" value="<?php echo $_smarty_tpl->tpl_vars['datan']->value;?>
" id="datan" name="datan" onchange="inputVerifyModify(this.id)"> 
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Description</label>
                <textarea class="form-control" rows="3" id="description" name="description"><?php echo $_smarty_tpl->tpl_vars['description']->value;?>
</textarea>
              </div>
               <button type="button" class="btn mt-2 btn-outline-primary"  onclick="cancelmodify()" >Cancel</button>
              <button type="button" class="btn mt-2 btn-outline-primary"  onclick="closemodifypanel()" id="endbutton">Finish</button>
            </form>
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
