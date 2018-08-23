<?php
/* Smarty version 3.1.32, created on 2018-08-23 14:56:47
  from 'C:\xampp\htdocs\AppCrowdFunding\Smarty\templates\ricercaAv.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5b7eaf0feb51b1_11392131',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '697f66ef06b734e724e77f9c048c189ceb143943' => 
    array (
      0 => 'C:\\xampp\\htdocs\\AppCrowdFunding\\Smarty\\templates\\ricercaAv.tpl',
      1 => 1535028998,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:navbar.tpl' => 1,
  ),
),false)) {
function content_5b7eaf0feb51b1_11392131 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<title>Ricerca avanzata</title>
<link rel="stylesheet" href="css/theme.css">
</head>
<body> <?php $_smarty_tpl->_subTemplateRender("file:navbar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
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
			<form action="/AppCrowdFunding/Ricerca/rAvanzata">
				<div class="form-row">
					<div class="form-group col-md-6">
						<input type="text" class="form-control" id="search" name="str" placeholder="Search...">
					</div>
					<div class="form-group col-md-3">
						<select id="inputKey" class="form-control" name="value">
							<option value="category" selected>Category</option>
							<option value="name">Name</option>
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
