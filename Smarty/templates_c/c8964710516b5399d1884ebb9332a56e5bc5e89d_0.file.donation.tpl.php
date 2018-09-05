<?php
/* Smarty version 3.1.32, created on 2018-09-05 12:05:14
  from 'C:\xampp\htdocs\AppCrowdFunding\Smarty\templates\donation.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5b8faa5a367a52_71371713',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c8964710516b5399d1884ebb9332a56e5bc5e89d' => 
    array (
      0 => 'C:\\xampp\\htdocs\\AppCrowdFunding\\Smarty\\templates\\donation.tpl',
      1 => 1536141911,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:navbar.tpl' => 1,
  ),
),false)) {
function content_5b8faa5a367a52_71371713 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="/AppCrowdFunding/Smarty/templates/css/theme.css" type="text/css"> 
</head>

<?php $_smarty_tpl->_subTemplateRender('file:navbar.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
<body style="background-image: url('/AppCrowdFunding/Smarty/img/login.jpg'); background-size:cover;">
  <div class="py-5 w-100 h-100">
    <div class="container">
      <div class="row">
        <div class="align-self-center col-md-6 text-white">
          <h1 class="text-md-left display-3 text-light">
            <b>Support: <?php echo $_smarty_tpl->tpl_vars['NomeCampagna']->value;?>
</b>
          </h1>
          <p>“No one is useless in this world who lightens the burdens of another.”&nbsp;
            <br>― Charles Dickens</p>
        </div>
        <div class="col-md-6">
          <div class="row">
            <div class="col-md-12">
              <div class="card text-white p-5 bg-light">
                <div class="card-body">
                  <h1 class="mb-4 bg-light text-primary">Donate</h1>
                  
                  <form action="/AppCrowdFunding/Donazione/make/<?php echo $_smarty_tpl->tpl_vars['idcamp']->value;?>
" method="POST">
                  
                  <div class="form-group bg-light">
                      <label class="text-primary">Owner Name</label>
                      <input type="text" class="form-control" placeholder="Enter Owner Name" name="ownername"> </div>
                    <div class="form-group bg-light">
                      <label class="text-primary">Owner Surname</label>
                      <input type="text" class="form-control" placeholder="Enter Owner Surname" name="ownersurname"> </div>
                    <div class="form-group bg-light">
                      <label class="text-primary">Credit Card Number</label>
                      <input type="text" class="form-control" placeholder="Enter Credit Card Number" name="ccnumber"> </div>
                    <div class="form-group bg-light">
                      <label class="text-primary">Expiration Date</label>
                      <input type="date" class="form-control" placeholder="Enter username" name="expirationdate"> </div>
                    <div class="form-group bg-light">
                      <label class="text-primary">CCV</label>
                      <input type="text" class="form-control" placeholder="Enter CCV" name="ccv"> </div>
                    <div class="form-group bg-light">
                      <label class="text-primary">Amount</label>
                      <input type="number" class="form-control" placeholder="How much would you like to donate?" name="amount"> </div>
                    <button type="submit" class="btn btn-primary" onclick="Submit()">Donate</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

    <div class="container">
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbar3SupportedContent">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse text-center justify-content-center" id="navbar3SupportedContent"> </div>
    </div>
  </nav>
  <?php echo '<script'; ?>
 src="/AppCrowdFunding/Smarty/templates/js/donation.js"><?php echo '</script'; ?>
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
