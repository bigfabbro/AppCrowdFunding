<?php
/* Smarty version 3.1.32, created on 2018-08-23 15:14:55
  from 'C:\xampp\htdocs\AppCrowdFunding\Smarty\templates\Campagna.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5b7eb34f7b2b40_71640473',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a68d78c218caa173cade13e370d540dc626aadba' => 
    array (
      0 => 'C:\\xampp\\htdocs\\AppCrowdFunding\\Smarty\\templates\\Campagna.tpl',
      1 => 1535030090,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b7eb34f7b2b40_71640473 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" href="css/theme.css">
</head>

<body><?php if ($_smarty_tpl->tpl_vars['array']->value) {?>
  <!-- Tabella che mostra le campagne --><?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['array']->value, 'campagna');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['campagna']->value) {
?> <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
  <table class="table table-ric">
	<thead>
		<tr><th>Categoria</th><th>Nome Campagna</th><th>Founder</th></tr>
    <tbody>
      <tr>
        <td><?php echo $_smarty_tpl->tpl_vars['campagna']->value->getCategory();?>
</td>
        <td> 
          <a href="/AppCrowdFunding/Campagna/profile/<?php echo $_smarty_tpl->tpl_vars['campagna']->value->getID();?>
"> <?php echo $_smarty_tpl->tpl_vars['campagna']->value->getName();?>
 </a> </td>
        <td> <?php echo $_smarty_tpl->tpl_vars['campagna']->value->getFounder()->getUserName();?>
 </td>
      </tr>
    </tbody>
  </table> <?php } else { ?>
  <p>Non sono presenti campagne di quella categoria</p> <?php }?>
  <pingendo onclick="window.open('https://pingendo.com/', '_blank')" style="cursor:pointer;position: fixed;bottom: 10px;right:10px;padding:4px;background-color: #00b0eb;border-radius: 8px; width:250px;display:flex;flex-direction:row;align-items:center;justify-content:center;font-size:14px;color:white">Made with Pingendo Free&nbsp;&nbsp;
    <img src="https://pingendo.com/site-assets/Pingendo_logo_big.png" class="d-block" alt="Pingendo logo" height="16">
  </pingendo>
</body>

</html><?php }
}
