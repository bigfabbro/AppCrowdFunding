<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="/AppCrowdFunding/Smarty/templates/css/theme.css"> </head>

<body style="background-image: url('/AppCrowdFunding/Smarty/img/wallpaperRazzo.jpg'); background-size:cover;">
{include file='navbar.tpl'}
  <div class="py-5 text-center ">
    <div class="container">
      <div class="row">
        <div class="p-4" style="transition: all 0.25s;">
          <div class="card text-white p-5 m-0 box-input1">
            <div class="card-block my-3">
              <img class="d-block rounded-circle img-fluid" src="data:image/jpeg;base64,{$pic64}" width=200 height=200>
              <hr>
              <p class="text-left">Username: {$user->getUsername()}</p>
              <hr>
              <p class="text-left">Email: {$user->getEmail()}</p>
              <hr>
              <p class="text-left">Name: {$user->getName()}</p>
              <hr>
              <p class="text-left">Surname: {$user->getSurname()}</p>
            </div>
          </div>
        </div>
        <div class="col-md-12 col-lg-7 bg-light box-input1" style="transition: all 0.25s;">
          <ul class="nav nav-tabs">
            <li class="nav-item">
              <a href="" class="active nav-link" data-toggle="tab" data-target="#tabone">Bio</a>
            </li>
            <li class="nav-item">
              <a href="" class="nav-link" data-toggle="tab" data-target="#tabtwo">My Campaign</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="" data-toggle="tab" data-target="#tabthree">My Pledge</a>
            </li>
          </ul>
          <div class="tab-content mt-2">
            <div class="tab-pane fade show active" id="tabone" role="tabpanel">
              {include file='profileinfo.tpl'  description=$user->getBio() city=$address->getCity() street=$address->getStreet() number=$address->getNum() zipcode=$address->getZipcode() country=$address->getCountry() sex=$user->getSex() datan=$user->getDatan() telnum=$user->getTel() }
            </div>
            <div class="tab-pane fade" id="tabtwo" role="tabpanel">
              {foreach $camps as $camp}
              {include file='campprofile.tpl' myProf=$myProf name=$camp->getName() description=$camp->getDescription() goal=$camp->getGoal() funds=$camp->getFunds() photo=$photos[$camp->getId()]}
              <hr>
              {/foreach}
            </div>
            <div class="tab-pane fade" id="tabthree" role="tabpanel">
              <p class="">TAB PLEDGED</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <br>
  <br>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>