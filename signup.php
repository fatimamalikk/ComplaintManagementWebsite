<?php 
include_once('connection.php');
include_once('functions.php');
 
if (isset($_POST['signup_submit'])) : // If form is submitted
$fullname=mres($_POST['fullname']) ;
$username = mres($_POST['username']);
$password = mres($_POST['password']);
$confirm_password = mres($_POST['confirm_password']);
$number=mres($_POST['number']);
$house_num=mres($_POST['house_num']);
$street_num=mres($_POST['street_num']);
$sector_num=mres($_POST['sector_num']);
 $city=mres($_POST['city']);
 $phase_num=mres($_POST['phase_num']);
$hashed_password = sha1($password);
 
// Check if all fields are empty.
if ($username == '' || $password == '' || $confirm_password == '') $error[] = "All fields are required.";
 
 // Check if that username is already exists.
$find_user = mysqli_query($conDB,"SELECT * FROM `users` WHERE `username` = '".$username."'");
if (mysqli_num_rows($find_user) != 0) $error[] = "That username already exists.";
// Check if confirm password did not match.
if (empty($error) && $confirm_password != $password) $error[] = "Confirm Password did not match.";
 
// If no errors then go ahead.
if (empty($error)){
$result = mysqli_query($conDB," INSERT INTO `users` (
		`username`,
		`password`,`fullname`,`city`,`number`,`house_num`,`street_num`,`sector_num`,`phase_num`
		) VALUES (
		'".$username."',
		'".$hashed_password."',
		'".$fullname."',
		'".$city."',
		'".$number."',
		'".$house_num."',
		'".$street_num."',
		'".$sector_num."',
		'".$phase_num."'
		
		)");
	
 
	
	 if(confirm_query($result)) {
		redirect('login.php?signup=1');
	}
}
 
endif;
?>
<!DOCTYPE html>
<html>
<head>
	<title>Sign up-BCC</title>
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
<div class="container">
<br>
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

	</div>
	</nav> <!--navigation bar end.//-->
<hr>
<div class="card bg-light">
<article class="card-body mx-auto" style=" max-width: 400px;">
	<h4 class="card-title mt-3 text-center">Create Account</h4>
	<p class="text-center">Get started with your free account</p>
	<?php display_error(); ?>
	<!------------------------------------------------------------------------------------------------------------------------- -->

	<form action="signup.php" method="post">
	<div class="form-group input-group">
		<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-user"></i> </span>
		 </div>

        <input name="fullname" class="form-control" placeholder="Full name" type="text">
    </div> <!-- form-group// -->

    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
		 </div>
        <input name="username" class="form-control" placeholder="Email address" type="email" value="<?php echo (isset($username))? $username : ''; ?>">
    </div> <!-- form-group// -->

    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-phone"></i> </span>
		</div>
	
    	<input name="number" class="form-control" placeholder="Phone number" type="text">
    </div> <!-- form-group// -->





    <div class="form-group input-group">
		<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-home"></i> </span>
		 </div>

        <input name="house_num" class="form-control" placeholder="House Number" type="text">
    </div> <!-- form-group// -->

    <div class="form-group input-group">
		<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-street-view"></i> </span>
		 </div>

        <input name="street_num" class="form-control" placeholder="Street Number" type="text">
    </div> <!-- form-group// -->

    <div class="form-group input-group">
		<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-building"></i> </span>
		 </div>

        <input name="sector_num" class="form-control" placeholder="Sector" type="text">
    </div> <!-- form-group// -->

   

    <div class="form-group input-group">
		<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-building"></i> </span>
		 </div>

        <input name="phase_num" class="form-control" placeholder="Phase Number" type="text">
    </div> <!-- form-group// -->

    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-road"></i> </span>
		</div>
		<select name="city" class="form-control">
			<option selected=""> Select a City</option>
			<option>Rawalpindi</option>
			<option>lahore</option>
			<option>Karachi</option>
		</select>

    	
	</div> <!-- form-group end.// -->



    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
		</div>
        <input name="password" class="form-control" placeholder="Create password" type="password">
    </div> <!-- form-group// -->

    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
		</div>
        <input name="confirm_password" class="form-control" placeholder="Repeat password" type="password">
    </div> <!-- form-group// -->

    <center><div class="form-group">
        <button name="signup_submit" type="submit" class="btn btn-primary btn-block" style="background-color: #103045;">Create Account</button>
    </div> <!-- form-group// --></center>

    <p class="text-center">Have an account? <a href="login.php">Log In</a> </p>                                                                 
</form>
</article>
</div> <!-- card.// -->

</div> 
	<!------------------------------------------------------------------------------------------------------------------------- -->





































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