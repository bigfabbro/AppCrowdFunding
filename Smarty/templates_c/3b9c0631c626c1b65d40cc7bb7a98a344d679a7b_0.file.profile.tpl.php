<?php
/* Smarty version 3.1.32, created on 2018-08-21 11:40:07
  from 'C:\xampp\htdocs\AppCrowdFunding\Smarty\templates\profile.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5b7bddf71f1939_00695984',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3b9c0631c626c1b65d40cc7bb7a98a344d679a7b' => 
    array (
      0 => 'C:\\xampp\\htdocs\\AppCrowdFunding\\Smarty\\templates\\profile.tpl',
      1 => 1534407772,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:navbar.tpl' => 1,
    'file:modifyprof.tpl' => 1,
    'file:profileinfo.tpl' => 1,
    'file:campprofile.tpl' => 1,
  ),
),false)) {
function content_5b7bddf71f1939_00695984 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="/AppCrowdFunding/Smarty/templates/css/theme.css"> </head>

<body style="background-image: url('/AppCrowdFunding/Smarty/img/wallpaperRazzo.jpg'); background-size:cover;">
<?php $_smarty_tpl->_subTemplateRender('file:navbar.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
$_smarty_tpl->_subTemplateRender('file:modifyprof.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('description'=>$_smarty_tpl->tpl_vars['user']->value->getBio(),'city'=>$_smarty_tpl->tpl_vars['address']->value->getCity(),'street'=>$_smarty_tpl->tpl_vars['address']->value->getStreet(),'number'=>$_smarty_tpl->tpl_vars['address']->value->getNum(),'zipcode'=>$_smarty_tpl->tpl_vars['address']->value->getZipcode(),'country'=>$_smarty_tpl->tpl_vars['address']->value->getCountry(),'datan'=>$_smarty_tpl->tpl_vars['user']->value->getDatan(),'telnum'=>$_smarty_tpl->tpl_vars['user']->value->getTel()), 0, false);
?>
  <div class="py-5 text-center ">
    <div class="container">
      <div class="row">
        <div class="p-4" style="transition: all 0.25s;">
          <div class="card text-white p-5 m-0 box-input1" style="width:390px;height:650px">
            <div class="card-block my-3">
              <img class="d-block rounded-circle img-fluid" src="data:image/jpeg;base64,<?php echo $_smarty_tpl->tpl_vars['pic64']->value;?>
" width=200 height=200>
              <hr>
              <p class="text-left">Username: <?php echo $_smarty_tpl->tpl_vars['user']->value->getUsername();?>
</p>
              <hr>
              <p class="text-left">Email: <?php echo $_smarty_tpl->tpl_vars['user']->value->getEmail();?>
</p>
              <hr>
              <p class="text-left">Name: <?php echo $_smarty_tpl->tpl_vars['user']->value->getName();?>
</p>
              <hr>
              <p class="text-left">Surname: <?php echo $_smarty_tpl->tpl_vars['user']->value->getSurname();?>
</p>
            </div>
          </div>
        </div>
        <div class="col-md-12 col-lg-7 bg-light box-input1" style="transition: all 0.25s;">
          <ul class="nav nav-tabs">
            <li class="nav-item">
              <a href="" class="active nav-link" data-toggle="tab" data-target="#tabone">Bio</a>
            </li>
            <li class="nav-item">
              <a href="" class="nav-link" data-toggle="tab" data-target="#tabtwo">My Campaign</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="" data-toggle="tab" data-target="#tabthree">My Pledge</a>
            </li>
          </ul>
          <div class="tab-content mt-2" style="height:650px;overflow-x:hidden;overflow-y:auto">
            <div class="tab-pane fade show active" id="tabone" role="tabpanel">
              <?php $_smarty_tpl->_subTemplateRender('file:profileinfo.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('username'=>$_smarty_tpl->tpl_vars['user']->value->getUserName(),'description'=>$_smarty_tpl->tpl_vars['user']->value->getBio(),'city'=>$_smarty_tpl->tpl_vars['address']->value->getCity(),'street'=>$_smarty_tpl->tpl_vars['address']->value->getStreet(),'number'=>$_smarty_tpl->tpl_vars['address']->value->getNum(),'zipcode'=>$_smarty_tpl->tpl_vars['address']->value->getZipcode(),'country'=>$_smarty_tpl->tpl_vars['address']->value->getCountry(),'sex'=>$_smarty_tpl->tpl_vars['user']->value->getSex(),'datan'=>$_smarty_tpl->tpl_vars['user']->value->getDatan(),'telnum'=>$_smarty_tpl->tpl_vars['user']->value->getTel()), 0, false);
?>
            </div>
            <div class="tab-pane fade" id="tabtwo" role="tabpanel">
              <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['camps']->value, 'camp');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['camp']->value) {
?>
              <?php $_smarty_tpl->_subTemplateRender('file:campprofile.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('myProf'=>$_smarty_tpl->tpl_vars['myProf']->value,'id'=>$_smarty_tpl->tpl_vars['camp']->value->getId(),'name'=>$_smarty_tpl->tpl_vars['camp']->value->getName(),'description'=>$_smarty_tpl->tpl_vars['camp']->value->getDescription(),'goal'=>$_smarty_tpl->tpl_vars['camp']->value->getGoal(),'funds'=>$_smarty_tpl->tpl_vars['camp']->value->getFunds(),'photo'=>$_smarty_tpl->tpl_vars['photos']->value[$_smarty_tpl->tpl_vars['camp']->value->getId()]), 0, true);
?>
              <hr>
              <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </div>
            <div class="tab-pane fade" id="tabthree" role="tabpanel">
              <p class="">TAB PLEDGED</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <br>
  <br>
  <?php echo '<script'; ?>
 src="/AppCrowdFunding/Smarty/templates/js/profile.js"><?php echo '</script'; ?>
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
