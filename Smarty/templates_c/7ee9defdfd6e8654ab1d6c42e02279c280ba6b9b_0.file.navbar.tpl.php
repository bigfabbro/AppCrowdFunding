<?php
/* Smarty version 3.1.32, created on 2018-09-01 15:23:43
  from 'C:\xampp\htdocs\AppCrowdFunding\Smarty\templates\navbar.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5b8a92df3bbda0_93232071',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7ee9defdfd6e8654ab1d6c42e02279c280ba6b9b' => 
    array (
      0 => 'C:\\xampp\\htdocs\\AppCrowdFunding\\Smarty\\templates\\navbar.tpl',
      1 => 1535808215,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b8a92df3bbda0_93232071 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_assignInScope('userlogged', (($tmp = @$_smarty_tpl->tpl_vars['userlogged']->value)===null||$tmp==='' ? 'nouser' : $tmp));?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">

  <nav class="navbar navbar-expand-md navbar-dark bg-primary">
    <div class="container">
      <a class="navbar-brand" href="/AppCrowdFunding/HomePage">
        <i class="fa d-inline fa-lg fa-cloud"></i>
        <b>&nbsp;Society Of Funding</b>
      </a>

      <ul class="navbar-nav">
          <li class="nav-item text-light"  >
            <a class="nav-link" href="/AppCrowdFunding/Info/info"> Chi siamo</a>
          </li>
        </ul>

      <ul class="navbar-nav">
          <li class="nav-item text-light" >
            <a class="nav-link" href="/AppCrowdFunding/Info/info#scelta"> Perché sceglierci</a>
          </li>
        </ul>

      <ul class="navbar-nav">
          <li class="nav-item text-light" >
            <a class="nav-link" href="/AppCrowdFunding/Info/info#contatti" > Contatti</a>
          </li>
        </ul>
      <form class="form-inline my-2 my-lg-0" <?php if ($_smarty_tpl->tpl_vars['userlogged']->value != 'nouser') {?>style="margin-left:10px" <?php } else { ?> style="margin-left:81px"<?php }?> action="/AppCrowdFunding/Ricerca/ricerca" method="get">
        <div class="input-group">
        <input class="form-control  form-control-sm  " style="border-radius:20px 0 0 20px" type="search" placeholder="Cerca..." <?php if ($_smarty_tpl->tpl_vars['userlogged']->value != 'nouser') {?>style="margin-left:-15px" size="8" <?php } else { ?> style="margin-left:-15px" size="14" <?php }?> name="str">
        <button type="submit" class="btn navbar-btn text-primary btn-light" style="border-radius:0 20px 20px 0;height: 35px;line-height: 1;"><span class="fa fa-search"></span></button>
        </div>
      </form>
       <?php if ($_smarty_tpl->tpl_vars['userlogged']->value != 'nouser') {?><a class="nav-link " id="ricAv" style=" font-size:9px; padding: 0 0.9rem; color: rgba(255, 255, 255, 0.5);" href="/AppCrowdFunding/Ricerca/ricercaAv"> Ricerca <br>Avanzata </a><?php }?>
  
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
