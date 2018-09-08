<?php
/* Smarty version 3.1.32, created on 2018-09-08 12:28:47
  from 'C:\xampp\htdocs\AppCrowdFunding\Smarty\templates\AddReward.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5b93a45f2c4898_48110328',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b1c6ce004978e27b3a1637a1df921a6f723f8b6c' => 
    array (
      0 => 'C:\\xampp\\htdocs\\AppCrowdFunding\\Smarty\\templates\\AddReward.tpl',
      1 => 1536402522,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b93a45f2c4898_48110328 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="C:/xampp/htdocs/AppCrowdFunding/Smarty/templates/css/theme.css">
</head>

<body>
  <div class="py-5 wait" style="position:fixed;top:5%;visibility:hidden" id="modalreward">
    <div class="container">
      <div class="row">
        <div class="col-md-3"> </div>
        <div class="col-md-6">
          <div class="card text-white p-5 bg-light">
            <div class="card-body">
              <h1 class="mb-4 text-primary">Add Reward</h1>
              <form id="rewardform">
                <div class="form-group">
                  <label class="text-primary">Name</label>
                  <input type="text" class="form-control" name="name" id="name"> </div>
                <div class="form-group">
                  <label class="text-primary">Amount</label>
                  <input type="number" class="form-control" name="amount" id="amount"> </div>
                <div class="form-group">
                  <label class="text-primary">Description</label>
                  <input type="text" class="form-control" name="description" id="description"> </div>
                <button type="button" class="btn btn-primary" onclick="cancelreward()">Cancel</button>
                <button type="button" class="btn btn-primary" onclick="AddReward(<?php echo $_smarty_tpl->tpl_vars['idcamp']->value;?>
)">Submit</button>
              </form>
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
