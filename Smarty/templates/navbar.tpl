{assign var='userlogged' value=$userlogged|default:'nouser'}

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="/AppCrowdFunding/Smarty/templates/css/theme.css" type="text/css">
</head>

<body>
  <nav class="navbar navbar-expand-md navbar-dark bg-primary">
    <div class="container">
      <a class="navbar-brand" href="/AppCrowdFunding/HomePage">
        <i class="fa d-inline fa-lg fa-cloud"></i>
        <b>&nbsp;Society Of Funding</b>
      </a>

      <ul class="navbar-nav" >
          <li class="nav-item text-light" >
            <a class="nav-link" href="/AppCrowdFunding/HomePage"> Home Page</a>
          </li>
        </ul>

      <ul class="navbar-nav">
          <li class="nav-item text-light"  >
            <a class="nav-link" href="/AppCrowdFunding/Info/info" > Chi siamo</a>
          </li>
        </ul>

      <ul class="navbar-nav">
          <li class="nav-item text-light" >
            <a class="nav-link" href="/AppCrowdFunding/Info/info" > Perché sceglierci</a>
          </li>
        </ul>


      <ul class="navbar-nav">
          <li class="nav-item text-light" >
            <a class="nav-link" href="/AppCrowdFunding/Info/info"> Contatti</a>
          </li>
        </ul>
		<form class="form-inline my-2 my-lg-0" action="/AppCrowdFunding/Ricerca/rBase" method="get">
        <input class="form-control mr-sm-2 mx-auto py-1 d-inline-flex flex-row justify-content-center align-items-center align-self-center box-campaign form-control-sm" type="search" style="background-size:cover;background-position:right center;background-repeat:no-repeat;"
          placeholder="Cerca tra le categorie" name="str">
        <button class="btn my-sm-0 ml-auto p-2 btn-outline-dark flex-row d-inline-flex submit-button" type="submit" style="background-image: url('../lente.ico');background-size:cover;background-position:right center;"></button>
      </form>
      <a class="nav-link"  href="/AppCrowdFunding/Ricerca/rAvanzata"> Ricerca Avanzata</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbar2SupportedContent">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse text-center justify-content-end" id="navbar2SupportedContent">
        <ul class="navbar-nav">
        {if $userlogged!='nouser'}
          <li class="nav-item text-light">
            <a class="nav-link" href="/AppCrowdFunding/Utente/profile">
              <i class="fa d-inline fa-lg fa-user-circle-o"></i> My Profile</a>
          </li>
        </ul>
        <span class="navbar-text text-light">&nbsp; Benvenuto, {$userlogged}</span>
        <a class="btn navbar-btn ml-2 text-primary btn-light" href="/AppCrowdFunding/Utente/logout">&nbsp; Logout &nbsp;</a>
        {else}
        <a href="/AppCrowdFunding/Utente/login" class="btn navbar-btn ml-2 text-primary btn-light">
          <i class="fa d-inline fa-lg fa-user-circle-o text-primary"></i>&nbsp; Login</a>
        
        <span class="navbar-text text-light">&nbsp; OR</span>
        <a class="btn navbar-btn ml-2 text-primary btn-light" href="/AppCrowdFunding/Utente/registration">&nbsp; Sign Up &nbsp;</a>
        {/if}
      </div>
    </div>
  </nav>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>