<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="/AppCrowdFunding/Smarty/templates/css/theme.css" type="text/css"> </head>

<body style="background-image: url('/AppCrowdFunding/Smarty/img/login.jpg'); background-size:cover;">{include file='navbar.tpl'}
  <div class="py-5 w-100 h-100">
    <div class="container">
      <div class="row">
        <div class="align-self-center col-md-6 text-white">
          <h1 class="text-md-left display-3 text-light">
            <b>Support: {$NomeCampagna}</b>
          </h1>
          <p>“No one is useless in this world who lightens the burdens of another.”&nbsp;
            <br>― Charles Dickens</p>
        </div>
        <div class="col-md-6">
          <div class="row">
            <div class="col-md-12">
              <div class="card text-white p-5 bg-light">
                <div class="card-body">
                  <h1 class="mb-4 bg-light text-primary">Donate</h1>
                  <form action="/AppCrowdFunding/Donazione/make/{$idcamp}" method="POST" id="donationform">
                    <div class="form-group bg-light">
                      <label class="text-primary">Owner Name</label>
                      <input type="text" class="form-control" placeholder="Enter Owner Name" name="ownername" id="ownername" onchange="inputVerifyDonation(this.id)"> </div>
                    <div class="form-group bg-light">
                      <label class="text-primary">Owner Surname</label>
                      <input type="text" class="form-control" placeholder="Enter Owner Surname" name="ownersurname" id="ownersurname" onchange="inputVerifyDonation(this.id)"> </div>
                    <div class="form-group bg-light">
                      <label class="text-primary">Credit Card Number</label>
                      <input type="number" min="1" max="9999999999999999" class="form-control" placeholder="Enter Credit Card Number" name="ccnumber" id="ccnumber" onchange="inputVerifyDonation(this.id)"> </div>
                    <div class="form-group bg-light">
                      <label class="text-primary">Expiration Date</label>
                      <input type="date" class="form-control" placeholder="Enter expiration date" min="{$today}" name="expirationdate" id="expirationdate" onchange="inputVerifyDonation(this.id)"> </div>
                    <div class="form-group bg-light">
                      <label class="text-primary">CCV</label>
                      <input type="number" min="1" max="999" class="form-control" placeholder="Enter CCV" name="ccv" id="ccv" onchange="inputVerifyDonation(this.id)"> </div>
                    <div class="form-group bg-light">
                      <label class="text-primary">Amount</label>
                      <input type="number" min="1" max="500000" class="form-control" placeholder="How much would you like to donate?" name="amount" id="amount" onchange="inputVerifyDonation(this.id)"> </div>
                    <button type="button" class="btn btn-primary" onclick="SubmitOrNot()">Donate</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="container">
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbar3SupportedContent">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse text-center justify-content-center" id="navbar3SupportedContent"> </div>
  </div>
  <script src="/AppCrowdFunding/Smarty/templates/js/donation.js"></script>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>