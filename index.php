<?php
/*
	include: input source from an outher file
	include_once: in a case of multiple usage it still inputs only once.

	require: it is like include but in a case of error it gives warning.
	*/
require_once('settings/setting.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8" content="width=device-width, initial-scale=1.0">
	<title>Title of the document</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/bootstrap-grid.min.css">
	<link rel="stylesheet" href="css/bootstrap-reboot.css">

	<script scr="js/jquery.js"></script>
	<script scr="js/popper.js"></script>
	<script scr="js/bootstrap.min.js"></script>
	<script scr="js/bootstrap.bundle.min.js"></script>
</head>

<body>
	<?php
	include_once('blocks/menu.php');
	?>
	<div class="container-fluid">
		<?php
		//include command: import source data
		if(isset($_GET['site']))
		{
			//investigate the existance of the site
			$site = 'sites/' . $_GET['site'] . '.php';
			if(file_exists($site))
			{
				include($site);	
			} else
			//file does not exists
			{
				include('sites/registration.php');
			}
		} else
		{
			//if site index does not not exist in the array
			include('sites/registration.php');
		}
		?>
	</div>
</body>

</html>