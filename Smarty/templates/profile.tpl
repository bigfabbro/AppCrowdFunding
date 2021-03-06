{if $donations neq null}{assign var=doncount value=$donations|@count}{/if}
{if $camps neq null}{assign var=campcount value=$camps|@count}{/if}
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="/AppCrowdFunding/Smarty/templates/css/theme.css"> </head>

<body style="background-image: url('/AppCrowdFunding/Smarty/img/wallpaperRazzo.jpg'); background-size:cover;">
{include file='navbar.tpl'}
{include file='modifyprof.tpl' description=$user->getBio() city=$address->getCity() street=$address->getStreet() number=$address->getNum() zipcode=$address->getZipcode() country=$address->getCountry() datan=$user->getDatan() telnum=$user->getTel()}
  <div class="py-5 text-center ">
    <div class="container">
      <div class="row">
        <div class="p-4" style="transition: all 0.25s;">
          <div class="card text-white p-5 m-0 box-input1" style="width:390px;height:650px">
            <div class="card-block my-3">
              <img class="d-block rounded-circle img-fluid" src="data:image/jpeg;base64,{$pic64}" {if $myProf eq true}onmouseover="changeimg()" onmouseout="closechangeimg()"{/if} width=200 height=200>
              {if $myProf eq true}<a class="btn btn-primary text-light" style="position:absolute;top:23%;left:21%;visibility:hidden" id="btnchangeimg" onmouseover="changeimg()" onmouseout="closechangeimg()" onclick="imageselect()"> Change profile's image </a>
              <a class="btn btn-primary text-light" style="position:absolute;top:30%;left:21%;visibility:hidden" id="btndeleteimg" onmouseover="changeimg()" onmouseout="closechangeimg()" onclick="deleteimg()"> Delete profile's image </a>
              <input type="file" name="inputimage" id="inputimage" style="display:none" onchange="uploadimg()"accept="image/*"/>
              {/if}
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
          <div class="tab-content mt-2" style="height:650px;overflow-x:hidden;overflow-y:auto">
            <div class="tab-pane fade show active" id="tabone" role="tabpanel">
              {include file='profileinfo.tpl'  username=$user->getUserName() description=$user->getBio() city=$address->getCity() street=$address->getStreet() number=$address->getNum() zipcode=$address->getZipcode() country=$address->getCountry() sex=$user->getSex() datan=$user->getDatan() telnum=$user->getTel() }
            </div>
            <div class="tab-pane fade" id="tabtwo" role="tabpanel">
            {if isset($campcount)}
              {for $i=0 to $campcount-1}
              {include file='campprofile.tpl' myProf=$myProf id=$camps[$i]->getId() name=$camps[$i]->getName() description=$camps[$i]->getDescription() goal=$camps[$i]->getGoal() funds=$camps[$i]->getFunds() photo=$photos[$camps[$i]->getId()]}
              <hr>
              {/for}
            {else}
            <p class="text-center">There aren't Campaigns</p>
            {/if}
            </div>
            <div class="tab-pane fade" id="tabthree" role="tabpanel">
            {if isset($doncount)}
              {for $i=0 to $doncount-1}
              {include file='donprofile.tpl' myProf=$myProf id=$donations[$i]->getId() date=$donations[$i]->getDate() amount=$donations[$i]->getAmount() campaign=$camppledged[$i] reward=$rewards[$i]}
              <hr>
              {/for}
            {else}
            <p class="text-center">There aren't donations</p>
            {/if}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <br>
  <br>
  <noscript>
  <meta http-equiv=refresh content='0; url=/AppCrowdFunding/Errore/NoJavascript'>
  </noscript>
  <script src="/AppCrowdFunding/Smarty/templates/js/profile.js"></script>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>