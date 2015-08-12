<?php

	session_start();
	session_destroy();
	$message = "You have been logged out.";

	include("login.php");
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
 		.textColor{
 			color: #A4A4A4;
 		}
 		img{
 			width: 100px;
 		}
 		.navbar-brand{
 			height: 75px;
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

  			<div class="collapse navbar-collapse">

  				<form method="post" class="navbar-form navbar-right">

  					<div class="form-group">

  						<input name="loginemail" type="email" placeholder="Email" class="form-control" value="<?php echo addslashes($_POST['loginemail']); ?>"/>

  					</div>

  					<div class="form-group">

  						<input name="loginpassword" type="password" placeholder="Password" class="form-control"/>

  					</div>

					<input class="btn btn-success" type="submit" name="submit" value="Log In" />

  				</form>

  			</div>

  		</div>

  	</div><!-- end of navbar -->


  	<div class="container" id="mainContainer">

  		<div class="row">

  			<div class="col-md-6 col-md-offset-3">

			<?php

				if($message){
					echo '<div class="alert alert-success">'.$message.'</div>';
				}

			?>

			</div>

		</div><!-- end of row -->

	</div><!-- end of container -->

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>

  	<script>

  		$("#mainContainer").css("height", $(window).height());

  	</script>
  </body>
</html>
