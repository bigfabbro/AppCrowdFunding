{assign var=piccount value=$camppic|@count} {assign var=commcount value=$comments|@count}
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="/AppCrowdFunding/Smarty/templates/css/theme.css" type="text/css">
</head>

<body style="background-image: url('/AppCrowdFunding/Smarty/img/wallpaperRazzo.jpg');background-size:cover;">
  {include file='navbar.tpl'} {include file='comment.tpl'}
  <div class="py-5">
    <div class="container bg-light box-input1">
      <div class="row">
        <div class="col-md-9 p-0 m-0 align-self-center">
          <h1 class="text-center">{$camp->getName()}</h1>
        </div>
        <div class="col-md-3">
          <div class="row">
            <div class="col-md-6 text-center align-self-center">
              <h5 class="">by
                <a href="/AppCrowdFunding/Utente/profile/{$founder->getUsername()}">{$founder->getUsername()}</a>
              </h5>
            </div>
            <div class="col-md-6">
              <img class="img-fluid d-block rounded-circle mx-auto" src="data:image/jpeg;base64,{$founderpic}" style="width:80; height:80"> </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="p-2">
    <div class="container">
      <div class="row">
        <div class="col-md-9">
          <div class="row box-input1 bg-light mx-auto">
            <div class="col-md-3">
              <p>Goal:{$camp->getGoal()}</p>
            </div>
            <div class="col-md-3">
              <p>Funds:{$camp->getFunds()}</p>
            </div>
            <div class="col-md-3">
              <p>Start date:{$camp->getStartDate()}</p>
            </div>
            <div class="col-md-3">
              <p>End date:{$camp->getEndDate()}</p>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="progress m-3">
                <div class="progress-bar progress-bar-striped" role="progressbar" style="width: {(100*$camp->getFunds())/$camp->getGoal()}%">{(100*$camp->getFunds())/$camp->getGoal()}%</div>
              </div>
            </div>
          </div>
          <div class="row mx-auto">
            <div class="col-md-12">
              <div id="carousel" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                  {if $camppic==null}
                  <div class="carousel-item active">
                    <img class="d-block img-fluid w-100" src="https://pingendo.com/assets/photos/wireframe/photo-1.jpg"> </div>
                  <div class="carousel-item">
                    <img class="d-block img-fluid w-100" src="https://pingendo.com/assets/photos/wireframe/photo-1.jpg"> </div>
                  {else} {for $i=0 to $piccount-1} {if $i==0}
                  <div class="carousel-item active">
                    <img class="d-block img-fluid w-100" src="data:image/jpeg;base64,{$camppic[$i]}"> </div>
                  {else}
                  <div class="carousel-item">
                    <img class="d-block img-fluid w-100" src="data:image/jpeg;base64,{$camppic[$i]}"> </div>
                  {/if} {/for} {/if}
                </div>
                {if $piccount>1}
                <a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev">
                  <span class="carousel-control-prev-icon"></span>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carousel" role="button" data-slide="next">
                  <span class="carousel-control-next-icon"></span>
                  <span class="sr-only">Next</span>
                </a>
                {/if}
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-3 bg-primary box-input1">
          <div class="row">
            <div class="col-md-12 align-self-center">
              <p class="lead m-0 text-center">Rewards</p>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12" style="height: 600px; overflow-x: hidden; overflow-y: auto;">
              {foreach $rewards as $rew}
              <div class="card">
                <div class="card-header">{$rew->getName()}</div>
                <div class="card-body">
                  <h4>{$rew->getPledged()}€</h4>
                  <p>{$rew->getDescriptionRe()}</p>
                </div>
              </div>
              {/foreach}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="p-1">
    <div class="container"> </div>
  </div>
  <div class="p-2" style="height:600px">
    <div class="container">
      <div class="row">
        <div class="col-md-9 h-100">
          <div class="row box-input1 bg-light mx-auto">
            <div class="col-md-12 h-50">
              <p class="lead my-0 h-100" style="height:600px">
                <i>
                  <u>Description:</u>
                </i>
                {$camp->getDescription()}
                <br>
                <br>
                <br>
                <i>
                  <u>Category:</u>
                </i>
                {$camp->getCategory()}
                <br>
                <br>
                <br>
                <i>
                  <u>Country:</u>
                </i>
                {$camp->getCountry()}
              </p>
            </div>
          </div>
          <div class="row box-input1 bg-light mx-auto">
            <div class="col-md-12 h-50">
              <div class="row">
                <div class="col-md-12">
                  <p class="lead p-0 text-center">Comments ({$commcount})</p>
                </div>
              </div>
              <div class="row h-50">
                <div class="col-md-12" style="overflow-x:hidden;overflow-y:auto">
                  {for $i=0 to $commcount-1}
                  <div class="card">
                    <a href="/AppCrowdFunding/Utente/profile/{$authors[$i]}">
                      <div class="card-header"> {$authors[$i]}</div>
                    </a>
                    <div class="card-body">
                      <p>{$comments[$i]->getText()}</p>
                    </div>
                  </div>
                  {/for}
                </div>
              </div>
              <div class="row h-25">
                <div class="col-md-12">
                  <button type="button" class="btn btn-primary" onclick="opencommentmodal()">Make a comment!</button>
                </div>
              </div>
              <div class="col-md-12"> </div>
            </div>
          </div>
        </div>
        <div class="col-md-3 bg-primary box-input1">
          <div class="row">
            <div class="col-md-12 align-self-center">
              <p class="lead m-0 text-center">Donations</p>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header"> Header </div>
                <div class="card-body">
                  <h4>Card title</h4>
                  <h6 class="text-muted">Subtitle</h6>
                  <p>Some quick example text to build on the card title .</p>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <a class="btn btn-light" href="#">Make a donation!</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="/AppCrowdFunding/Smarty/templates/js/comment.js"></script>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
    crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
    crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
    crossorigin="anonymous"></script>
</body>

</html>