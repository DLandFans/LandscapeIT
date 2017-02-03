<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<meta name="author" content="Marc McKeown">

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

	<title>Landscape IT</title>
</head>
<body>

<div class="jumbotron">
	<div class="container">
		<h1>Landscape IT</h1>
		<h2>Under Development</h2>
			<p>
				This site is a work in progress that began as a project for eLandscape.com/LandscapeMart.com about 20 years ago.  It features implementation
				of a RESTful API to allow embedding of the Visual Library into a website.  The API was developed using Laravel 5.3.
			</p>
	</div>
</div>

<div class="container">
	<div class="row">
		<div class="col-md-4">
			<h2>Demo</h2>
			<p>View simple demo of the Visal Library embedded as a simple application.</p>
			<p><a class="btn btn-primary" href="demov1/listphp.php" role="button">Launch &raquo;</a></p>
		</div>
		<div class="col-md-4">
			<h2>Source</h2>
			<p>View source of PHP to see how the API was implemented.</p>
			<p><a class="btn btn-primary" href="demov1/script.php" role="button">View &raquo;</a></p>
		</div>
		<div class="col-md-4">
			<h2>Raw</h2>
			<p>See the raw JSON of the API as returned from api.landscapeit.com.  NOTE: In the future the API site will have implementation instructions.</p>
			<p><a class="btn btn-primary" href="http://api.landscapeit.com/vislib/v1" role="button">Plant List &raquo;</a></p>
			<p><a class="btn btn-primary" href="http://api.landscapeit.com/vislib/v1/10515" role="button">Plant Info &raquo;</a></p>
			<p><a class="btn btn-primary" href="http://api.landscapeit.com/vislib/v1/10515?detail=TRUE" role="button">Plant Info/Details &raquo;</a></p>
		</div>
	</div>
	<hr>
	<footer>
		<p>&copy; 2017 <a href="http://www.infx.com">Marc McKeown</p>
	</footer>
</div>



</body>
</html>
