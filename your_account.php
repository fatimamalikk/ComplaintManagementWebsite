<?php
include_once('connection.php');
include_once('functions.php');
//$username = $_POST["username"];
// if user is not logged int then redirect to login page.
if (!isset($_SESSION['loggedin_user'])) redirect('login.php?login_required=1'); 

?>
<!DOCTYPE html>
<html>
<head>
	<title>YourAccount-BCC</title>
	<link rel="icon" type="image/png" href="logo.png">

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

  	<link rel="stylesheet" href="style.css">
  	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
</head>
<body>
<!------------------------------------------------------------------------------------------------------------------------- -->

<div class="container">
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark sticky-top">
		<!--<a class="navbar-brand" href="#"><img id="logo" src="bahria-town-logo.png" style="height:65px;width:57px;"/></a>-->
	<a class="navbar-brand" href="http://www.bahriatown.com/">Bahria Town (Pvt) Ltd.</a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span></button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
	  	<ul class="navbar-nav mr-auto">
	    	<li class="nav-item">
	      	<a class="nav-link" href="file:///C:/Users/fatim/Desktop/web/homepage.html">Home</a>
	    	</li>
	    	<li class="nav-item">
	      	<a class="nav-link" href="http://www.bahriatown.com/index.php?option=com_content&task=blogcategory&id=13&Itemid=99">About Us</a>
	    	</li>
	    	<li class="nav-item">
	      	<a class="nav-link" href="#">Contact Us</a>
	    	</li>
	    	<li class="nav-item">
	      	<a class="nav-link" href="#">Our Services</a>
	    	</li>
	  	</ul>

<!------------------------------------------------------------------------------------------------------------------------- -->
	</div>
	</nav> <!--navigation bar end.//-->
	<hr>

			<div class="row card bg-light card-body mx-auto" style="max-width: 1250px;" align="center">
			<div class="col-sm-12">
			    <h2 style="margin-top: 30px; color: #103045;font-size: 25px;">BAHRIA COMPLAINT CENTER- BCC </h2>
			    <h2 style="margin-bottom: 20px; color: #103045;font-size: 20px;">Your Lifestyle Destination</h2>

			    <form action = "NewComplaint.php" method="get">
			    <input type="hidden" name="username" value="<?php echo $_POST['username']; ?>">
			    <button type="submit" class="btn btn-lg" style="width: 250px;background-color:#E0C34B;">New Complaint</button>
			    </form>

			    <br><br>

			    <form action = "PreviousComplaints.php" method="get">
			    <input type="hidden" name="username" value="<?php echo $_POST['username']; ?>">
				<button type="submit" class="btn btn-lg"style="width: 250px;background-color: #E0C34B;">Previous Complaints</button>
			    </form>

				<br><br>

				<form action = "Feedback.php" method="get">
				<input type="hidden" name="username" value="<?php echo $_POST['username']; ?>">
				<button type="submit" class="btn btn-lg"style="width: 250px; background-color: #E0C34B;">Feedback</button>
			    </form>

				<br><br>
				<a href="logout.php"><button type="button" class="btn btn-lg"style="width: 250px;color:white; background-color:#103045;">LOGOUT</button></a>
                
				<br><br><br>
			

			</div>
		</div>
</div>


<br><br>
<article class="mb-3" style="background-color: #103045;">  
<div class="card-body text-center">
    <h3 class="text-white mt-3">Bahria Town (Pvt) Ltd.</h3><br><br>
	<p class="h5 text-white"><img src="bahria-town-logo.png"></p>   
	<br>
	<p><a class="btn btn-warning" target="_blank" href="http://www.bahriatown.com/"> Visit our website  
	 <i class="fa fa-location-arrow "></i></a></p>
</div>
<br><br>
</article>
<p style="text-align: right; font-size: 15px;"><b>Crafted at <a href="">MarFat San®</a></b></p>
</body>
</html>
