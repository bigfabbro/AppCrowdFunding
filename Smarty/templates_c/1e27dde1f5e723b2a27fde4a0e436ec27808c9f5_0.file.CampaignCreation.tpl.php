<?php
/* Smarty version 3.1.32, created on 2018-09-07 15:22:29
  from 'C:\xampp\htdocs\AppCrowdFunding\Smarty\templates\CampaignCreation.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5b927b95658628_73015584',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1e27dde1f5e723b2a27fde4a0e436ec27808c9f5' => 
    array (
      0 => 'C:\\xampp\\htdocs\\AppCrowdFunding\\Smarty\\templates\\CampaignCreation.tpl',
      1 => 1536326118,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:navbar.tpl' => 1,
  ),
),false)) {
function content_5b927b95658628_73015584 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="/AppCrowdFunding/Smarty/templates/css/theme.css" type="text/css"> 
<body style="background-image: url('/AppCrowdFunding/Smarty/img/wallpaperRazzo.jpg');background-size:cover;background-repeat:no-repeat;">
<?php $_smarty_tpl->_subTemplateRender('file:navbar.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
  <form action="/AppCrowdFunding/Campagna/StartProject" method="POST" enctype="multipart/form-data" id="creationform">
  <div class="py-5">
    <div class="container" style="position:absolute;top:20%;left:10%;visibility:visible" id="c0">
      <div class="row">
        <div class="align-self-center col-md-6 text-white">
          <h1 class="text-center text-md-left display-3">Welcome to the campaign creation section!</h1>
        </div>
        <div class="col-md-6">
          <div class="card">
            <div class="card-body p-5" style="height:500px">
                <div class="form-group">
                <?php if (isset($_smarty_tpl->tpl_vars['errors']->value)) {?>
                  <label style="position:absolute; top:120px; left:190px">Ops! There are some errors :( &nbsp;</label>
                <?php } else { ?>
                  <label style="position:absolute; top:120px; left:190px">Press "Start" to begin!&nbsp;</label>
                <?php }?>
                </div>
                <button type="button" class="btn btn-primary w-75" style="position:absolute; top:200px; left:65px" id="s0" onclick="Next(this.id)">Start</button>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="container" style="position:absolute;top:20%;left:10%;visibility:hidden" id="c1">
      <div class="row">
        <div class="align-self-center col-md-6 text-white">
          <h1 class="text-center text-md-left display-3">Tell us its name...&nbsp;
            <br>and we'll tell you what it will be!</h1>
        </div>
        <div class="col-md-6">
          <div class="card">
            <div class="card-body p-5" style="height:500px">
                <div class="form-group">
                  <label>Campaign name</label>
                  <?php if (isset($_smarty_tpl->tpl_vars['errors']->value) && $_smarty_tpl->tpl_vars['errors']->value['name'] == "true") {?>
                  <input class="form-control border border-danger" required="required" name="name" id="name" onchange="inputVerifyCreation(this.id)"> 
                  <?php } elseif (isset($_smarty_tpl->tpl_vars['errors']->value)) {?>
                  <input class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['values']->value['name'];?>
" required="required" name="name" id="name" onchange="inputVerifyCreation(this.id)" > 
                  <?php } else { ?>
                  <input class="form-control" required="required" name="name" id="name" onchange="inputVerifyCreation(this.id)" >
                  <?php }?>
                </div>
                <div class="form-group">
                  <label>Category</label>
                  <select name="category">
                    <?php if (isset($_smarty_tpl->tpl_vars['errors']->value)) {?>
                    <option value="<?php echo $_smarty_tpl->tpl_vars['values']->value['category'];?>
" selected="selected" name="category"><?php echo $_smarty_tpl->tpl_vars['values']->value['category'];?>
</option>
                    <?php }?>
                    <option value="Tecnology">Tecnology</option>
                    <option value="Art">Art</option>
                    <option value="Charities">Charities</option>
                    <option value="Music">Music</option>
                    <option value="Food">Food</option>
                    <option value="Fashion">Fashion</option>
                    <option value="Film &amp; Video">Film &amp; Video</option>
                  </select> 
                </div>
                  <div class="form-group">
                    <label>Country</label>
                    <?php if (isset($_smarty_tpl->tpl_vars['errors']->value) && $_smarty_tpl->tpl_vars['errors']->value['country'] == "true") {?>
                    <input type="text" class="form-control border border-danger" required="required" name="country" id="country" onchange="inputVerifyCreation(this.id)"> 
                    <?php } elseif (isset($_smarty_tpl->tpl_vars['errors']->value)) {?>
                    <input type="text" class="form-control" required="required" name="country" id="country" value="<?php echo $_smarty_tpl->tpl_vars['values']->value['country'];?>
" onchange="inputVerifyCreation(this.id)"> 
                    <?php } else { ?>
                    <input type="text" class="form-control" required="required" name="country" id="country" onchange="inputVerifyCreation(this.id)"> 
                    <?php }?>
                  </div>

                  <button type="button" class="btn mt-2 btn-outline-primary" style="float:right" id="n1" onclick="Next(this.id)">Next</button>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="container" style="position:absolute;top:20%;left:10%;visibility:hidden" id="c2">
      <div class="row">
        <div class="align-self-center col-md-6 text-white">
          <h1 class="text-center text-md-left display-3">Tell us about your idea...&nbsp; </h1>
        </div>
        <div class="col-md-6">
          <div class="card">
            <div class="card-body p-5" style="height:500px">
                <div class="form-group"> </div>
                <div class="form-group">
                <label for="exampleInputEmail1">Description</label>
                <?php if (isset($_smarty_tpl->tpl_vars['errors']->value)) {?>
                  <textarea class="form-control w-100 h-75" id="exampleTextarea" rows="3"  name="description" ><?php echo $_smarty_tpl->tpl_vars['values']->value['description'];?>
</textarea>
                <?php } else { ?>
                  <textarea class="form-control w-100 h-75" id="exampleTextarea" rows="3" name="description" ></textarea>
                <?php }?>
                </div>
                <button type="button" class="btn mt-2 btn-outline-primary" style="float:right" id="n2" onclick="Next(this.id)">Next</button>
                <button type="button" class="btn mt-2 btn-outline-primary" style="float:right" left:"350" id="b2" onclick="Back(this.id)">Back</button>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="container" style="position:absolute;top:20%;left:10%;visibility:hidden" id="c3">
      <div class="row">
        <div class="align-self-center col-md-6 text-white">
          <h1 class="text-center text-md-left display-3">Dates and Goals</h1>
        </div>
        <div class="col-md-6">
          <div class="card">
            <div class="card-body p-5" style="height:500px">
                <div class="form-group">
                  <label>Start date</label>
                  <input class="form-control" type="date" required="required" value="<?php echo $_smarty_tpl->tpl_vars['today']->value;?>
" disabled name="startdate"> </div>
                <div class="form-group">
                  <label>End date</label>
                <?php if (isset($_smarty_tpl->tpl_vars['errors']->value) && $_smarty_tpl->tpl_vars['errors']->value['enddate'] == "true") {?>
                  <input class="form-control border border-danger" type="date" required="required" min="<?php echo $_smarty_tpl->tpl_vars['today']->value;?>
" name="enddate" id="enddate" onchange="inputVerifyCreation(this.id)"> </div>
                <?php } elseif (isset($_smarty_tpl->tpl_vars['serrors']->value)) {?>
                  <input class="form-control border border-danger" type="date" required="required" value="<?php echo $_smarty_tpl->tpl_vars['values']->value['enddate'];?>
" min="<?php echo $_smarty_tpl->tpl_vars['today']->value;?>
" name="enddate" id="enddate" onchange="inputVerifyCreation(this.id)"> </div
                <?php } else { ?>
                  <input class="form-control" type="date" required="required" min="<?php echo $_smarty_tpl->tpl_vars['today']->value;?>
" name="enddate" id="enddate" onchange="inputVerifyCreation(this.id)"> </div>
                <?php }?>
                <div class="form-group">
                  <label>Bank account</label>
                <?php if (isset($_smarty_tpl->tpl_vars['errors']->value) && $_smarty_tpl->tpl_vars['errors']->value['bankcount'] == "true") {?>
                  <input class="form-control border border-danger" type="text" required="required" name="bankcount" id="bankcount" onchange="inputVerifyCreation(this.id)"> </div>
                <?php } elseif (isset($_smarty_tpl->tpl_vars['errors']->value)) {?>
                  <input class="form-control" type="text" required="required" value="<?php echo $_smarty_tpl->tpl_vars['values']->value['bankcount'];?>
" name="bankcount" id="bankcount" onchange="inputVerifyCreation(this.id)"> </div>
                <?php } else { ?>
                  <input class="form-control" type="text" required="required" name="bankcount" id="bankcount" onchange="inputVerifyCreation(this.id)"> </div>
                <?php }?>  
                <div class="form-group">
                  <div class="form-group">
                    <label>Goal (in €)</label>
                  <?php if (isset($_smarty_tpl->tpl_vars['errors']->value) && $_smarty_tpl->tpl_vars['errors']->value['goal'] == "true") {?>
                    <input type="number" class="form-control border border-danger" max="5000000" min="0" step="1" required="required" name="goal" id="goal" onchange="inputVerifyCreation(this.id)"> </div>
                  <?php } elseif (isset($_smarty_tpl->tpl_vars['errors']->value)) {?>
                    <input type="number" class="form-control" max="5000000" min="0" step="1" required="required" value="<?php echo $_smarty_tpl->tpl_vars['values']->value['goal'];?>
" name="goal" id="goal" onchange="inputVerifyCreation(this.id)"> </div>
                  <?php } else { ?>
                    <input type="number" class="form-control" max="5000000" min="0" step="1" required="required" name="goal" id="goal" onchange="inputVerifyCreation(this.id)"> </div>
                  <?php }?>
                  <button  type="button" class="btn mt-2 btn-outline-primary" style="float:right" id="n3" onclick="Next(this.id)">Next</button>
                  <button  type="button" class="btn mt-2 btn-outline-primary" style="float:right" id="b3" onclick="Back(this.id)">Back</button>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="container" style="position:absolute;top:20%;left:10%;visibility:hidden" id="c4">
      <div class="row">
        <div class="align-self-center col-md-6 text-white">
          <h1 class="text-center text-md-left display-3">Pictures</h1>
        </div>
        <div class="col-md-6">
          <div class="card">
            <div class="card-body p-5" style="height:500px">
                <div class="form-group">
                  <label>Select max 5 pictures!</label>
                  <input class="form-control-file" type="file"   max="5"  name="picture[]" accept="image/*" multiple="multiple"> </div>
                <div class="form-group">
                  <button  type="button" class="btn mt-2 btn-outline-primary" style="float:right" id="n4" onclick="Next(this.id)">Next</button>
                  <button  type="button" class="btn mt-2 btn-outline-primary" style="float:right" id="b4" onclick="Back(this.id)">Back</button>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="container" style="position:absolute;top:20%;left:10%;visibility:hidden" id="c5">
      <div class="row">
        <div class="align-self-center col-md-6 text-white">
          <h1 class="text-center text-md-left display-3">Congratulations you have created a campaign!</h1>
        </div>
        <div class="col-md-6">
          <div class="card">
            <div class="card-body p-5" style="height:500px">
                <button type="button" class="btn mt-2 btn-outline-primary" style="float:right" onclick="Back(this.id)" id="b5">Back</button>
                <button typte class="btn btn-primary w-75" style="position:absolute; top:200px; left:65px" onclick="SubmitOrNot()">Submit</button>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php echo '<script'; ?>
 src="/AppCrowdFunding/Smarty/templates/js/creation.js"><?php echo '</script'; ?>
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
