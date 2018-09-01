<?php
/* Smarty version 3.1.32, created on 2018-09-01 18:59:46
  from 'C:\xampp\htdocs\AppCrowdFunding\Smarty\templates\categorypage.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5b8ac582616977_91259461',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1963ee93930837c54e1875c4abc87ff6e7ab0eb7' => 
    array (
      0 => 'C:\\xampp\\htdocs\\AppCrowdFunding\\Smarty\\templates\\categorypage.tpl',
      1 => 1535821183,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:navbar.tpl' => 1,
  ),
),false)) {
function content_5b8ac582616977_91259461 (Smarty_Internal_Template $_smarty_tpl) {
if ($_smarty_tpl->tpl_vars['tecno']->value != null) {
$_smarty_tpl->_assignInScope('teccount', count($_smarty_tpl->tpl_vars['tecno']->value));
}
if ($_smarty_tpl->tpl_vars['art']->value != null) {
$_smarty_tpl->_assignInScope('artcount', count($_smarty_tpl->tpl_vars['art']->value));
}
if ($_smarty_tpl->tpl_vars['charities']->value != null) {
$_smarty_tpl->_assignInScope('charcount', count($_smarty_tpl->tpl_vars['charities']->value));
}
if ($_smarty_tpl->tpl_vars['music']->value != null) {
$_smarty_tpl->_assignInScope('musiccount', count($_smarty_tpl->tpl_vars['music']->value));
}
if ($_smarty_tpl->tpl_vars['food']->value != null) {
$_smarty_tpl->_assignInScope('foodcount', count($_smarty_tpl->tpl_vars['food']->value));
}
if ($_smarty_tpl->tpl_vars['fashion']->value != null) {
$_smarty_tpl->_assignInScope('fashioncount', count($_smarty_tpl->tpl_vars['fashion']->value));
}
if ($_smarty_tpl->tpl_vars['filmvid']->value != null) {
$_smarty_tpl->_assignInScope('filmcount', count($_smarty_tpl->tpl_vars['filmvid']->value));
}?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="/AppCrowdFunding/Smarty/templates/css/theme.css" type="text/css"> </head>

<body style="background-image: url('/AppCrowdFunding/Smarty/img/wallpaperRazzo.jpg');background-size:cover;">
<?php $_smarty_tpl->_subTemplateRender('file:navbar.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
  <div class="py-5">
    <div class="container">
      <div class="row">
        <div class="bg-light box-input1 p-0 col-md-5 mx-auto">
          <div class="row">
            <div class="col-md-12">
              <h1 class="text-center">Tecnology</h1>
            </div>
          </div>
          <div class="row h-25 px-1">
            <div class="col-md-12">
              <div class="row">
                <div class="col-md-2">
                  <p class="lead m-1 text-center">#</p>
                </div>
                <div class="p-0 col-md-6">
                  <p class="lead m-1 text-center">Name</p>
                </div>
                <div class="col-md-4 p-0">
                  <p class="lead m-1 text-center">funds</p>
                </div>
              </div>
              <?php if (isset($_smarty_tpl->tpl_vars['teccount']->value)) {?>
              <?php
$_smarty_tpl->tpl_vars['i'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int) ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? $_smarty_tpl->tpl_vars['teccount']->value-1+1 - (0) : 0-($_smarty_tpl->tpl_vars['teccount']->value-1)+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0) {
for ($_smarty_tpl->tpl_vars['i']->value = 0, $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++) {
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration === 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration === $_smarty_tpl->tpl_vars['i']->total;?>
              <div class="row">
                <div class="col-md-2">
                  <p class="lead m-1 text-center"><?php echo $_smarty_tpl->tpl_vars['i']->value+1;?>
</p>
                </div>
                <div class="col-md-6 p-0">
                  <p class="lead m-1 text-center"><a href="/AppCrowdFunding/Campagna/profile/<?php echo $_smarty_tpl->tpl_vars['tecno']->value[$_smarty_tpl->tpl_vars['i']->value]->getId();?>
"><?php echo $_smarty_tpl->tpl_vars['tecno']->value[$_smarty_tpl->tpl_vars['i']->value]->getName();?>
</a></p>
                </div>
                <div class="col-md-4 align-items-center align-self-center text-center">
                  <div class="progress">
                    <div class="progress-bar progress-bar-striped" role="progressbar" style="width: <?php echo (100*$_smarty_tpl->tpl_vars['tecno']->value[$_smarty_tpl->tpl_vars['i']->value]->getFunds())/$_smarty_tpl->tpl_vars['tecno']->value[$_smarty_tpl->tpl_vars['i']->value]->getGoal();?>
%"><?php echo (100*$_smarty_tpl->tpl_vars['tecno']->value[$_smarty_tpl->tpl_vars['i']->value]->getFunds())/$_smarty_tpl->tpl_vars['tecno']->value[$_smarty_tpl->tpl_vars['i']->value]->getGoal();?>
%</div>
                  </div>
                </div>
              </div>
              <?php }
}
?>
              <?php } else { ?>
              <div class="row">
                <div class="col-md-12">
                  <p class="lead m-1 text-center">Non ci sono campagne</p>
                </div>
              </div>
              <?php }?>
            </div>
          </div>
        </div>
        <div class="bg-light box-input1 col-md-5 mx-auto">
          <div class="row">
            <div class="col-md-12">
              <h1 class="text-center">Art</h1>
            </div>
          </div>
          <div class="row h-25">
            <div class="col-md-12">
              <div class="row">
                <div class="col-md-2">
                  <p class="lead m-1 text-center">#</p>
                </div>
                <div class="p-0 col-md-6">
                  <p class="lead m-1 text-center">Name</p>
                </div>
                <div class="col-md-4 p-0">
                  <p class="lead m-1 text-center">funds</p>
                </div>
              </div>
              <?php if (isset($_smarty_tpl->tpl_vars['artcount']->value)) {?>
              <?php
$_smarty_tpl->tpl_vars['i'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int) ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? $_smarty_tpl->tpl_vars['artcount']->value-1+1 - (0) : 0-($_smarty_tpl->tpl_vars['artcount']->value-1)+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0) {
for ($_smarty_tpl->tpl_vars['i']->value = 0, $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++) {
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration === 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration === $_smarty_tpl->tpl_vars['i']->total;?>
              <div class="row">
                <div class="col-md-2">
                  <p class="lead m-1 text-center"><?php echo $_smarty_tpl->tpl_vars['i']->value+1;?>
</p>
                </div>
                <div class="col-md-6 p-0">
                  <p class="lead m-1 text-center"><a href="/AppCrowdFunding/Campagna/profile/<?php echo $_smarty_tpl->tpl_vars['art']->value[$_smarty_tpl->tpl_vars['i']->value]->getId();?>
"><?php echo $_smarty_tpl->tpl_vars['art']->value[$_smarty_tpl->tpl_vars['i']->value]->getName();?>
</a></p>
                </div>
                <div class="col-md-4 align-items-center align-self-center text-center">
                  <div class="progress">
                    <div class="progress-bar progress-bar-striped" role="progressbar" style="width: <?php echo (100*$_smarty_tpl->tpl_vars['art']->value[$_smarty_tpl->tpl_vars['i']->value]->getFunds())/$_smarty_tpl->tpl_vars['art']->value[$_smarty_tpl->tpl_vars['i']->value]->getGoal();?>
%"><?php echo (100*$_smarty_tpl->tpl_vars['art']->value[$_smarty_tpl->tpl_vars['i']->value]->getFunds())/$_smarty_tpl->tpl_vars['art']->value[$_smarty_tpl->tpl_vars['i']->value]->getGoal();?>
%</div>
                  </div>
                </div>
              </div>
              <?php }
}
?>
              <?php } else { ?>
              <div class="row">
                <div class="col-md-12">
                  <p class="lead m-1 text-center">Non ci sono campagne</p>
                </div>
              </div>
              <?php }?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="py-5">
    <div class="container">
      <div class="row">
        <div class="bg-light box-input1 p-0 col-md-5 mx-auto">
          <div class="row">
            <div class="col-md-12">
              <h1 class="text-center">Charities</h1>
            </div>
          </div>
          <div class="row h-25 px-1">
            <div class="col-md-12">
              <div class="row">
                <div class="col-md-2">
                  <p class="lead m-1 text-center">#</p>
                </div>
                <div class="p-0 col-md-6">
                  <p class="lead m-1 text-center">Name</p>
                </div>
                <div class="col-md-4 p-0">
                  <p class="lead m-1 text-center">funds</p>
                </div>
              </div>
              <?php if (isset($_smarty_tpl->tpl_vars['charcount']->value)) {?>
              <?php
$_smarty_tpl->tpl_vars['i'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int) ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? $_smarty_tpl->tpl_vars['charcount']->value-1+1 - (0) : 0-($_smarty_tpl->tpl_vars['charcount']->value-1)+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0) {
for ($_smarty_tpl->tpl_vars['i']->value = 0, $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++) {
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration === 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration === $_smarty_tpl->tpl_vars['i']->total;?>
              <div class="row">
                <div class="col-md-2">
                  <p class="lead m-1 text-center"><?php echo $_smarty_tpl->tpl_vars['i']->value+1;?>
</p>
                </div>
                <div class="col-md-6 p-0">
                  <p class="lead m-1 text-center"><a href="/AppCrowdFunding/Campagna/profile/<?php echo $_smarty_tpl->tpl_vars['charities']->value[$_smarty_tpl->tpl_vars['i']->value]->getId();?>
"><?php echo $_smarty_tpl->tpl_vars['charities']->value[$_smarty_tpl->tpl_vars['i']->value]->getName();?>
</a></p>
                </div>
                <div class="col-md-4 align-items-center align-self-center text-center">
                  <div class="progress">
                    <div class="progress-bar progress-bar-striped" role="progressbar" style="width: <?php echo (100*$_smarty_tpl->tpl_vars['charities']->value[$_smarty_tpl->tpl_vars['i']->value]->getFunds())/$_smarty_tpl->tpl_vars['charities']->value[$_smarty_tpl->tpl_vars['i']->value]->getGoal();?>
%"><?php echo (100*$_smarty_tpl->tpl_vars['charities']->value[$_smarty_tpl->tpl_vars['i']->value]->getFunds())/$_smarty_tpl->tpl_vars['charities']->value[$_smarty_tpl->tpl_vars['i']->value]->getGoal();?>
%</div>
                  </div>
                </div>
              </div>
              <?php }
}
?>
              <?php } else { ?>
                <div class="row">
                <div class="col-md-12">
                  <p class="lead m-1 text-center">Non ci sono campagne</p>
                </div>
              </div>
              <?php }?>
            </div>
          </div>
        </div>
        <div class="bg-light box-input1 col-md-5 mx-auto">
          <div class="row">
            <div class="col-md-12">
              <h1 class="text-center">Music</h1>
            </div>
          </div>
          <div class="row h-25">
            <div class="col-md-12">
              <div class="row">
                <div class="col-md-2">
                  <p class="lead m-1 text-center">#</p>
                </div>
                <div class="p-0 col-md-6">
                  <p class="lead m-1 text-center">Name</p>
                </div>
                <div class="col-md-4 p-0">
                  <p class="lead m-1 text-center">funds</p>
                </div>
              </div>
              <?php if (isset($_smarty_tpl->tpl_vars['musiccount']->value)) {?>
              <?php
$_smarty_tpl->tpl_vars['i'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int) ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? $_smarty_tpl->tpl_vars['musiccount']->value-1+1 - (0) : 0-($_smarty_tpl->tpl_vars['musiccount']->value-1)+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0) {
for ($_smarty_tpl->tpl_vars['i']->value = 0, $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++) {
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration === 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration === $_smarty_tpl->tpl_vars['i']->total;?>
              <div class="row">
                <div class="col-md-2">
                  <p class="lead m-1 text-center"><?php echo $_smarty_tpl->tpl_vars['i']->value+1;?>
</p>
                </div>
                <div class="col-md-6 p-0">
                  <p class="lead m-1 text-center"><a href="/AppCrowdFunding/Campagna/profile/<?php echo $_smarty_tpl->tpl_vars['music']->value[$_smarty_tpl->tpl_vars['i']->value]->getId();?>
"><?php echo $_smarty_tpl->tpl_vars['music']->value[$_smarty_tpl->tpl_vars['i']->value]->getName();?>
</a></p>
                </div>
                <div class="col-md-4 align-items-center align-self-center text-center">
                  <div class="progress">
                    <div class="progress-bar progress-bar-striped" role="progressbar" style="width: <?php echo (100*$_smarty_tpl->tpl_vars['music']->value[$_smarty_tpl->tpl_vars['i']->value]->getFunds())/$_smarty_tpl->tpl_vars['music']->value[$_smarty_tpl->tpl_vars['i']->value]->getGoal();?>
%"><?php echo (100*$_smarty_tpl->tpl_vars['music']->value[$_smarty_tpl->tpl_vars['i']->value]->getFunds())/$_smarty_tpl->tpl_vars['music']->value[$_smarty_tpl->tpl_vars['i']->value]->getGoal();?>
%</div>
                  </div>
                </div>
              </div>
              <?php }
}
?>
              <?php } else { ?>
              <div class="row">
                <div class="col-md-12">
                  <p class="lead m-1 text-center">Non ci sono campagne</p>
                </div>
              </div>
              <?php }?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="py-5">
    <div class="container">
      <div class="row">
        <div class="bg-light box-input1 p-0 col-md-5 mx-auto">
          <div class="row">
            <div class="col-md-12">
              <h1 class="text-center">Food</h1>
            </div>
          </div>
          <div class="row h-25 px-1">
            <div class="col-md-12">
              <div class="row">
                <div class="col-md-2">
                  <p class="lead m-1 text-center">#</p>
                </div>
                <div class="p-0 col-md-6">
                  <p class="lead m-1 text-center">Name</p>
                </div>
                <div class="col-md-4 p-0">
                  <p class="lead m-1 text-center">funds</p>
                </div>
              </div>
              <?php if (isset($_smarty_tpl->tpl_vars['foodcount']->value)) {?>
              <?php
$_smarty_tpl->tpl_vars['i'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int) ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? $_smarty_tpl->tpl_vars['foodcount']->value-1+1 - (0) : 0-($_smarty_tpl->tpl_vars['foodcount']->value-1)+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0) {
for ($_smarty_tpl->tpl_vars['i']->value = 0, $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++) {
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration === 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration === $_smarty_tpl->tpl_vars['i']->total;?>
              <div class="row">
                <div class="col-md-2">
                  <p class="lead m-1 text-center"><?php echo 'i'+1;?>
</p>
                </div>
                <div class="col-md-6 p-0">
                  <p class="lead m-1 text-center"><a href="/AppCrowdFunding/Campagna/profile/<?php echo $_smarty_tpl->tpl_vars['food']->value[$_smarty_tpl->tpl_vars['i']->value]->getId();?>
"><?php echo $_smarty_tpl->tpl_vars['food']->value[$_smarty_tpl->tpl_vars['i']->value]->getName();?>
</a></p>
                </div>
                <div class="col-md-4 align-items-center align-self-center text-center">
                  <div class="progress">
                    <div class="progress-bar progress-bar-striped" role="progressbar" style="width: <?php echo (100*$_smarty_tpl->tpl_vars['food']->value[$_smarty_tpl->tpl_vars['i']->value]->getFunds())/$_smarty_tpl->tpl_vars['food']->value[$_smarty_tpl->tpl_vars['i']->value]->getGoal();?>
%"><?php echo (100*$_smarty_tpl->tpl_vars['food']->value[$_smarty_tpl->tpl_vars['i']->value]->getFunds())/$_smarty_tpl->tpl_vars['food']->value[$_smarty_tpl->tpl_vars['i']->value]->getGoal();?>
%</div>
                  </div>
                </div>
              </div>
              <?php }
}
?>
              <?php } else { ?>
              <div class="row">
                <div class="col-md-12">
                  <p class="lead m-1 text-center">Non ci sono campagne</p>
                </div>
              </div>
              <?php }?>
            </div>
          </div>
        </div>
        <div class="bg-light box-input1 col-md-5 mx-auto">
          <div class="row">
            <div class="col-md-12">
              <h1 class="text-center">Fashion</h1>
            </div>
          </div>
          <div class="row h-25">
            <div class="col-md-12">
              <div class="row">
                <div class="col-md-2">
                  <p class="lead m-1 text-center">#</p>
                </div>
                <div class="p-0 col-md-6">
                  <p class="lead m-1 text-center">Name</p>
                </div>
                <div class="col-md-4 p-0">
                  <p class="lead m-1 text-center">funds</p>
                </div>
              </div>
              <?php if (isset($_smarty_tpl->tpl_vars['fashioncount']->value)) {?>
              <?php
$_smarty_tpl->tpl_vars['i'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int) ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? $_smarty_tpl->tpl_vars['fashioncount']->value-1+1 - (0) : 0-($_smarty_tpl->tpl_vars['fashioncount']->value-1)+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0) {
for ($_smarty_tpl->tpl_vars['i']->value = 0, $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++) {
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration === 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration === $_smarty_tpl->tpl_vars['i']->total;?>
              <div class="row">
                <div class="col-md-2">
                  <p class="lead m-1 text-center"><?php echo 'i'+1;?>
</p>
                </div>
                <div class="col-md-6 p-0">
                  <p class="lead m-1 text-center"><a href="/AppCrowdFunding/Campagna/profile/<?php echo $_smarty_tpl->tpl_vars['fashion']->value[$_smarty_tpl->tpl_vars['i']->value]->getId();?>
"><?php echo $_smarty_tpl->tpl_vars['fashion']->value[$_smarty_tpl->tpl_vars['i']->value]->getName();?>
</a></p>
                </div>
                <div class="col-md-4 align-items-center align-self-center text-center">
                  <div class="progress">
                    <div class="progress-bar progress-bar-striped" role="progressbar" style="width: <?php echo (100*$_smarty_tpl->tpl_vars['fashion']->value[$_smarty_tpl->tpl_vars['i']->value]->getFunds())/$_smarty_tpl->tpl_vars['fashion']->value[$_smarty_tpl->tpl_vars['i']->value]->getGoal();?>
%"><?php echo (100*$_smarty_tpl->tpl_vars['fashion']->value[$_smarty_tpl->tpl_vars['i']->value]->getFunds())/$_smarty_tpl->tpl_vars['fashion']->value[$_smarty_tpl->tpl_vars['i']->value]->getGoal();?>
%</div>
                  </div>
                </div>
              </div>
              <?php }
}
?>
              <?php } else { ?>
              <div class="row">
                <div class="col-md-12">
                  <p class="lead m-1 text-center">Non ci sono campagne</p>
                </div>
              </div>
              <?php }?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="py-5">
    <div class="container">
      <div class="row">
        <div class="bg-light box-input1 p-0 col-md-5 mx-auto">
          <div class="row">
            <div class="col-md-12">
              <h1 class="text-center">Film &amp; Video</h1>
            </div>
          </div>
          <div class="row h-25 px-1">
            <div class="col-md-12">
              <div class="row">
                <div class="col-md-2">
                  <p class="lead m-1 text-center">#</p>
                </div>
                <div class="p-0 col-md-6">
                  <p class="lead m-1 text-center">Name</p>
                </div>
                <div class="col-md-4 p-0">
                  <p class="lead m-1 text-center">funds</p>
                </div>
              </div>
              <?php if (isset($_smarty_tpl->tpl_vars['filmvidcount']->value)) {?>
              <?php
$_smarty_tpl->tpl_vars['i'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int) ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? $_smarty_tpl->tpl_vars['filmvidcount']->value-1+1 - (0) : 0-($_smarty_tpl->tpl_vars['filmvidcount']->value-1)+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0) {
for ($_smarty_tpl->tpl_vars['i']->value = 0, $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++) {
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration === 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration === $_smarty_tpl->tpl_vars['i']->total;?>
              <div class="row">
                <div class="col-md-2">
                  <p class="lead m-1 text-center"><?php echo $_smarty_tpl->tpl_vars['i']->value+1;?>
</p>
                </div>
                <div class="col-md-6 p-0">
                  <p class="lead m-1 text-center"><a href="/AppCrowdFunding/Campagna/profile/<?php echo $_smarty_tpl->tpl_vars['filmvid']->value[$_smarty_tpl->tpl_vars['i']->value]->getId();?>
"><?php echo $_smarty_tpl->tpl_vars['filmvid']->value[$_smarty_tpl->tpl_vars['i']->value]->getName();?>
</a></p>
                </div>
                <div class="col-md-4 align-items-center align-self-center text-center">
                  <div class="progress">
                    <div class="progress-bar progress-bar-striped" role="progressbar" style="width: <?php echo (100*$_smarty_tpl->tpl_vars['filmvid']->value[$_smarty_tpl->tpl_vars['i']->value]->getFunds())/$_smarty_tpl->tpl_vars['filmvid']->value[$_smarty_tpl->tpl_vars['i']->value]->getGoal();?>
%"><?php echo (100*$_smarty_tpl->tpl_vars['filmvid']->value[$_smarty_tpl->tpl_vars['i']->value]->getFunds())/$_smarty_tpl->tpl_vars['filmvid']->value[$_smarty_tpl->tpl_vars['i']->value]->getGoal();?>
%</div>
                  </div>
                </div>
              </div>
              <?php }
}
?>
              <?php } else { ?>
              <div class="row">
                <div class="col-md-12">
                  <p class="lead m-1 text-center">Non ci sono campagne</p>
                </div>
              </div>
              <?php }?>
            </div>
          </div>
        </div>
        <div class="bg-light box-input1 col-md-5 mx-auto">
          <div class="row">
            <div class="col-md-12">
              <h1 class="text-center">Last insert</h1>
            </div>
          </div>
          <div class="row h-25">
            <div class="col-md-12">
              <div class="row">
                <div class="col-md-2">
                  <p class="lead m-1 text-center">#</p>
                </div>
                <div class="p-0 col-md-6">
                  <p class="lead m-1 text-center">Name</p>
                </div>
                <div class="col-md-4 p-0">
                  <p class="lead m-1 text-center">funds</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="py-5">
    <div class="container">
      <div class="row">
        <div class="bg-light box-input1 p-0 col-md-5 mx-auto">
          <div class="row">
            <div class="col-md-12">
              <h1 class="text-center">Expiring</h1>
            </div>
          </div>
          <div class="row h-25 px-1">
            <div class="col-md-12">
              <div class="row">
                <div class="col-md-2">
                  <p class="lead m-1 text-center">#</p>
                </div>
                <div class="p-0 col-md-6">
                  <p class="lead m-1 text-center">Name</p>
                </div>
                <div class="col-md-4 p-0">
                  <p class="lead m-1 text-center">funds</p>
                </div>
              </div>
              <div class="row">
                <div class="col-md-2">
                  <p class="lead m-1 text-center">pos</p>
                </div>
                <div class="col-md-6 p-0">
                  <p class="lead m-1 text-center">Nome campagna</p>
                </div>
                <div class="col-md-4 align-items-center align-self-center text-center">
                  <div class="progress">
                    <div class="progress-bar progress-bar-striped" role="progressbar" style="width: 50%">50%</div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="bg-light box-input1 col-md-5 mx-auto">
          <div class="row">
            <div class="col-md-12">
              <h1 class="text-center">Best of today</h1>
            </div>
          </div>
          <div class="row h-25">
            <div class="col-md-12">
              <div class="row">
                <div class="col-md-2">
                  <p class="lead m-1 text-center">#</p>
                </div>
                <div class="p-0 col-md-6">
                  <p class="lead m-1 text-center">Name</p>
                </div>
                <div class="col-md-4 p-0">
                  <p class="lead m-1 text-center">funds</p>
                </div>
              </div>
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
