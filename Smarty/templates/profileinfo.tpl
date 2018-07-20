<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="/AppCrowdFunding/Smarty/templates/css/theme.css">
</head>

<body>
<div class="row wait" id="modalattention" style="visibility:hidden">
        <div class="col-md-3"> </div>
        <div class="col-md-6">
          <div class="card text-white p-5 bg-primary box-input1">
            <div class="card-body">
              <h4 class="card-title">Attenzione! Ti ricordiamo che la cancellazione dell'account è irreversibile e comporta la cancellazione di tutte le campagne!.</h4>
              <a class="btn btn-light text-dark" style="height:40px;width:150px" onclick="cancel()" >Cancel</a>
              <a class="btn btn-danger" style="height:40px;width:150px" href="/AppCrowdFunding/Utente/removeUser/{$username}" >Delete Account</a>
            </div>
          </div>
        </div>
      </div>
        <div class="col-md-12">
          <div class="card w-100 h-100">
            <div class="card-body">
              <h5 class="card-title">Description:</h5>
              <p class="card-text">
                <i>"{$description}"</i>
              </p>
            </div>
            <div class="card-body">
              <h5 class="card-title">Address and Telephone number:</h5>
              <p class="card-text">City: {$city}
                <br>Street:{$street},{$number}
                <br>Zipcode: {$zipcode}
                <br>Country: {$country}
                <br>Tel. Number:{$telnum}</p>
            </div>
            <div class="card-body">
              <h5 class="card-title">Other:</h5>
              <p class="card-text">Birth date: {$datan}
                <br>Sex: {$sex}</p>
            </div>
            {if $myProf eq "true"}
            <div class="card-body">
              <h5 class="card-title">Account management:</h5>
              <a class="btn btn-primary text-light" onclick="openmodifypanel()" >Modify profile</a>
              <a class="btn btn-danger text-light" onclick="attention()" >Delete Account</a>
            </div>
            {/if}
          </div>

        </div>
  <script src="/AppCrowdFunding/Smarty/templates/js/modal.js"></script>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>