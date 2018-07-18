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
  <div class="py-5">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h1 class="text-center text-light">Registration</h1>
        </div>
      </div>
    </div>
    <form action="registration" method="POST" enctype="multipart/form-data">
     <div class="container">
      <div class="row">
        <div class="col-md-6">
          <div class="card">
            <div class="card-body p-5 h-100">
              <h3 class="pb-3">Basic Information</h3>
                <div class="form-group">
                  <label>Name</label>
                  {if isset($errors) && $errors.name eq "true"}
                  <input class="form-control border border-danger" placeholder="Your name, please" required="required" name="name" id="name"></div>
                  {else if isset($errors) }
                      <input class="form-control" value="{$values.name}" required="required" name="name" id="name"></div>
                  {else}
                      <input class="form-control" placeholder="Your name, please" required="required" name="name" id="name"></div>
                  {/if}
                <div class="form-group">
                  <label>Surname</label>
                  {if isset($errors) && $errors.surname eq "true"}
                  <input class="form-control border border-danger" required="required" placeholder="You surname, please" required="required" name="surname" id="surname"> </div>
                  {else if isset($errors)}
                  <input class="form-control required="required"  value="{$values.surname}" required="required" name="surname" id="surname"> </div>
                  {else}
                  <input class="form-control" required="required" placeholder="You surname, please" required="required" name="surname" id="surname"> </div>
                  {/if}
                  <div class="form-group">
                  <label>Sesso</label>
                  <br>
                  <center><label>M</label></center><input class="form-control" name="sex" type="radio" value="M" required="required" checked="checked">
                  <center><label>F</label></center><input class="form-control" name="sex" type="radio" value="F"> 
                  </div>
                <div class="form-group">
                  <label>Date of Birth</label>
                  {if isset($errors) && $errors.date eq "true"}
                  <input type="date" class="form-control border border-danger"  required="required" name="date" id="data"> </div>
                  {else if isset($errors)}
                  <input type="date" class="form-control"  value="{$values.date}" required="required" name="date" id="data"> </div>
                  {else}
                  <input type="date" class="form-control"  required="required" name="date" id="data"> </div>
                  {/if}
                <div class="form-group">
                  <label>Address</label>
                  {if isset($errors) && $errors.city eq "true"}
                  <input type="text" class="form-control border border-danger" placeholder="City" required="required" name="city" id="city">
                  {else if isset($errors)}
                  <input type="text" class="form-control" value="{$values.city}" required="required" name="city" id="city">
                  {else}
                  <input type="text" class="form-control" placeholder="City" required="required" name="city" id="city">
                  {/if}
                  {if isset($errors) && $errors.street eq "true"}
                  <input type="text" class="form-control border border-danger" placeholder="Street" required="required" name="street" id="street">
                  {else if isset($errors)}
                  <input type="text" class="form-control" value="{$values.street}"  required="required" name="street" id="street">
                  {else}
                  <input type="text" class="form-control" placeholder="Street" required="required" name="street" id="street">
                  {/if}
                  {if isset($errors) && $errors.number eq "true"}
                  <input type="number" class="form-control border border-danger" placeholder="Number" required="required" name="number" id="number">
                  {else if isset($errors)}
                  <input type="number" class="form-control border" value="{$values.number}" required="required" name="number" id="number">
                  {else}
                  <input type="number" class="form-control" placeholder="Number" required="required" name="number" id="number">
                  {/if}
                  {if isset($errors) && $errors.zipcode eq "true"}
                  <input type="text" class="form-control border border-danger" placeholder="Zipcode" required="required" name="zipcode" id="zipcode">
                  {else if isset($errors)}
                  <input type="text" class="form-control" value="{$values.zipcode}" required="required" name="zipcode" id="zipcode">
                  {else}
                  <input type="text" class="form-control" placeholder="Zipcode" required="required" name="zipcode" id="zipcode">
                  {/if}
                  {if isset($errors) && $errors.country eq "true"}
                  <input type="text" class="form-control border border-danger" required="required" placeholder="Country" name="country" id="country"> </div>
                  {else if isset($errors)}
                  <input type="text" class="form-control" required="required" value="{$values.country}" name="country" id="country"> </div>
                  {else}
                  <input type="text" class="form-control" required="required" placeholder="Country" name="country" id="country"> </div>
                  {/if}
                  <label>Telephon number</label>
                  {if isset($errors) && $errors.telnumber eq "true"}
                  <input type="text" class="form-control border border-danger" placeholder="Your telephon number, please" name="telnumber" > </div>
                  {else if isset($errors)}
                  <input type="text" class="form-control border" value="{$values.telnumber}" name="telnumber" > </div>
                  {else}
                  <input type="text" class="form-control border" placeholder="Your telephon number, please" name="telnumber" > </div>
                  {/if}
                <div class="form-group">
              </form>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="card">
            <div class="card-body p-5 h-100">
              <h3 class="pb-3">Profile information</h3>
                <div class="form-group">
                  <label>E-mail</label>
                  {if isset($errors) && $errors.email eq "true"}
                  <input type="email" class="form-control border border-danger" placeholder="Your email, please" required="required" name="email" id="email"> </div>
                  {else if isset($errors)} 
                  <input type="email" class="form-control" value="{$values.email}" required="required" name="email" id="email"> </div>
                  {else}
                  <input type="email" class="form-control" placeholder="Your email, please" required="required" name="email" id="email"> </div>
                  {/if}
                <div class="form-group">
                  <label>Username</label>
                  {if isset($errors) && $errors.email eq "true"}
                  <input class="form-control border border-danger" placeholder="Choose a username!" required="required" name="username" id="username"> </div>
                  {else if isset($errors)}
                  <input class="form-control" value="{$values.username}" required="required" name="username" id="username"> </div>
                  {else}
                  <input class="form-control" placeholder="Choose a username!" required="required" name="username" id="username"> </div>
                  {/if}
                <div class="form-group">
                  <label>Password</label>
                 {if isset($errors) && $errors.password eq "true"}
                  <input type="password" class="form-control border border-danger" placeholder="Choose a password" required="required" name="password1" id="password1"> </div>
                 {else}
                 <input type="password" class="form-control" placeholder="Choose a password" required="required" name="password1" id="password1"> </div>
                 {/if}
                <div class="form-group">
                  <label>Confirm Password</label>
                  {if isset($errors) && $errors.password eq "true"}
                  <input type="password" class="form-control border border-danger" placeholder="Re-insert the same password" required="required" name="password2" id="password2"> </div>
                 {else}
                 <input type="password" class="form-control" placeholder="Re-insert the same password" required="required" name="password2" id="password2"> </div>
                 {/if}
                <div class="form-group">
                  <label>Short description</label>
                  <textarea class="form-control form-control-lg" id="exampleTextarea" rows="3" name="description"></textarea>
                </div>
                <div class="form-group">
                  <label>Picture&nbsp;</label>
                  {if isset($errors) && $errors.profpic eq "true"}
                  <input type="file" class="form-control-file border boder-danger" name="upicture" accept="image/*"> </div>
                  {else}
                  <input type="file" class="form-control-file" name="upicture" accept="image/*"> </div>
                  {/if}
                <button type="submit" class="btn btn-primary btn-lg submit-button" onclick="wait()">Submit</button>
            </div>
          </div>
        </div>
      </div>
    </div>
    </form>
  </div>
  <script src="/AppCrowdFunding/Smarty/templates/js/wait.js"></script>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>