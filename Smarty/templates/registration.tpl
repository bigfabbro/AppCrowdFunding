<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="/AppCrowdFunding/Smarty/templates/css/theme.css" type="text/css"> 
</head>

<body style="background-image: url('/AppCrowdFunding/Smarty/img/wallpaperRazzo.jpg');background-size:cover;">
{include file='navbar.tpl'}
      <div class="row wait" id="modalwait" style="visibility:hidden">
        <div class="col-md-3"> </div>
        <div class="col-md-6">
          <div class="card text-white p-5 bg-primary ">
            <div class="card-body">
              <h4 class="card-title">Attendi qualche secondo, stiamo elaborando la tua richiesta.</h4>
            </div>
          </div>
        </div>
      </div>
  <div class="py-5" style="height:940px">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h1 class="text-center text-light">Registration</h1>
        </div>
      </div>
    </div>
    <form action="registration" method="POST" enctype="multipart/form-data" id="registrationform">
     <div class="container">
      <div class="row">
        <div class="col-md-6">
          <div class="card">
            <div class="card-body p-5 style="height:940px"">
              <h3 class="pb-3">Basic Information</h3>
                <div class="form-group">
                  <label>Name</label>
                  {if isset($errors) && $errors.name eq "true"}
                  <input class="form-control border border-danger" placeholder="Your name, please" name="name" id="name" onchange="inputVerifyRegistration(this.id)"></div>
                  {else if isset($errors) }
                      <input class="form-control" value="{$values.name}" name="name" id="name" onchange="inputVerifyRegistration(this.id)"></div>
                  {else}
                      <input class="form-control" placeholder="Your name, please" name="name" id="name" onchange="inputVerifyRegistration(this.id)"></div>
                  {/if}
                <div class="form-group">
                  <label>Surname</label>
                  {if isset($errors) && $errors.surname eq "true"}
                  <input class="form-control border border-danger" placeholder="You surname, please" name="surname" id="surname" onchange="inputVerifyRegistration(this.id)"> </div>
                  {else if isset($errors)}
                  <input class="form-control  value="{$values.surname}" name="surname" id="surname" onchange="inputVerifyRegistration(this.id)"> </div>
                  {else}
                  <input class="form-control" placeholder="You surname, please" name="surname" id="surname" onchange="inputVerifyRegistration(this.id)"> </div>
                  {/if}
                  <div class="form-group">
                  <label>Sesso</label>
                  <br>
                  <center><label>M</label></center><input class="form-control" name="sex" type="radio" value="M" checked="checked" id="sex" onchange="inputVerifyRegistration(this.id)">
                  <center><label>F</label></center><input class="form-control" name="sex" type="radio" value="F" id="sex" onchange="inputVerifyRegistration(this.id)"> 
                  </div>
                <div class="form-group">
                  <label>Date of Birth</label>
                  {if isset($errors) && $errors.date eq "true"}
                  <input type="date" class="form-control border border-danger"  name="date" id="date" onchange="inputVerifyRegistration(this.id)"> </div>
                  {else if isset($errors)}
                  <input type="date" class="form-control"  value="{$values.date}" name="date" id="date" onchange="inputVerifyRegistration(this.id)"> </div>
                  {else}
                  <input type="date" class="form-control"  name="date" id="date" onchange="inputVerifyRegistration(this.id)"> </div>
                  {/if}
                <div class="form-group">
                  <label>Address</label>
                  {if isset($errors) && $errors.city eq "true"}
                  <input type="text" class="form-control border border-danger" placeholder="City" name="city" id="city" onchange="inputVerifyRegistration(this.id)">
                  {else if isset($errors)}
                  <input type="text" class="form-control" value="{$values.city}" name="city" id="city" onchange="inputVerifyRegistration(this.id)">
                  {else}
                  <input type="text" class="form-control" placeholder="City" name="city" id="city" onchange="inputVerifyRegistration(this.id)">
                  {/if}
                  {if isset($errors) && $errors.street eq "true"}
                  <input type="text" class="form-control border border-danger" placeholder="Street" name="street" id="street" onchange="inputVerifyRegistration(this.id)">
                  {else if isset($errors)}
                  <input type="text" class="form-control" value="{$values.street}"  name="street" id="street" onchange="inputVerifyRegistration(this.id)">
                  {else}
                  <input type="text" class="form-control" placeholder="Street" name="street" id="street" onchange="inputVerifyRegistration(this.id)">
                  {/if}
                  {if isset($errors) && $errors.number eq "true"}
                  <input type="number" class="form-control border border-danger" placeholder="Number" name="number" id="number" onchange="inputVerifyRegistration(this.id)">
                  {else if isset($errors)}
                  <input type="number" class="form-control border" value="{$values.number}" name="number" id="number" onchange="inputVerifyRegistration(this.id)">
                  {else}
                  <input type="number" class="form-control" placeholder="Number" name="number" id="number" onchange="inputVerifyRegistration(this.id)">
                  {/if}
                  {if isset($errors) && $errors.zipcode eq "true"}
                  <input type="text" class="form-control border border-danger" placeholder="Zipcode" name="zipcode" id="zipcode" onchange="inputVerifyRegistration(this.id)">
                  {else if isset($errors)}
                  <input type="text" class="form-control" value="{$values.zipcode}" name="zipcode" id="zipcode" onchange="inputVerifyRegistration(this.id)">
                  {else}
                  <input type="text" class="form-control" placeholder="Zipcode" name="zipcode" id="zipcode" onchange="inputVerifyRegistration(this.id)">
                  {/if}
                  {if isset($errors) && $errors.country eq "true"}
                  <input type="text" class="form-control border border-danger" placeholder="Country" name="country" id="country" onchange="inputVerifyRegistration(this.id)"> </div>
                  {else if isset($errors)}
                  <input type="text" class="form-control" value="{$values.country}" name="country" id="country" onchange="inputVerifyRegistration(this.id)"> </div>
                  {else}
                  <input type="text" class="form-control" placeholder="Country" name="country" id="country" onchange="inputVerifyRegistration(this.id)"> </div>
                  {/if}
                  <label>Telephon number</label>
                  {if isset($errors) && $errors.telnumber eq "true"}
                  <input type="text" class="form-control border border-danger" placeholder="Your telephon number, please" name="telnumber" id="telnumber" onchange="inputVerifyRegistration(this.id)"> </div>
                  {else if isset($errors)}
                  <input type="text" class="form-control" value="{$values.telnumber}" name="telnumber" onchange="inputVerifyRegistration(this.id)" id="telnumber" > </div>
                  {else}
                  <input type="text" class="form-control" placeholder="Your telephon number, please" name="telnumber" onchange="inputVerifyRegistration(this.id)" id="telnumber"> </div>
                  {/if}
                <div class="form-group">
              </form>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="card">
            <div class="card-body p-5 style="height:955px">
              <h3 class="pb-3">Profile information</h3>
                <div class="form-group">
                  <label>E-mail</label>
                  {if isset($errors) && $errors.email eq "true"}
                  <input type="email" class="form-control border border-danger" placeholder="Your email, please" name="email" id="email" onchange="inputVerifyRegistration(this.id)"> </div>
                  {else if isset($errors)} 
                  <input type="email" class="form-control" value="{$values.email}" name="email" id="email" onchange="inputVerifyRegistration(this.id)"> </div>
                  {else}
                  <input type="email" class="form-control" placeholder="Your email, please" name="email" id="email" onchange="inputVerifyRegistration(this.id)"> </div>
                  {/if}
                <div class="form-group">
                  <label>Username</label>
                  {if isset($errors) && $errors.email eq "true"}
                  <input class="form-control border border-danger" placeholder="Choose a username!" name="username" id="username" onchange="inputVerifyRegistration(this.id)"> </div>
                  {else if isset($errors)}
                  <input class="form-control" value="{$values.username}" name="username" id="username" onchange="inputVerifyRegistration(this.id)"> </div>
                  {else}
                  <input class="form-control" placeholder="Choose a username!" name="username" id="username" onchange="inputVerifyRegistration(this.id)"> </div>
                  {/if}
                <div class="form-group">
                  <label>Password</label>
                 {if isset($errors) && $errors.password eq "true"}
                  <input type="password" class="form-control border border-danger" placeholder="Choose a password" name="password1" id="password1" onchange="inputVerifyRegistration(this.id)"> </div>
                 {else}
                 <input type="password" class="form-control" placeholder="Choose a password" name="password1" id="password1" onchange="inputVerifyRegistration(this.id)"> </div>
                 {/if}
                <div class="form-group">
                  <label>Confirm Password</label>
                  {if isset($errors) && $errors.password eq "true"}
                  <input type="password" class="form-control border border-danger" placeholder="Re-insert the same password" name="password2" id="password2" onchange="passverification(this.id)"> </div>
                 {else}
                 <input type="password" class="form-control" placeholder="Re-insert the same password" name="password2" id="password2" onchange="passverification(this.id)"> </div>
                 {/if}
                <div class="form-group">
                  <label>Short description</label>
                  <textarea class="form-control form-control-lg" id="description" rows="3" name="description"></textarea>
                </div>
                <div class="form-group">
                  <label>Picture&nbsp;</label>
                  {if isset($errors) && $errors.profpic eq "true"}
                  <input type="file" class="form-control-file border border-danger" name="upicture" id="upciture" onchange="inputVerifyRegistration(this.id)" accept="image/*"> </div>
                  {else}
                  <input type="file" class="form-control-file border" name="upicture" id="upicture" onchange="inputVerifyRegistration(this.id)"> </div>
                  {/if}
                <button type="button" class="btn btn-primary btn-lg submit-button" id="submitbutton" onclick="SubmitOrNot()">Submit</button>
            </div>
          </div>
        </div>
      </div>
    </div>
    </form>
  </div>
  <script src="/AppCrowdFunding/Smarty/templates/js/registration.js"></script>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>