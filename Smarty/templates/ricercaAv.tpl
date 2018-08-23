<!DOCTYPE html>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<title>Ricerca avanzata</title>
<link rel="stylesheet" href="css/theme.css">
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
			<form action="/AppCrowdFunding/Ricerca/rAvanzata">
				<div class="form-row">
					<div class="form-group col-md-6">
						<input type="text" class="form-control" id="search" name="str" placeholder="Search...">
					</div>
					<div class="form-group col-md-3">
						<select id="inputKey" class="form-control" name="value">
							<option value="category" selected>Category</option>
							<option value="name">Name</option>
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