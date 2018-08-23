{assign var='userlogged' value=$userlogged|default:'nouser'}


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
            <a class="nav-link" href="/AppCrowdFunding/Info/info"   > Chi siamo</a>
          </li>
        </ul>

      <ul class="navbar-nav">
          <li class="nav-item text-light" >
            <a class="nav-link" {if !$info} href="/AppCrowdFunding/Info/info" {else} href="#scelta" {/if}> Perché sceglierci</a>
          </li>
        </ul>


      <ul class="navbar-nav">
          <li class="nav-item text-light" >
            <a class="nav-link" {if !$info}  href="/AppCrowdFunding/Info/info" {else} href="#contatti" {/if}> Contatti</a>
          </li>
        </ul>
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
  
