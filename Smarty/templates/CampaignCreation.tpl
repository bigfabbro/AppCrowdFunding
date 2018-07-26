<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="/AppCrowdFunding/Smarty/templates/css/theme.css" type="text/css"> 
<body style="background-image: url('/AppCrowdFunding/Smarty/img/wallpaperRazzo.jpg');background-size:cover;background-repeat:no-repeat;">
{include file='navbar.tpl'}
  <form action="/AppCrowdFunding/Campagna/StartProject" method="POST" enctype="multipart/form-data">
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
                {if isset($errors)}
                  <label for="exampleInputEmail1" style="position:absolute; top:120px; left:190px">Ops! There are some errors :( &nbsp;</label>
                {else}
                  <label for="exampleInputEmail1" style="position:absolute; top:120px; left:190px">Press "Start" to begin!&nbsp;</label>
                {/if}
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
                  {if isset($errors) && $errors.name eq "true"}
                  <input class="form-control border border-danger" required="required" name="name" > 
                  {else if isset($errors)}
                  <input class="form-control" value="{$values.name}" required="required" name="name" > 
                  {else}
                  <input class="form-control" required="required" name="name" >
                  {/if}
                </div>
                <div class="form-group">
                  <label>Category</label>
                  <select name="category">
                    {if isset($errors)}
                    <option value="{$values.category}" selected="selected">{$values.category}</option>
                    {/if}
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
                    {if isset($errors) && $errors.country eq "true"}
                    <input type="text" class="form-control border border-danger" required="required" name="country"> 
                    {else if isset($errors)}
                    <input type="text" class="form-control" required="required" name="country" value="{$values.country}"> 
                    {else}
                    <input type="text" class="form-control" required="required" name="country"> 
                    {/if}
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
                {if isset($errors)}
                  <textarea class="form-control w-100 h-75" id="exampleTextarea" rows="3"  name="description">{$values.description}</textarea>
                {else}
                  <textarea class="form-control w-100 h-75" id="exampleTextarea" rows="3" name="description"></textarea>
                {/if}
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
                  <input class="form-control" type="date" required="required" value="{$today}" disabled name="startdate"> </div>
                <div class="form-group">
                  <label>End date</label>
                {if isset($errors) && $errors.enddate eq "true"}
                  <input class="form-control border border-danger" type="date" required="required" min="{$today}" name="enddate"> </div>
                {else if isset($serrors)}
                  <input class="form-control border border-danger" type="date" required="required" value="{$values.enddate}" min="{$today}" name="enddate"> </div
                {else}
                  <input class="form-control" type="date" required="required" min="{$today}" name="enddate"> </div>
                {/if}
                <div class="form-group">
                  <label>Bank account</label>
                {if isset($errors) && $errors.bankcount eq "true"}
                  <input class="form-control border border-danger" type="text" required="required" name="bankcount"> </div>
                {else if isset($errors)}
                  <input class="form-control" type="text" required="required" value="{$values.bankcount}" name="bankcount"> </div>
                {else}
                  <input class="form-control" type="text" required="required" name="bankcount"> </div>
                {/if}  
                <div class="form-group">
                  <div class="form-group">
                    <label>Goal (in €)</label>
                  {if isset($errors) && $errors.goal eq "true"}
                    <input type="number" class="form-control border border-danger" max="5000000" min="0" step="1" required="required" name="goal"> </div>
                  {else if isset($errors)}
                    <input type="number" class="form-control" max="5000000" min="0" step="1" required="required" value="{$values.goal}" name="goal"> </div>
                  {else}
                    <input type="number" class="form-control" max="5000000" min="0" step="1" required="required" name="goal"> </div>
                  {/if}
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
                <button type="submit" class="btn btn-primary w-75" style="position:absolute; top:200px; left:65px">Submit</button>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script src="/AppCrowdFunding/Smarty/templates/js/creation.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>