<?php
/* Smarty version 3.1.32, created on 2018-08-21 11:31:29
  from 'C:\xampp\htdocs\AppCrowdFunding\Smarty\templates\navbar.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5b7bdbf173f613_40320730',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7ee9defdfd6e8654ab1d6c42e02279c280ba6b9b' => 
    array (
      0 => 'C:\\xampp\\htdocs\\AppCrowdFunding\\Smarty\\templates\\navbar.tpl',
      1 => 1534843370,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b7bdbf173f613_40320730 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_assignInScope('userlogged', (($tmp = @$_smarty_tpl->tpl_vars['userlogged']->value)===null||$tmp==='' ? 'nouser' : $tmp));?>


  <nav class="navbar navbar-expand-md navbar-dark bg-primary">
    <div class="container">
      <a class="navbar-brand" href="/AppCrowdFunding/HomePage">
        <i class="fa d-inline fa-lg fa-cloud"></i>
        <b>&nbsp;Society Of Funding</b>
      </a>

      <ul class="navbar-nav" >
          <li class="nav-item text-light" >
            <a class="nav-link" href="/AppCrowdFunding/HomePage"> Home Page</a>
          </li>
        </ul>

      <ul class="navbar-nav">
          <li class="nav-item text-light"  >
            <a class="nav-link" href="/AppCrowdFunding/Info/info"   > Chi siamo</a>
          </li>
        </ul>

      <ul class="navbar-nav">
          <li class="nav-item text-light" >
            <a class="nav-link" <?php if (!$_smarty_tpl->tpl_vars['info']->value) {?> href="/AppCrowdFunding/Info/info" <?php } else { ?> href="#scelta" <?php }?>> Perché sceglierci</a>
          </li>
        </ul>


      <ul class="navbar-nav">
          <li class="nav-item text-light" >
            <a class="nav-link" <?php if (!$_smarty_tpl->tpl_vars['info']->value) {?>  href="/AppCrowdFunding/Info/info" <?php } else { ?> href="#contatti" <?php }?>> Contatti</a>
          </li>
        </ul>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbar2SupportedContent">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse text-center justify-content-end" id="navbar2SupportedContent">
        <ul class="navbar-nav">
        <?php if ($_smarty_tpl->tpl_vars['userlogged']->value != 'nouser') {?>
          <li class="nav-item text-light">
            <a class="nav-link" href="/AppCrowdFunding/Utente/profile">
              <i class="fa d-inline fa-lg fa-user-circle-o"></i> My Profile</a>
          </li>
        </ul>
        <span class="navbar-text text-light">&nbsp; Benvenuto, <?php echo $_smarty_tpl->tpl_vars['userlogged']->value;?>
</span>
        <a class="btn navbar-btn ml-2 text-primary btn-light" href="/AppCrowdFunding/Utente/logout">&nbsp; Logout &nbsp;</a>
        <?php } else { ?>
        <a href="/AppCrowdFunding/Utente/login" class="btn navbar-btn ml-2 text-primary btn-light">
          <i class="fa d-inline fa-lg fa-user-circle-o text-primary"></i>&nbsp; Login</a>
        
        <span class="navbar-text text-light">&nbsp; OR</span>
        <a class="btn navbar-btn ml-2 text-primary btn-light" href="/AppCrowdFunding/Utente/registration">&nbsp; Sign Up &nbsp;</a>
        <?php }?>
      </div>
    </div>
  </nav>
  
<?php }
}
