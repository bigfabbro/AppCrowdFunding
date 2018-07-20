<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="C:/Users/Bigfa/Documents/GitHub/AppCrowdFunding/Smarty/templates/css/theme.css"> </head>

<body>
  <div class="py-5 wait" style="top:0%;visibility:hidden"" id="modalmodify" >
    <div class="container">
      <div class="row box-input1 bg-light">
        <div class="col-md-6">
          <div class="card-body p-5">
            <h3 class="pb-3">Modify your profile&nbsp;</h3>
            <form action="#">
              <div class="form-group">
                <label>Address</label>
                <input class="form-control" placeholder="City" value="{$city}" id="city"> </div>
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Street" value="{$street}" id="street"> </div>
              <div class="form-group">
                <input type="number" class="form-control" placeholder="Number" value="{$number}" id="number"> </div>
              <div class="form-group">
                <input type="number" class="form-control" placeholder="Zipcode" value="{$zipcode}" id="zipcode"> </div>
            <div class="form-group">
              <input type="text" class="form-control" placeholder="Country" value="{$country}" id="country"> 
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="card-body p-5">
              <div class="form-group">
                <label>Telephon number</label>
                <input class="form-control" placeholder="Tel. number" value="{$telnum}" id="telnum"> 
              </div>
              <div class="form-group">
                <label>Date of Birth</label>
                <input class="form-control" type="date" value="{$datan}" id="datan"> 
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Description</label>
                <textarea class="form-control" id="exampleTextarea" rows="3" id="description">{$description}</textarea>
              </div>
              <button type="button" class="btn mt-2 btn-outline-primary" style="position:absolute; right:80" onclick="closemodifypanel()">Finish</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>