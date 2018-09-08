{if $camppic neq null} {assign var=piccount value=$camppic|@count} {/if}
{if $comments neq null}{assign var=commcount value=$comments|@count} {/if}
{if $donations neq null}{assign var=doncount value=$donations|@count} {/if}
{if $rewards neq null}{assign var=rewcount value=$rewards|@count} {/if}
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="/AppCrowdFunding/Smarty/templates/css/theme.css" type="text/css">
</head>

<body style="background-image: url('/AppCrowdFunding/Smarty/img/wallpaperRazzo.jpg');background-size:cover;background-repeat:repeat">
  {include file='navbar.tpl'}
  {include file='AddReward.tpl' idcamp=$camp->getId()}
  <div class="p-4 my-4">
    <div class="container">
      <div class="row">
        <div class="col-md-12 bg-light box-input1">
          <div class="row">
            <div class="col-md-8 align-items-center align-self-center">
              <h1 class="text-center m-0 p-2">{$camp->getName()}</h1>
            </div>
            <div class="col-md-2">
              <p class="lead py-3 m-0 text-center">By <a href="/AppCrowdFunding/Utente/profile/{$founder->getUsername()}">{$founder->getUsername()}</a>
                <br> </p>
            </div>
            <div class="col-md-2">
              <img class="img-fluid d-block rounded-circle mx-auto" src="data:image/jpeg;base64,{$founderpic}" width="100" height="100"> </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="p-4">
    <div class="container">
      <div class="row">
        <div class="col-md-9">
          <div class="row bg-light mx-auto box-input1">
            <div class="col-md-3 align-items-center align-self-center p-0">
              <p class="lead m-0 py-1 text-center">Goal:<br>{$camp->getGoal()}</p>
            </div>
            <div class="col-md-3 align-items-center align-self-center p-0">
              <p class="lead m-0 py-1 text-center">Funds:<br>{$camp->getFunds()}</p>
            </div>
            <div class="col-md-3 align-items-center align-self-center p-0">
              <p class="lead m-0 py-1 text-center">Start date:<br>{$camp->getStartDate()}</p>
            </div>
            <div class="col-md-3 align-items-center align-self-center px-3">
              <p class="lead m-0 py-1 text-center">End date:<br>{$camp->getEndDate()}</p>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12 py-3">
              <div class="progress">
                <div class="progress-bar progress-bar-striped" role="progressbar" style="width: {(100*$camp->getFunds())/$camp->getGoal()}%">{(100*$camp->getFunds())/$camp->getGoal()}%</div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div id="carousel" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                  {if $camppic==null}
                  <div class="carousel-item active">
                      <img class="d-block img-fluid w-100" src="https://pingendo.com/assets/photos/wireframe/photo-1.jpg"> 
                   </div>
                   {else} 
                   {for $i=0 to $piccount-1}
                   {if $i==0}
                   <div class="carousel-item active">
                      <img class="d-block img-fluid w-100" src="data:image/jpeg;base64,{$camppic[$i]}"> 
                   </div>
                   {else}
                   <div class="carousel-item">
                      <img class="d-block img-fluid w-100" src="data:image/jpeg;base64,{$camppic[$i]}"> 
                   </div>
                   {/if} {/for} {/if}
                </div>

                {if isset($piccount) && $piccount>1}
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
        <div class="col-md-3 box-input1">
          <div class="row">
            <div class="col-md-12 align-items-center align-self-center text-center">
              <p class="lead text-center">Rewards</p>
              {if isset($userlogged) && $userlogged==$founder->getUsername()}
              <button class="btn btn-outline-primary my-1" onclick="openrewardmodal()" id="addrewbtn">AddReward</button>
              {/if}
            </div>
          </div>
          <div class="row">
            <div class="col-md-12" style="height:520px;overflow-x: hidden; overflow-y: auto">
            {if isset($rewcount)}
              {for $i=0 to $rewcount-1}
              <div class="card">
                <div class="card-header"> {$rewards[$i]->getName()}
                {if isset($userlogged) && $userlogged==$founder->getUsername()}
                <button class="btn btn-outline-primary my-1" style="position:absolute;left:70%;top:0%" onclick="deletereward({$rewards[$i]->getId()})">delete</button>
                {/if}
                </div>
                <div class="card-body">
                  <h4>{$rewards[$i]->getPledged()}€</h4>
                  <p>{$rewards[$i]->getDescriptionRe()}</p>
                </div>
              </div>
              {/for}
            {else}
              <p class="text-center"> There aren't rewards </p>
            {/if}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="p-4">
    <div class="container">
      <div class="row">
        <div class="col-md-9">
          <div class="row bg-light mx-auto box-input1">
            <div class="col-md-12">
              <div class="row">
                <div class="col-md-12">
                  <h1 class="">
                    <u>Description</u>
                  </h1>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <p class="lead">{$camp->getDescription()}</p>
                </div>
              </div>
            </div>
          </div>
          <div class="row bg-light box-input1 mx-auto my-1">
            <div class="col-md-12">
              <div class="row">
                <div class="col-md-12">
                  <p class="lead text-center">Comments ({if isset($commcount)}{$commcount}{else}0{/if})</p>
                </div>
              </div>
              <div class="row">
               <div class="col-md-12" style="height:500px;overflow-x:hidden;overflow-y:auto">
              {if isset($commcount)}
              {for $i=0 to $commcount-1}
              <div class="card">
                {if $authors[$i]!="anonymous"}
                <div class="card-header">
                    <a href="/AppCrowdFunding/Utente/profile/{$authors[$i]}">{$authors[$i]}</a>
                    {if isset($userlogged) && ($authors[$i]==$userlogged)}
                    <button class="btn btn-outline-primary my-1" style="position:absolute;left:90%;top:0%" onclick="deletecomment({$comments[$i]->getId()})">Delete</button>
                    {/if}
                 </div>
                 {else}
                <div class="card-header">{$authors[$i]}</div>
                {/if}
                <div class="card-body">
                  <h4>{$comments[$i]->getText()}</h4>
                </div>
              </div>
              {/for}
              {else}
              <p class="text-center"> There aren't comments </p>
              {/if}
              </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  {if isset($userlogged)}
                  <button class="btn btn-outline-primary my-1" onclick="opencommentmodal()" id="commentbtn">Make a comment!</button>
                  {else}
                  <a href="/AppCrowdFunding/Utente/login" class="btn btn-outline-primary my-1">Make a comment!</a>
                  {/if}
                </div>
              </div>
              <div class="row my-2" style="display:none" id="modalcomment">
               <div class="col-md-12">
               <div class="card">
                <div class="card-header"> Your comment </div>
                <div class="card-body">
                <form class="" id="commentform">
                <div class="form-group">
                  <textarea class="form-control" id="commText" rows="3"></textarea>
                </div>
                <button type="button" class="btn btn-primary" onclick="cancelcomment()">Cancel</button>
                <button type="button" class="btn btn-primary" onclick="comment({$camp->getId()})">Submit</button>
                 </form>
                </div>
               </div>
               </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-3 box-input1">
          <div class="row">
            <div class="col-md-12 align-items-center align-self-center">
              <p class="lead text-center">Donations</p>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12" style="height:600px;overflow-x:hidden; overflow-y:auto">
            {if isset($doncount)}
              {for $i=0 to $doncount-1}
              <div class="card">
                {if $donators[$i]!="anonymous"}
                <div class="card-header">by <a href="/AppCrowdFunding/Utente/profile/{$donators[$i]}">{$donators[$i]}</a></div>
                {else}
                <div class="card-header">by {$donators[$i]}</div>
                {/if}
                  <div class="card-body">
                  <h4>Amount: {$donations[$i]->getAmount()}€</h4>
                  <p>Date: {$donations[$i]->getDate()}</p>
                </div>
              </div>
              {/for}
              {else}
              <p class="text-center"> There aren't donations </p>
              {/if}
            </div>
          </div>
          <div class="row">
            <div class="col-md-12 text-center">
            {if !($end)}
            {if isset($userlogged)}
              <a href="/AppCrowdFunding/Donazione/make/{$idcamp}" class="btn my-1 btn-outline-light">Make a donation!</a>
            {else}
              <a href="/AppCrowdFunding/Utente/login" class="btn my-1 btn-outline-light">Make a donation!</a>
            {/if}
            {/if}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <noscript>
  <meta http-equiv=refresh content='0; url=/AppCrowdFunding/Errore/NoJavascript'>
  </noscript>
  <script src="/AppCrowdFunding/Smarty/templates/js/campaignpage.js"></script>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>