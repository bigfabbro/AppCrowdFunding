{if $tecno neq null}{assign var=teccount value=$tecno|@count}{/if}
{if $art neq null}{assign var=artcount value=$art|@count}{/if}
{if $charities neq null}{assign var=charcount value=$charities|@count}{/if}
{if $music neq null}{assign var=musiccount value=$music|@count}{/if}
{if $food neq null}{assign var=foodcount value=$food|@count}{/if}
{if $fashion neq null}{assign var=fashioncount value=$fashion|@count}{/if}
{if $filmvid neq null}{assign var=filmcount value=$filmvid|@count}{/if}
{if $best neq null}{assign var=bestcount value=$best|@count}{/if}
{if $last neq null}{assign var=lastcount value=$last|@count}{/if}
{if $exp neq null}{assign var=expcount value=$exp|@count}{/if}
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="/AppCrowdFunding/Smarty/templates/css/theme.css" type="text/css"> </head>

<body style="background-image: url('/AppCrowdFunding/Smarty/img/wallpaperRazzo.jpg');background-size:cover;">
{include file='navbar.tpl'}
  <div class="py-5">
    <div class="container">
      <div class="row">
        <div class="bg-light box-input1 p-0 col-md-5 mx-auto">
          <div class="row">
            <div class="col-md-12">
              <h1 class="text-center">Tecnology</h1>
            </div>
          </div>
          <div class="row h-25 px-1">
            <div class="col-md-12">
              <div class="row">
                <div class="col-md-2">
                  <p class="lead m-1 text-center">#</p>
                </div>
                <div class="p-0 col-md-6">
                  <p class="lead m-1 text-center">Name</p>
                </div>
                <div class="col-md-4 p-0">
                  <p class="lead m-1 text-center">funds</p>
                </div>
              </div>
              {if isset($teccount)}
              {for $i=0 to $teccount-1}
              <div class="row">
                <div class="col-md-2">
                  <p class="lead m-1 text-center">{$i+1}</p>
                </div>
                <div class="col-md-6 p-0">
                  <p class="lead m-1 text-center"><a href="/AppCrowdFunding/Campagna/profile/{$tecno[$i]->getId()}">{$tecno[$i]->getName()}</a></p>
                </div>
                <div class="col-md-4 align-items-center align-self-center text-center">
                  <div class="progress">
                    <div class="progress-bar progress-bar-striped" role="progressbar" style="width: {(100*$tecno[$i]->getFunds())/$tecno[$i]->getGoal()}%">{(100*$tecno[$i]->getFunds())/$tecno[$i]->getGoal()}%</div>
                  </div>
                </div>
              </div>
              {/for}
              {else}
              <div class="row">
                <div class="col-md-12">
                  <p class="lead m-1 text-center">Non ci sono campagne</p>
                </div>
              </div>
              {/if}
            </div>
          </div>
        </div>
        <div class="bg-light box-input1 col-md-5 mx-auto">
          <div class="row">
            <div class="col-md-12">
              <h1 class="text-center">Art</h1>
            </div>
          </div>
          <div class="row h-25">
            <div class="col-md-12">
              <div class="row">
                <div class="col-md-2">
                  <p class="lead m-1 text-center">#</p>
                </div>
                <div class="p-0 col-md-6">
                  <p class="lead m-1 text-center">Name</p>
                </div>
                <div class="col-md-4 p-0">
                  <p class="lead m-1 text-center">funds</p>
                </div>
              </div>
              {if isset($artcount)}
              {for $i=0 to $artcount-1}
              <div class="row">
                <div class="col-md-2">
                  <p class="lead m-1 text-center">{$i+1}</p>
                </div>
                <div class="col-md-6 p-0">
                  <p class="lead m-1 text-center"><a href="/AppCrowdFunding/Campagna/profile/{$art[$i]->getId()}">{$art[$i]->getName()}</a></p>
                </div>
                <div class="col-md-4 align-items-center align-self-center text-center">
                  <div class="progress">
                    <div class="progress-bar progress-bar-striped" role="progressbar" style="width: {(100*$art[$i]->getFunds())/$art[$i]->getGoal()}%">{(100*$art[$i]->getFunds())/$art[$i]->getGoal()}%</div>
                  </div>
                </div>
              </div>
              {/for}
              {else}
              <div class="row">
                <div class="col-md-12">
                  <p class="lead m-1 text-center">Non ci sono campagne</p>
                </div>
              </div>
              {/if}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="py-5">
    <div class="container">
      <div class="row">
        <div class="bg-light box-input1 p-0 col-md-5 mx-auto">
          <div class="row">
            <div class="col-md-12">
              <h1 class="text-center">Charities</h1>
            </div>
          </div>
          <div class="row h-25 px-1">
            <div class="col-md-12">
              <div class="row">
                <div class="col-md-2">
                  <p class="lead m-1 text-center">#</p>
                </div>
                <div class="p-0 col-md-6">
                  <p class="lead m-1 text-center">Name</p>
                </div>
                <div class="col-md-4 p-0">
                  <p class="lead m-1 text-center">funds</p>
                </div>
              </div>
              {if isset($charcount)}
              {for $i=0 to $charcount-1}
              <div class="row">
                <div class="col-md-2">
                  <p class="lead m-1 text-center">{$i+1}</p>
                </div>
                <div class="col-md-6 p-0">
                  <p class="lead m-1 text-center"><a href="/AppCrowdFunding/Campagna/profile/{$charities[$i]->getId()}">{$charities[$i]->getName()}</a></p>
                </div>
                <div class="col-md-4 align-items-center align-self-center text-center">
                  <div class="progress">
                    <div class="progress-bar progress-bar-striped" role="progressbar" style="width: {(100*$charities[$i]->getFunds())/$charities[$i]->getGoal()}%">{(100*$charities[$i]->getFunds())/$charities[$i]->getGoal()}%</div>
                  </div>
                </div>
              </div>
              {/for}
              {else}
                <div class="row">
                <div class="col-md-12">
                  <p class="lead m-1 text-center">Non ci sono campagne</p>
                </div>
              </div>
              {/if}
            </div>
          </div>
        </div>
        <div class="bg-light box-input1 col-md-5 mx-auto">
          <div class="row">
            <div class="col-md-12">
              <h1 class="text-center">Music</h1>
            </div>
          </div>
          <div class="row h-25">
            <div class="col-md-12">
              <div class="row">
                <div class="col-md-2">
                  <p class="lead m-1 text-center">#</p>
                </div>
                <div class="p-0 col-md-6">
                  <p class="lead m-1 text-center">Name</p>
                </div>
                <div class="col-md-4 p-0">
                  <p class="lead m-1 text-center">funds</p>
                </div>
              </div>
              {if isset($musiccount)}
              {for $i=0 to $musiccount-1}
              <div class="row">
                <div class="col-md-2">
                  <p class="lead m-1 text-center">{$i+1}</p>
                </div>
                <div class="col-md-6 p-0">
                  <p class="lead m-1 text-center"><a href="/AppCrowdFunding/Campagna/profile/{$music[$i]->getId()}">{$music[$i]->getName()}</a></p>
                </div>
                <div class="col-md-4 align-items-center align-self-center text-center">
                  <div class="progress">
                    <div class="progress-bar progress-bar-striped" role="progressbar" style="width: {(100*$music[$i]->getFunds())/$music[$i]->getGoal()}%">{(100*$music[$i]->getFunds())/$music[$i]->getGoal()}%</div>
                  </div>
                </div>
              </div>
              {/for}
              {else}
              <div class="row">
                <div class="col-md-12">
                  <p class="lead m-1 text-center">Non ci sono campagne</p>
                </div>
              </div>
              {/if}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="py-5">
    <div class="container">
      <div class="row">
        <div class="bg-light box-input1 p-0 col-md-5 mx-auto">
          <div class="row">
            <div class="col-md-12">
              <h1 class="text-center">Food</h1>
            </div>
          </div>
          <div class="row h-25 px-1">
            <div class="col-md-12">
              <div class="row">
                <div class="col-md-2">
                  <p class="lead m-1 text-center">#</p>
                </div>
                <div class="p-0 col-md-6">
                  <p class="lead m-1 text-center">Name</p>
                </div>
                <div class="col-md-4 p-0">
                  <p class="lead m-1 text-center">funds</p>
                </div>
              </div>
              {if isset($foodcount)}
              {for $i=0 to $foodcount-1}
              <div class="row">
                <div class="col-md-2">
                  <p class="lead m-1 text-center">{$i+1}</p>
                </div>
                <div class="col-md-6 p-0">
                  <p class="lead m-1 text-center"><a href="/AppCrowdFunding/Campagna/profile/{$food[$i]->getId()}">{$food[$i]->getName()}</a></p>
                </div>
                <div class="col-md-4 align-items-center align-self-center text-center">
                  <div class="progress">
                    <div class="progress-bar progress-bar-striped" role="progressbar" style="width: {(100*$food[$i]->getFunds())/$food[$i]->getGoal()}%">{(100*$food[$i]->getFunds())/$food[$i]->getGoal()}%</div>
                  </div>
                </div>
              </div>
              {/for}
              {else}
              <div class="row">
                <div class="col-md-12">
                  <p class="lead m-1 text-center">Non ci sono campagne</p>
                </div>
              </div>
              {/if}
            </div>
          </div>
        </div>
        <div class="bg-light box-input1 col-md-5 mx-auto">
          <div class="row">
            <div class="col-md-12">
              <h1 class="text-center">Fashion</h1>
            </div>
          </div>
          <div class="row h-25">
            <div class="col-md-12">
              <div class="row">
                <div class="col-md-2">
                  <p class="lead m-1 text-center">#</p>
                </div>
                <div class="p-0 col-md-6">
                  <p class="lead m-1 text-center">Name</p>
                </div>
                <div class="col-md-4 p-0">
                  <p class="lead m-1 text-center">funds</p>
                </div>
              </div>
              {if isset($fashioncount)}
              {for $i=0 to $fashioncount-1}
              <div class="row">
                <div class="col-md-2">
                  <p class="lead m-1 text-center">{i+1}</p>
                </div>
                <div class="col-md-6 p-0">
                  <p class="lead m-1 text-center"><a href="/AppCrowdFunding/Campagna/profile/{$fashion[$i]->getId()}">{$fashion[$i]->getName()}</a></p>
                </div>
                <div class="col-md-4 align-items-center align-self-center text-center">
                  <div class="progress">
                    <div class="progress-bar progress-bar-striped" role="progressbar" style="width: {(100*$fashion[$i]->getFunds())/$fashion[$i]->getGoal()}%">{(100*$fashion[$i]->getFunds())/$fashion[$i]->getGoal()}%</div>
                  </div>
                </div>
              </div>
              {/for}
              {else}
              <div class="row">
                <div class="col-md-12">
                  <p class="lead m-1 text-center">Non ci sono campagne</p>
                </div>
              </div>
              {/if}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="py-5">
    <div class="container">
      <div class="row">
        <div class="bg-light box-input1 p-0 col-md-5 mx-auto">
          <div class="row">
            <div class="col-md-12">
              <h1 class="text-center">Film &amp; Video</h1>
            </div>
          </div>
          <div class="row h-25 px-1">
            <div class="col-md-12">
              <div class="row">
                <div class="col-md-2">
                  <p class="lead m-1 text-center">#</p>
                </div>
                <div class="p-0 col-md-6">
                  <p class="lead m-1 text-center">Name</p>
                </div>
                <div class="col-md-4 p-0">
                  <p class="lead m-1 text-center">funds</p>
                </div>
              </div>
              {if isset($filmvidcount)}
              {for $i=0 to $filmvidcount-1}
              <div class="row">
                <div class="col-md-2">
                  <p class="lead m-1 text-center">{$i+1}</p>
                </div>
                <div class="col-md-6 p-0">
                  <p class="lead m-1 text-center"><a href="/AppCrowdFunding/Campagna/profile/{$filmvid[$i]->getId()}">{$filmvid[$i]->getName()}</a></p>
                </div>
                <div class="col-md-4 align-items-center align-self-center text-center">
                  <div class="progress">
                    <div class="progress-bar progress-bar-striped" role="progressbar" style="width: {(100*$filmvid[$i]->getFunds())/$filmvid[$i]->getGoal()}%">{(100*$filmvid[$i]->getFunds())/$filmvid[$i]->getGoal()}%</div>
                  </div>
                </div>
              </div>
              {/for}
              {else}
              <div class="row">
                <div class="col-md-12">
                  <p class="lead m-1 text-center">Non ci sono campagne</p>
                </div>
              </div>
              {/if}
            </div>
          </div>
        </div>
        <div class="bg-light box-input1 col-md-5 mx-auto">
          <div class="row">
            <div class="col-md-12">
              <h1 class="text-center">Last insert</h1>
            </div>
          </div>
          <div class="row h-25">
            <div class="col-md-12">
              <div class="row">
                <div class="col-md-2">
                  <p class="lead m-1 text-center">#</p>
                </div>
                <div class="p-0 col-md-6">
                  <p class="lead m-1 text-center">Name</p>
                </div>
                <div class="col-md-4 p-0">
                  <p class="lead m-1 text-center">funds</p>
                </div>
              </div>
               {if isset($lastcount)}
              {for $i=0 to $lastcount-1}
              <div class="row">
                <div class="col-md-2">
                  <p class="lead m-1 text-center">{$i+1}</p>
                </div>
                <div class="col-md-6 p-0">
                  <p class="lead m-1 text-center"><a href="/AppCrowdFunding/Campagna/profile/{$last[$i]->getId()}">{$last[$i]->getName()}</a></p>
                </div>
                <div class="col-md-4 align-items-center align-self-center text-center">
                  <div class="progress">
                    <div class="progress-bar progress-bar-striped" role="progressbar" style="width: {(100*$last[$i]->getFunds())/$last[$i]->getGoal()}%">{(100*$last[$i]->getFunds())/$last[$i]->getGoal()}%</div>
                  </div>
                </div>
              </div>
              {/for}
              {else}
              <div class="row">
                <div class="col-md-12">
                  <p class="lead m-1 text-center">Non ci sono campagne</p>
                </div>
              </div>
              {/if}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="py-5">
    <div class="container">
      <div class="row">
        <div class="bg-light box-input1 p-0 col-md-5 mx-auto">
          <div class="row">
            <div class="col-md-12">
              <h1 class="text-center">Expiring in this month</h1>
            </div>
          </div>
          <div class="row h-25 px-1">
            <div class="col-md-12">
              <div class="row">
                <div class="col-md-2">
                  <p class="lead m-1 text-center">#</p>
                </div>
                <div class="p-0 col-md-6">
                  <p class="lead m-1 text-center">Name</p>
                </div>
                <div class="col-md-4 p-0">
                  <p class="lead m-1 text-center">funds</p>
                </div>
              </div>
              {if isset($expcount)}
              {for $i=0 to $expcount-1}
              <div class="row">
                <div class="col-md-2">
                  <p class="lead m-1 text-center">{$i+1}</p>
                </div>
                <div class="col-md-6 p-0">
                  <p class="lead m-1 text-center"><a href="/AppCrowdFunding/Campagna/profile/{$exp[$i]->getId()}">{$exp[$i]->getName()}</a></p>
                </div>
                <div class="col-md-4 align-items-center align-self-center text-center">
                  <div class="progress">
                    <div class="progress-bar progress-bar-striped" role="progressbar" style="width: {(100*$exp[$i]->getFunds())/$exp[$i]->getGoal()}%">{(100*$exp[$i]->getFunds())/$exp[$i]->getGoal()}%</div>
                  </div>
                </div>
              </div>
              {/for}
              {else}
                   <div class="row">
                <div class="col-md-12">
                  <p class="lead m-1 text-center">Non ci sono campagne</p>
                </div>
              </div>
              {/if}
            </div>
          </div>
        </div>
        <div class="bg-light box-input1 col-md-5 mx-auto">
          <div class="row">
            <div class="col-md-12">
              <h1 class="text-center">Best of today</h1>
            </div>
          </div>
          <div class="row h-25">
            <div class="col-md-12">
              <div class="row">
                <div class="col-md-2">
                  <p class="lead m-1 text-center">#</p>
                </div>
                <div class="p-0 col-md-6">
                  <p class="lead m-1 text-center">Name</p>
                </div>
                <div class="col-md-4 p-0">
                  <p class="lead m-1 text-center">funds</p>
                </div>
              </div>
               {if isset($bestcount)}
              {for $i=0 to $bestcount-1}
              <div class="row">
                <div class="col-md-2">
                  <p class="lead m-1 text-center">{$i+1}</p>
                </div>
                <div class="col-md-6 p-0">
                  <p class="lead m-1 text-center"><a href="/AppCrowdFunding/Campagna/profile/{$best[$i]->getId()}">{$best[$i]->getName()}</a></p>
                </div>
                <div class="col-md-4 align-items-center align-self-center text-center">
                  <div class="progress">
                    <div class="progress-bar progress-bar-striped" role="progressbar" style="width: {(100*$best[$i]->getFunds())/$best[$i]->getGoal()}%">{(100*$best[$i]->getFunds())/$best[$i]->getGoal()}%</div>
                  </div>
                </div>
              </div>
              {/for}
              {else}
              <div class="row">
                <div class="col-md-12">
                  <p class="lead m-1 text-center">Non ci sono campagne</p>
                </div>
              </div>
              {/if}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>