<?php
/* Smarty version 3.1.32, created on 2018-08-02 18:40:41
  from 'C:\xampp\htdocs\AppCrowdFunding\Smarty\templates\campaignpage.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5b6334099284b9_32851013',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'aa861c53d83187413cf3df27efbcb8b5fdf7e9d1' => 
    array (
      0 => 'C:\\xampp\\htdocs\\AppCrowdFunding\\Smarty\\templates\\campaignpage.tpl',
      1 => 1533228039,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:navbar.tpl' => 1,
    'file:comment.tpl' => 1,
  ),
),false)) {
function content_5b6334099284b9_32851013 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html>
   <head>
      <link rel="stylesheet" href="css/theme.css">
   </head>
   <body style="background-image: url('/AppCrowdFunding/Smarty/img/wallpaperRazzo.jpg');background-size:cover;">
      <?php $_smarty_tpl->_assignInScope('piccount', count($_smarty_tpl->tpl_vars['camppic']->value));?> <?php $_smarty_tpl->_assignInScope('commcount', count($_smarty_tpl->tpl_vars['comments']->value));?> <?php $_smarty_tpl->_assignInScope('doncount', count($_smarty_tpl->tpl_vars['donations']->value));?>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
      <link rel="stylesheet" href="/AppCrowdFunding/Smarty/templates/css/theme.css" type="text/css">
      <?php $_smarty_tpl->_subTemplateRender('file:navbar.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?> <?php $_smarty_tpl->_subTemplateRender('file:comment.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
      <div class="py-5">
         <div class="container bg-light box-input1">
            <div class="row">
               <div class="col-md-9 p-0 m-0 align-self-center">
                  <h1 class="text-center"><?php echo $_smarty_tpl->tpl_vars['camp']->value->getName();?>
</h1>
               </div>
               <div class="col-md-3">
                  <div class="row">
                     <div class="col-md-6 text-center align-self-center">
                        <h5 class="">by
                           <a href="/AppCrowdFunding/Utente/profile/<?php echo $_smarty_tpl->tpl_vars['founder']->value->getUsername();?>
"><?php echo $_smarty_tpl->tpl_vars['founder']->value->getUsername();?>
</a>
                        </h5>
                     </div>
                     <div class="col-md-6">
                        <img class="img-fluid d-block rounded-circle mx-auto" src="data:image/jpeg;base64,<?php echo $_smarty_tpl->tpl_vars['founderpic']->value;?>
" style="width:80; height:80"> 
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="p-2">
         <div class="container">
            <div class="row">
               <div class="col-md-9">
                  <div class="row box-input1 bg-light mx-auto">
                     <div class="col-md-3">
                        <p>Goal:<?php echo $_smarty_tpl->tpl_vars['camp']->value->getGoal();?>
</p>
                     </div>
                     <div class="col-md-3">
                        <p>Funds:<?php echo $_smarty_tpl->tpl_vars['camp']->value->getFunds();?>
</p>
                     </div>
                     <div class="col-md-3">
                        <p>Start date:<?php echo $_smarty_tpl->tpl_vars['camp']->value->getStartDate();?>
</p>
                     </div>
                     <div class="col-md-3">
                        <p>End date:<?php echo $_smarty_tpl->tpl_vars['camp']->value->getEndDate();?>
</p>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-md-12">
                        <div class="progress m-3">
                           <div class="progress-bar progress-bar-striped" role="progressbar" style="width: <?php echo (100*$_smarty_tpl->tpl_vars['camp']->value->getFunds())/$_smarty_tpl->tpl_vars['camp']->value->getGoal();?>
%"><?php echo (100*$_smarty_tpl->tpl_vars['camp']->value->getFunds())/$_smarty_tpl->tpl_vars['camp']->value->getGoal();?>
%</div>
                        </div>
                     </div>
                  </div>
                  <div class="row mx-auto">
                     <div class="col-md-12">
                        <div id="carousel" class="carousel slide" data-ride="carousel">
                           <div class="carousel-inner">
                              <?php if ($_smarty_tpl->tpl_vars['camppic']->value == null) {?>
                              <div class="carousel-item active">
                                 <img class="d-block img-fluid w-100" src="https://pingendo.com/assets/photos/wireframe/photo-1.jpg"> 
                              </div>
                              <div class="carousel-item">
                                 <img class="d-block img-fluid w-100" src="https://pingendo.com/assets/photos/wireframe/photo-1.jpg"> 
                              </div>
                              <?php } else { ?> <?php
$_smarty_tpl->tpl_vars['i'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int) ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? $_smarty_tpl->tpl_vars['piccount']->value-1+1 - (0) : 0-($_smarty_tpl->tpl_vars['piccount']->value-1)+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0) {
for ($_smarty_tpl->tpl_vars['i']->value = 0, $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++) {
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration === 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration === $_smarty_tpl->tpl_vars['i']->total;?> <?php if ($_smarty_tpl->tpl_vars['i']->value == 0) {?>
                              <div class="carousel-item active">
                                 <img class="d-block img-fluid w-100" src="data:image/jpeg;base64,<?php echo $_smarty_tpl->tpl_vars['camppic']->value[$_smarty_tpl->tpl_vars['i']->value];?>
"> 
                              </div>
                              <?php } else { ?>
                              <div class="carousel-item">
                                 <img class="d-block img-fluid w-100" src="data:image/jpeg;base64,<?php echo $_smarty_tpl->tpl_vars['camppic']->value[$_smarty_tpl->tpl_vars['i']->value];?>
"> 
                              </div>
                              <?php }?> <?php }
}
?> <?php }?> 
                           </div>
                           <?php if ($_smarty_tpl->tpl_vars['piccount']->value == 1) {?>
                           <a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev">
                           <span class="carousel-control-prev-icon"></span>
                           <span class="sr-only">Previous</span>
                           </a>
                           <a class="carousel-control-next" href="#carousel" role="button" data-slide="next">
                           <span class="carousel-control-next-icon"></span>
                           <span class="sr-only">Next</span>
                           </a> <?php }?> 
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-md-3 bg-primary box-input1">
                  <div class="row">
                     <div class="col-md-12 align-self-center">
                        <p class="lead m-0 text-center">Rewards</p>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-md-12" style="height: 600px; overflow-x: hidden; overflow-y: auto;">
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['rewards']->value, 'rew');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['rew']->value) {
?>
                        <div class="card">
                           <div class="card-header"><?php echo $_smarty_tpl->tpl_vars['rew']->value->getName();?>
</div>
                           <div class="card-body">
                              <h4><?php echo $_smarty_tpl->tpl_vars['rew']->value->getPledged();?>
€</h4>
                              <p><?php echo $_smarty_tpl->tpl_vars['rew']->value->getDescriptionRe();?>
</p>
                           </div>
                        </div>
                        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?> 
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="p-1">
         <div class="container"> </div>
      </div>
      <div class="p-2" style="height:600px">
         <div class="container">
            <div class="row">
               <div class="h-100 col-md-9">
                  <div class="row box-input1 bg-light mx-auto">
                     <div class="col-md-12 h-50">
                        <p class="lead my-0 h-100" style="height:600px">
                           <i>
                           <u>Description:</u>
                           </i> <?php echo $_smarty_tpl->tpl_vars['camp']->value->getDescription();?>

                           <br>
                           <br>
                           <br>
                           <i>
                           <u>Category:</u>
                           </i> <?php echo $_smarty_tpl->tpl_vars['camp']->value->getCategory();?>

                           <br>
                           <br>
                           <br>
                           <i>
                           <u>Country:</u>
                           </i> <?php echo $_smarty_tpl->tpl_vars['camp']->value->getCountry();?>
 
                        </p>
                     </div>
                  </div>
                  <div class="row box-input1 bg-light mx-auto" style="height:500px">
                     <div class="col-md-12 h-100">
                        <div class="row">
                           <div class="col-md-12">
                              <p class="lead p-0 text-center">Comments (<?php echo $_smarty_tpl->tpl_vars['commcount']->value;?>
)</p>
                           </div>
                        </div>
                        <div class="row h-75">
                           <div class="col-md-12" style="overflow-x:hidden;overflow-y:auto">
                              <?php
$_smarty_tpl->tpl_vars['i'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int) ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? $_smarty_tpl->tpl_vars['commcount']->value-1+1 - (0) : 0-($_smarty_tpl->tpl_vars['commcount']->value-1)+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0) {
for ($_smarty_tpl->tpl_vars['i']->value = 0, $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++) {
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration === 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration === $_smarty_tpl->tpl_vars['i']->total;?>
                              <div class="card">
                                 <?php if ($_smarty_tpl->tpl_vars['authors']->value[$_smarty_tpl->tpl_vars['i']->value] != "anonymous") {?>
                                 <div class="card-header">
                                    <a href="/AppCrowdFunding/Utente/profile/<?php echo $_smarty_tpl->tpl_vars['authors']->value[$_smarty_tpl->tpl_vars['i']->value];?>
"><?php echo $_smarty_tpl->tpl_vars['authors']->value[$_smarty_tpl->tpl_vars['i']->value];?>
</a>
                                 </div>
                                 <?php } else { ?>
                                 <div class="card-header"> <?php echo $_smarty_tpl->tpl_vars['authors']->value[$_smarty_tpl->tpl_vars['i']->value];?>
</div>
                                 <?php }?>
                                 <div class="card-body">
                                    <p><?php echo $_smarty_tpl->tpl_vars['comments']->value[$_smarty_tpl->tpl_vars['i']->value]->getText();?>
</p>
                                 </div>
                              </div>
                              <?php }
}
?> 
                           </div>
                        </div>
                        <div class="row h-25">
                           <div class="col-md-12">
                              <button type="button" class="btn btn-primary" onclick="opencommentmodal()" style="position:absolute;top:20px">Make a comment!</button>
                           </div>
                        </div>
                     </div>
                     <div class="col-md-12 h-100"> </div>
                  </div>
               </div>
               <div class="h-100 col-md-3">
                  <div class="col-md-12 bg-primary box-input1" >
                     <div class="row">
                        <div class="col-md-12 align-self-center">
                           <p class="lead m-0 text-center">Donations</p>
                        </div>
                     </div>
                     <div class="row" style="height:650px">
                        <div class="col-md-12" style="overflow-x:hidden;overflow-y:auto">
                           <?php
$_smarty_tpl->tpl_vars['i'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int) ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? $_smarty_tpl->tpl_vars['doncount']->value-1+1 - (0) : 0-($_smarty_tpl->tpl_vars['doncount']->value-1)+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0) {
for ($_smarty_tpl->tpl_vars['i']->value = 0, $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++) {
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration === 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration === $_smarty_tpl->tpl_vars['i']->total;?>
                           <div class="card">
                           <?php if ($_smarty_tpl->tpl_vars['donators']->value[$_smarty_tpl->tpl_vars['i']->value] != "anonymous") {?>
                              <div class="card-header">by <a href="/AppCrowdFunding/Utente/profile/<?php echo $_smarty_tpl->tpl_vars['donators']->value[$_smarty_tpl->tpl_vars['i']->value];?>
"><?php echo $_smarty_tpl->tpl_vars['donators']->value[$_smarty_tpl->tpl_vars['i']->value];?>
</a></div>
                            <?php } else { ?>
                              <div class="card-header">by <?php echo $_smarty_tpl->tpl_vars['donators']->value[$_smarty_tpl->tpl_vars['i']->value];?>
</div>
                            <?php }?>
                              <div class="card-body">
                                 <h4>Amount: <?php echo $_smarty_tpl->tpl_vars['donations']->value[$_smarty_tpl->tpl_vars['i']->value]->getAmount();?>
€</h4>
                                 <p>date: <?php echo $_smarty_tpl->tpl_vars['donations']->value[$_smarty_tpl->tpl_vars['i']->value]->getDate();?>
</p>
                              </div>
                           </div>
                           <?php }
}
?> 
                        </div>
                     </div>
                       <div class="row">
              <div class="col-md-12">
                              <button type="button" class="btn btn-light">Make a comment!</button>
              </div>
            </div>
                  </div>
               </div>
            </div>
            <?php echo '<script'; ?>
 src="/AppCrowdFunding/Smarty/templates/js/comment.js"><?php echo '</script'; ?>
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
         </div>
      </div>
   </body>
</html><?php }
}
