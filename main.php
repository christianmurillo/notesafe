<?php
	/* The following code retrieves the diary entries from the db,
	 * so everytime a user logs in they see their previous entries.
	 * $diary gets echo'd onto the text area. */
	session_start();

	include("connection.php");

	$query = "SELECT `name`, `diary` FROM `users` WHERE `id`='".$_SESSION['id']."' LIMIT 1";

	$result = mysqli_query($link, $query); //remember this returns an array

	$row = mysqli_fetch_array($result);

	$diary = $row['diary'];

	$name = $row['name'];
 ?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Note Safe</title>

    <!-- Bootstrap -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">

    <!-- Optional theme -->
    <!--
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">
	-->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <style>

		.navbar{
			background-color: #644753;
		}
 		.navbar-brand{
 			font-size: 1.8em;
 		}
    	#mainContainer{
    		background-image: url("pic.jpg");
    		width: 100%;
    		height:100%;
 			background-size: cover; /* places image correctly on background */
 			background-position: center;
 			padding-top: 100px;
    	}
    	.row{
    		text-align: center;
    	}
 		.margTop{
 			margin-top:20px;
 		}
 		img{
 			width: 100px;
 		}
 		.navbar-brand{
 			height: 75px;
 		}
 		.textColor{
 			color: white;
 		}

    </style>

  </head>
  <body data-target=".navbar-collapse">

    <div class="navbar navbar-default navbar-fixed-top" id="navBar">

  		<div class="container">

  			<div class="navbar-header">

  				<img class="navbar-brand" src="Safe.jpg"/>

  				<a href="index.php" class="navbar-brand">The Note Safe</a>

  				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>

                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>

                </button>

  			</div>

  			<div class="collapse navbar-collapse pull-right">

				<ul class="navbar-nav nav">

					<li><p class="navbar-text">Welcome back, <?php echo $name; ?>!</p></li>

				<!-- TRY A DIFFERENT METHOD TO LOG OUT. MAYBE A BUTTON AND JS -->
				<!-- <li><a href="index_project.php?logout=1">Log Out</a></li> -->

					<li><a class="textColor" href="logout.php">Log Out</a></li>

				</ul>

  			</div>

  		</div>

  	</div><!-- end of navbar -->


  	<div class="container" id="mainContainer">

  		<div class="row">

  			<div class="col-md-6 col-md-offset-3">

				<textarea class="form-control" placeholder="Begin typing here. Changes are automatically saved."><?php echo $diary; ?></textarea>

			</div><!-- end of col-md-6-->

		</div><!-- end of row -->

	</div><!-- end of container -->

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>

  	<script>

  		$("#mainContainer").css("height", $(window).height());

  		$("textarea").css("height", $(window).height() * 0.75);

  		$("textarea").keyup(function(){

  			$.post("update.php", {diary:$("textarea").val()});
  		});

  	</script>
  </body>
</html>
