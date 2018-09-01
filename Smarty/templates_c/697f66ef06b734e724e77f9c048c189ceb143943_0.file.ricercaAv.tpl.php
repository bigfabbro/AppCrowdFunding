<?php
/* Smarty version 3.1.32, created on 2018-09-01 16:28:02
  from 'C:\xampp\htdocs\AppCrowdFunding\Smarty\templates\ricercaAv.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5b8aa1f25486b4_38687838',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '697f66ef06b734e724e77f9c048c189ceb143943' => 
    array (
      0 => 'C:\\xampp\\htdocs\\AppCrowdFunding\\Smarty\\templates\\ricercaAv.tpl',
      1 => 1535806938,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:navbar.tpl' => 1,
  ),
),false)) {
function content_5b8aa1f25486b4_38687838 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<title>Ricerca avanzata</title>
<link rel="stylesheet" href="/AppCrowdFunding/Smarty/templates/css/theme.css">
<?php echo '<script'; ?>
 src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"><?php echo '</script'; ?>
>

<?php echo '<script'; ?>
 src="/AppCrowdFunding/Smarty/templates/js/ricercaAv.js">
<?php echo '</script'; ?>
>
  
</head>
<body style="background-image: url('/AppCrowdFunding/Smarty/img/wallpaperRazzo.jpg'); background-size:cover;"> <?php $_smarty_tpl->_subTemplateRender("file:navbar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
<br>
<br>
<br>
<br>
<br>
	<div class="container text-center">
		<div class="col-sm-3">
		
        </div>
		<div class="col-sm-7 well">
			<form action="/AppCrowdFunding/Ricerca/ricercaAv">
				<div class="form-row">
					<div class="form-group col-md-6">
						<input type="text" class="form-control" id="search" name="str" placeholder="Cerca..">
					</div>
					<div class="form-group col-md-3">
						<select id="inputKey1" class="form-control" name="key">
							<option value="campagna" selected>Campagna</option>
							<option value="utente">Utente</option>
						</select>
					</div>
					<div class="form-group col-md-3">
						<select cerca="cerca" id="inputKey2" class="form-control" name="value">
							<option value="category" selected>Category</option>
							<option id="opt-name" value="name">Name</option>
							<option value="country">Country</option>
							<option value="username">Username</option>
						</select>
					</div>
					<button class="btn btn-primary" type="submit">Ricerca</button>

				</div>
			</form>
		</div>
		<div class="col-sm-3">
		
		</div>
	</div>
</body>
</html><?php }
}
