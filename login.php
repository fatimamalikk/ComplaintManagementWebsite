<?php 
include_once('connection.php');
include_once('functions.php');
if (isset($_GET['login_required'])) $error[] = "You must be logged in to access this page.";
if (isset($_POST['login_submit'])) : // If form is submitted
$username = mres($_POST['username']);
$password = mres($_POST['password']);
// Check if all fields are emptyy.
if ($username == '' || $password == '') $error[] = "All fields are required.";
if (empty($error)){
  
  $hashed_password = sha1($password);
  
  $new_hashed_password=substr($hashed_password, 0, 20);
  // Check if submitted info is correct or not.
  $check = mysqli_query($conDB,"SELECT * FROM `users` WHERE `username` = '".$username."' AND `password` = '".$new_hashed_password."'");
  if (mysqli_num_rows($check) == 1) {
  
  // User found, now set session and proceed to my-account page.
  $_SESSION['loggedin_user'] = $username;
  redirect('your_account.php');
  
  } else {
    $error[] = "Incorrect username or password.";
  }
  
}
endif;
?>
<!DOCTYPE html>
<html>
<head>
  <title>Login- BCC</title>
  <link rel="icon" type="image/png" href="logo.png">

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">

    <link rel="stylesheet" href="style.css">
</head>
<body>

  <?php
// Will display this message if returning from signup page.
if (isset($_GET['signup'])) echo '<div class="message">Thank you for signing up.</div>'; 
?>
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

  </div>
  </nav> <!--navigation bar end.//-->
  <hr>

    <div class="row card bg-light card-body mx-auto" style="max-width: 1250px;" align="center">
      <div class="col-sm-12">
          <h2 style="margin-top: 30px; color: #103045;">BAHRIA COMPLAINT CENTER- BCC</h2>
          <h2 style="margin-bottom: 20px; color: #103045;">Your Lifestyle Destination</h2>

          <br>
          <b><p>Sign in to launch your complain with Bahria Town</p></b> 
          <br>  

          <?php display_error(); ?> 

          <form action="your_account.php" method="post">

            <p>Email Address</p>
            <div class="form-group input-group" style="width: 340px;">
              <div class="input-group-prepend">
                <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
             </div>
                <input name="username" class="form-control" placeholder="Enter email address" type="text" value="<?php echo (isset($username))? $username : ''; ?>" required><br> 
            </div> <!-- form-group// -->

            <p>Password</p>
            <div class="form-group input-group"  style="width: 340px;">
              <div class="input-group-prepend">
                <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
            </div>
                <input name="password" class="form-control" placeholder="Enter password" type="password" required><br>
            </div> <!-- form-group// -->

          <div class="form-check">
              <input type="checkbox" class="form-check-input" id="exampleCheck1">
              <label class="form-check-label" for="exampleCheck1">Remember Me</label>
          </div>

          
          <button type="submit" name="login_submit" value="login" style="margin-top: 10px; margin-bottom: 20px;" class="btn btn-primary">Login</button> 

          <br/>
          <p class="text-center">New to BCC? <a href="signup.php">Sign up</a> </p>
        </form> <!--form end.//-->
        </div>
    </div><!--row end.//-->
  </div><!--container end.//-->

<br><br>
    <!------------------------------------------------------------------------------------------------------------------------- -->

  <article class="mb-3" style="background-color: #103045;">  
<div class="card-body text-center">
    <h3 class="text-white mt-3">Bahria Town (Pvt) Ltd.</h3><br><br>
  <p class="h5 text-white"><img src="bahria-town-logo.png"></p>   
  <br>
  <p><a class="btn btn-warning" target="_blank" href="http://www.bahriatown.com/"> Visit our website  
   <i class="fa fa-location-arrow "></i></a></p>
</div>
<br><br>
</article><!--article end.//-->
<p style="text-align: right; font-size: 15px;"><b>Crafted at <a href="">MarFat San®</a></b></p>
</body>
</html>