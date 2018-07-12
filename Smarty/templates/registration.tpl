<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="Smarty/templates/css/theme.css" type="text/css"> 
</head>

<body>
{include file='navbar.tpl'}
  <div class="py-5" style="background-image: url('Smarty/img/wallpaperRazzo.jpg'); background-position: center center;">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h1 class="text-center text-light">Registration</h1>
        </div>
      </div>
    </div>
    <form action="registration" method="POST">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <div class="card">
            <div class="card-body p-5 h-100">
              <h3 class="pb-3">Basic Information</h3>
              <form action="https://formspree.io/YOUREMAILHERE">
                <div class="form-group">
                  <label>Name</label>
                  <input class="form-control" placeholder="Your name, please" required="required" name="name"> </div>
                <div class="form-group">
                  <label>Surname</label>
                  <input class="form-control" required="required" placeholder="You surname, please" required="required" name="surname"> </div>
                <div class="form-group">
                  <label>Date of Birth</label>
                  <input type="date" class="form-control"  required="required" name="date"> </div>
                <div class="form-group">
                  <label>Address</label>
                  <input type="text" class="form-control" placeholder="City" required="required" name="city">
                  <input type="text" class="form-control" placeholder="Street" required="required" name="street">
                  <input type="number" class="form-control" placeholder="Number" required="required" name="number">
                  <input type="text" class="form-control" placeholder="Zipcode" required="required" name="zipcode">
                  <input type="text" class="form-control" required="required" placeholder="Country" name="country"> </div>
                <div class="form-group">
                  <label>Telephon number</label>
                  <input type="text" class="form-control" placeholder="Your telephon number, please" name="telephon"> </div>
              </form>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="card">
            <div class="card-body p-5 h-100">
              <h3 class="pb-3">Profile information</h3>
                <div class="form-group">
                  <label>E-mail</label>
                  <input type="email" class="form-control" placeholder="Your email, please" required="required" name="email"> </div>
                <div class="form-group">
                  <label>Username</label>
                  <input class="form-control" placeholder="Choose a username!" required="required" name="username"> </div>
                <div class="form-group">
                  <label>Password</label>
                  <input type="password" class="form-control" placeholder="Choose a password" required="required" name="password1"> </div>
                <div class="form-group">
                  <label>Confirm Password</label>
                  <input type="password" class="form-control" placeholder="Re-insert the same password" required="required" name="password2"> </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Short description</label>
                  <textarea class="form-control form-control-lg" id="exampleTextarea" rows="3" name="description"></textarea>
                </div>
                <div class="form-group">
                  <label>Picture&nbsp;</label>
                  <input type="file" class="form-control-file" name="upicture"> </div>
                <button type="submit" class="btn btn-primary btn-lg submit-button">Submit</button>
                </form>
            </div>
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