<?php
/* Smarty version 3.1.32, created on 2018-08-03 17:00:48
  from 'C:\xampp\htdocs\AppCrowdFunding\Smarty\templates\camppage.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5b646e2006a5f6_60698446',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '307f81076d87b845fc318afd68fd18224d66d76f' => 
    array (
      0 => 'C:\\xampp\\htdocs\\AppCrowdFunding\\Smarty\\templates\\camppage.tpl',
      1 => 1533308443,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:navbar.tpl' => 1,
  ),
),false)) {
function content_5b646e2006a5f6_60698446 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_assignInScope('piccount', count($_smarty_tpl->tpl_vars['camppic']->value));?> <?php $_smarty_tpl->_assignInScope('commcount', count($_smarty_tpl->tpl_vars['comments']->value));?> <?php $_smarty_tpl->_assignInScope('doncount', count($_smarty_tpl->tpl_vars['donations']->value));?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="/AppCrowdFunding/Smarty/templates/css/theme.css" type="text/css">
</head>

<body style="background-image: url('/AppCrowdFunding/Smarty/img/wallpaperRazzo.jpg');background-size:cover;background-repeat:repeat">
  <?php $_smarty_tpl->_subTemplateRender('file:navbar.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
  <div class="p-4 my-4">
    <div class="container">
      <div class="row">
        <div class="col-md-12 bg-light box-input1">
          <div class="row">
            <div class="col-md-8 align-items-center align-self-center">
              <h1 class="text-center m-0 p-2"><?php echo $_smarty_tpl->tpl_vars['camp']->value->getName();?>
</h1>
            </div>
            <div class="col-md-2">
              <p class="lead py-3 m-0 text-center">By <a href="/AppCrowdFunding/Utente/profile/<?php echo $_smarty_tpl->tpl_vars['founder']->value->getUsername();?>
"><?php echo $_smarty_tpl->tpl_vars['founder']->value->getUsername();?>
</a>
                <br> </p>
            </div>
            <div class="col-md-2">
              <img class="img-fluid d-block rounded-circle mx-auto" src="data:image/jpeg;base64,<?php echo $_smarty_tpl->tpl_vars['founderpic']->value;?>
" width="100" height="100"> </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="p-4">
    <div class="container">
      <div class="row">
        <div class="col-md-9">
          <div class="row bg-light mx-auto box-input1">
            <div class="col-md-3 align-items-center align-self-center p-0">
              <p class="lead m-0 py-1 text-center">Goal:<br><?php echo $_smarty_tpl->tpl_vars['camp']->value->getGoal();?>
</p>
            </div>
            <div class="col-md-3 align-items-center align-self-center p-0">
              <p class="lead m-0 py-1 text-center">Funds:<br><?php echo $_smarty_tpl->tpl_vars['camp']->value->getFunds();?>
</p>
            </div>
            <div class="col-md-3 align-items-center align-self-center p-0">
              <p class="lead m-0 py-1 text-center">Start date:<br><?php echo $_smarty_tpl->tpl_vars['camp']->value->getStartDate();?>
</p>
            </div>
            <div class="col-md-3 align-items-center align-self-center px-3">
              <p class="lead m-0 py-1 text-center">End date:<br><?php echo $_smarty_tpl->tpl_vars['camp']->value->getEndDate();?>
</p>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12 py-3">
              <div class="progress">
                <div class="progress-bar progress-bar-striped" role="progressbar" style="width: <?php echo (100*$_smarty_tpl->tpl_vars['camp']->value->getFunds())/$_smarty_tpl->tpl_vars['camp']->value->getGoal();?>
%"><?php echo (100*$_smarty_tpl->tpl_vars['camp']->value->getFunds())/$_smarty_tpl->tpl_vars['camp']->value->getGoal();?>
%</div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div id="carousel" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                  <?php if ($_smarty_tpl->tpl_vars['camppic']->value == null) {?>
                  <div class="carousel-item active">
                      <img class="d-block img-fluid w-100" src="https://pingendo.com/assets/photos/wireframe/photo-1.jpg"> 
                   </div>
                   <?php } else { ?> 
                   <?php
$_smarty_tpl->tpl_vars['i'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int) ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? $_smarty_tpl->tpl_vars['piccount']->value-1+1 - (0) : 0-($_smarty_tpl->tpl_vars['piccount']->value-1)+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0) {
for ($_smarty_tpl->tpl_vars['i']->value = 0, $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++) {
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration === 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration === $_smarty_tpl->tpl_vars['i']->total;?>
                   <?php if ($_smarty_tpl->tpl_vars['i']->value == 0) {?>
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
                <?php if ($_smarty_tpl->tpl_vars['piccount']->value > 1) {?>
                <a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev">
                  <span class="carousel-control-prev-icon"></span>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carousel" role="button" data-slide="next">
                  <span class="carousel-control-next-icon"></span>
                  <span class="sr-only">Next</span>
                </a>
                <?php }?>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-3 box-input1">
          <div class="row">
            <div class="col-md-12 align-items-center align-self-center">
              <p class="lead text-center">Rewards</p>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12" style="height:520px;overflow-x: hidden; overflow-y: auto">
              <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['rewards']->value, 'rew');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['rew']->value) {
?>
              <div class="card">
                <div class="card-header"> <?php echo $_smarty_tpl->tpl_vars['rew']->value->getName();?>
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
  <div class="p-4">
    <div class="container">
      <div class="row">
        <div class="col-md-9">
          <div class="row bg-light mx-auto box-input1">
            <div class="col-md-12">
              <div class="row">
                <div class="col-md-12">
                  <h1 class="">
                    <u>Description</u>
                  </h1>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <p class="lead"><?php echo $_smarty_tpl->tpl_vars['camp']->value->getDescription();?>
</p>
                </div>
              </div>
            </div>
          </div>
          <div class="row bg-light box-input1 mx-auto my-1">
            <div class="col-md-12">
              <div class="row">
                <div class="col-md-12">
                  <p class="lead text-center">Comments (<?php echo $_smarty_tpl->tpl_vars['commcount']->value;?>
)</p>
                </div>
              </div>
              <div class="row">
               <div class="col-md-12" style="height:500px;overflow-x:hidden;overflow-y:auto">
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
                <div class="card-header"><?php echo $_smarty_tpl->tpl_vars['authors']->value[$_smarty_tpl->tpl_vars['i']->value];?>
</div>
                <?php }?>
                <div class="card-body">
                  <h4><?php echo $_smarty_tpl->tpl_vars['comments']->value[$_smarty_tpl->tpl_vars['i']->value]->getText();?>
</h4>
                </div>
              </div>
              <?php }
}
?>
              </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <?php if (isset($_smarty_tpl->tpl_vars['userlogged']->value)) {?>
                  <button class="btn btn-outline-primary my-1" onclick="opencommentmodal()" id="commentbtn">Make a comment!</button>
                  <?php } else { ?>
                  <a href="/AppCrowdFunding/Utente/login" class="btn btn-outline-primary my-1">Make a comment!</a>
                  <?php }?>
                </div>
              </div>
              <div class="row my-2" style="display:none" id="modalcomment">
               <div class="col-md-12">
               <div class="card">
                <div class="card-header"> Your comment </div>
                <div class="card-body">
                <form class="" id="commentform">
                <div class="form-group">
                  <textarea class="form-control" id="commText" rows="3"></textarea>
                </div>
                <button type="button" class="btn btn-primary" onclick="cancelcomment()">Cancel</button>
                <button type="button" class="btn btn-primary" onclick="comment(<?php echo $_smarty_tpl->tpl_vars['camp']->value->getId();?>
)">Submit</button>
                 </form>
                </div>
               </div>
               </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-3 box-input1">
          <div class="row">
            <div class="col-md-12 align-items-center align-self-center">
              <p class="lead text-center">Donations</p>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12" style="height:600px;overflow-x:hidden; overflow-y:auto">
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
                  <p>Date: <?php echo $_smarty_tpl->tpl_vars['donations']->value[$_smarty_tpl->tpl_vars['i']->value]->getDate();?>
</p>
                </div>
              </div>
              <?php }
}
?>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12 text-center">
              <a href="#" class="btn my-1 btn-outline-light">Make a donation!</a>
            </div>
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
</body>

</html><?php }
}
