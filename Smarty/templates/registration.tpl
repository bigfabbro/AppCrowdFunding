<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="Smarty/templates/css/theme.css" type="text/css"> </head>

<body>
  {include file='navbar.tpl'}
  <div class="py-5 text-center" style="background-image: url('../img/registration.png');background-size:cover;">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h1 class="">Registration</h1>
        </div>
      </div>
    </div>
    <div class="container py-5">
      <div class="row">
        <div class="col-md-6">
          <form class="">
            <div class="form-group">
              <label>Name</label>
              <input type="text" class="form-control" placeholder="Enter name">
              <small class="form-text text-muted"></small>
            </div>
            <div class="form-group">
              <label>Email</label>
              <input type="text" class="form-control" placeholder="Enter email"> </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Country</label>
              <input type="text" class="form-control" placeholder="Enter country"> </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Address</label>
              <input type="text" class="form-control" placeholder="Enter address"> </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Telephon number</label>
              <input type="text" class="form-control" placeholder="Enter telephon number"> </div>
          </form>
        </div>
        <div class="col-md-6">
          <form class="">
            <div class="form-group">
              <label>Surname</label>
              <input type="text" class="form-control" placeholder="Enter surname">
              <small class="form-text text-muted"></small>
            </div>
            <div class="form-group">
              <label>Date of birth</label>
              <input type="date" class="form-control" placeholder="Enter password"> </div>
          </form>
          <form class="">
            <div class="form-group">
              <label>City</label>
              <input type="text" class="form-control" placeholder="Enter city">
              <small class="form-text text-muted"></small>
            </div>
            <div class="form-group">
              <label>Post Code</label>
              <input type="text" class="form-control" placeholder="Enter post code"> </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Username</label>
              <input type="text" class="form-control" placeholder="Enter username"> </div>
          </form>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <form class="">
            <div class="form-group">
              <label>Password</label>
              <input type="password" class="form-control" placeholder="Enter password">
              <small class="form-text text-muted"></small>
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Enter Password</label>
              <input type="password" class="form-control" id="inlineFormInput" placeholder="Enter password"> </div>
          </form>
        </div>
        <div class="col-md-6">
          <form class="">
            <div class="form-group">
              <small class="form-text text-muted"></small>
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Short Description</label>
              <textarea class="form-control" id="exampleTextarea" rows="3" placeholder="Enter a shor description (max 200 types)"></textarea>
            </div>
          </form>
        </div>
      </div>
      <div class="row">
        <div class="col-md-2">
          <label class="text-primary">Privato</label>
          <input type="radio" class="form-control" placeholder="Enter password" name="tipo"> </div>
        <div class="col-md-2">
          <label class="text-primary">Ente Pubblico&nbsp;</label>
          <input type="radio" class="form-control" placeholder="Enter password" name="tipo"> </div>
        <div class="col-md-2">
          <label class="text-primary">Azienda</label>
          <input type="radio" class="form-control" placeholder="Enter password" name="tipo"> </div>
        <div class="col-md-2 "></div>
        <div class="col-md-2 "></div>
        <div class="col-md-2 ">
          <a href="#" class="btn btn-outline-primary mr-auto">Submit</a>
        </div>
      </div>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>