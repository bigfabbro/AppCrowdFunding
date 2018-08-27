<!DOCTYPE html>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<title>Ricerca avanzata</title>
<link rel="stylesheet" href="css/theme.css">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>

<script src="/AppCrowdFunding/Smarty/templates/js/ricercaAv.js">
</script>
  
</head>
<body> {include file="navbar.tpl"}
<br>
<br>
<br>
<br>
<br>
	<div class="container text-center">
		<div class="col-sm-3">
		
        </div>
		<div class="col-sm-7 well">
			<form action="/AppCrowdFunding/Ricerca/ricercaAv">
				<div class="form-row">
					<div class="form-group col-md-6">
						<input type="text" class="form-control" id="search" name="str" placeholder="Cerca..">
					</div>
					<div class="form-group col-md-3">
						<select id="inputKey" class="form-control" name="key">
							<option value="campagna" selected>Campagna</option>
							<option value="utente">Utente</option>
						</select>
					</div>
					<div class="form-group col-md-3">
						<select cerca="cerca" id="inputKey" class="form-control" name="value">
							<option value="category" selected>Category</option>
							<option id="opt-name" value="name">Name</option>
							<option value="username">Username</option>
						</select>
					</div>
					<button class="btn btn-primary" type="submit">Ricerca</button>

				</div>
			</form>
		</div>
		<div class="col-sm-3">
		
		</div>
	</div>
</body>
</html>