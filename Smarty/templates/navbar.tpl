{assign var='userlogged' value=$userlogged|default:'nouser'}


  <nav class="navbar navbar-expand-md navbar-dark bg-primary">
    <div class="container">
      <a class="navbar-brand" href="/AppCrowdFunding/HomePage">
        <i class="fa d-inline fa-lg fa-cloud"></i>
        <b>&nbsp;Society Of Funding</b>
      </a>

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
      <form class="form-inline my-2 my-lg-0" {if $userlogged!='nouser'}style="margin-left:121px" {else} style="margin-left:81px"{/if} action="/AppCrowdFunding/Ricerca/ricerca" method="get">
        <div class="input-group">
        <input class="form-control  form-control-sm  " style="border-radius:20px 0 0 20px" type="search" placeholder="Cerca..." {if $userlogged!='nouser'}style="margin-left:-15px" size="8" {else} style="margin-left:-15px" size="14" {/if} name="str">
        <button type="submit" class="btn navbar-btn text-primary btn-light" style="border-radius:0 20px 20px 0;height: 35px;line-height: 1;"><span class="fa fa-search"></span></button>
        </div>
      </form>
       {if $userlogged!='nouser'}<a class="nav-link " id="ricAv" style=" font-size:9px; padding: 0 0.9rem; color: rgba(255, 255, 255, 0.5);" href="/AppCrowdFunding/Ricerca/ricercaAv"> Ricerca <br>Avanzata </a>{/if}
  
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
  
