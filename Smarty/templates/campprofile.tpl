<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="/AppCrowdFunding/Smarty/templates/css/theme.css" type="text/css"> 
</head>

<body>
  <div class="row">
    <div class="container bg-light">
      <div class="row">
        <div class="col-md-3">
          {if $photo!=null}
          <img class="img-fluid d-block" src="data:image/jpeg;base64,{$photo}" {if $myProf eq true} onmouseover="showdelete({$id})" onmouseout="closedelete({$id})" {/if}>
          {if $myProf eq true}<button class="btn btn-outline-primary my-1" style="position:absolute;left:30%;top:10%;visibility:hidden" onmouseover="showdelete({$id})" onmouseout="closedelete({$id})" id="deletebtn{$id}" onclick="deletecamp({$id})">delete</button>{/if}
          {else}
          <img class="img-fluid d-block" src="https://pingendo.com/assets/photos/wireframe/photo-1.jpg">
          {/if}
        </div>
        <div class="col-md-9">
          <div class="row">
            <div class="col-md-6">
              <a href="/AppCrowdFunding/Campagna/profile/{$id}"><p class="lead text-center">{$name}</p></a>
              <div class="progress">
                <div class="progress-bar progress-bar-striped" role="progressbar" style="width: {(100*$funds)/$goal}%">{(100*$funds)/$goal}%</div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="row">
                <div class="col-md-12">
                  <p class="lead text-left">Goal: {$goal}</p>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="row">
                    <div class="col-md-12">
                      <p class="lead text-left">Funds collected: {$funds}</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <p class="lead text-justify">Description: {$description}</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <noscript>
  <meta http-equiv=refresh content='0; url=/AppCrowdFunding/Errore/NoJavascript'>
  </noscript>
  <script src="/AppCrowdFunding/Smarty/templates/js/campprofile.js"></script>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>