<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="/AppCrowdFunding/Smarty/templates/css/theme.css" type="text/css"> </head>

<body style="background-image: url('/AppCrowdFunding/Smarty/img/wallpaperRazzo.jpg'); background-size:cover;">{include file='navbar.tpl'} {include file='navbar.tpl'}
  <div class="py-5 text-center">
    <div class="container py-5" >
      <div class="row">
        <div class="col-md-6">
          <h1 class="display-3 mb-4 text-light">You have just helped a dreamer like you.</h1>
          <span>
            <h1 class="display-3 mb-4 text-primary">Thanks {$Helper}!</h1>
          </span>
          <a href="/AppCrowdFunding/" class="btn btn-lg mx-1 btn-primary">Torna alla HomePage</a>
          <a href="/AppCrowdFunding/Utente/profile" class="btn btn-lg btn-primary mx-1">Visita il tuo profilo</a>
        </div>
        <div class="col-md-6 ">
          <div class="list-group">
            <a href="#" class="list-group-item list-group-item-action flex-column align-items-start active">
              <div class="d-flex w-100 justify-content-between">
                <h5 class="mb-1">About your donation</h5>
              </div>
              <small></small>
            </a>
            <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
              <div class="d-flex w-100 justify-content-between">
                <h5 class="mb-1">
                  <br>Amount: {$Amount}$
                  <br>
                  <br>
                </h5>
              </div>
              <div class="d-flex w-100 justify-content-between">
                <h5 class="mb-1">Campaign supported: {$Campaign}</h5>
              </div>
              <div class="d-flex w-100 justify-content-between">
                <h5 class="mb-1">
                  <br>Dreamer helped: {$Dreamer}</h5>
              </div>
              <div class="d-flex w-100 justify-content-between">
                <h5 class="mb-1">
                  <br>Date of the donation: {$Date}</h5>
              </div>
              <div class="d-flex w-100 justify-content-between">
                
                <h5 class="mb-1 text-left" >
                  <br>Reward*: {$Reward} - {$Description}</h5>
              </div>
              <div class="d-flex w-100 justify-content-between">
                <h5 class="mb-1">
                  <br>*In case of reward, it will be sent to the address indicated on your own profile.</h5>
              </div>
            </a>
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