<?php
session_start();
//create connection
$conn = mysqli_connect('localhost', 'root', '', 'ripni');
//check connection
if (!$conn) {
	die ("Connection failed: mysqli_connect_error()");
}
if (!empty($_POST)) {
 if(isset($_POST['LoginButton'])){
    $user_name=$_POST['user_name'];
    $user_pass=$_POST['user_pass'];
    $query="SELECT * FROM `users` WHERE `user_name`= '$user_name' AND `user_pass`= '$user_pass'";
    $result=mysqli_query($conn,$query);
    if(mysqli_num_rows($result)==1){
      $row=mysqli_fetch_assoc($result);
      $_SESSION['user_name']=$user_name;
      $_SESSION['user_checkpoint'] = $row['user_checkpoint'];
      //echo $row['user_checkpoint'];
      header('Location: menu.php');
    }else{
      $status= "Incorrect login credentials.";
      $_SESSION['status']=$status;
    }
  }
}
  mysqli_close($conn);
?>

<head>
<meta charset="UTF-8">
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.5/crulean/bootstrap.min.css" rel="stylesheet">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="css/logreg.css"><script src="js/skel.min.js"></script>
<script src="js/logreg.js"></script>
</head>
<body>




<div class="container">
    	<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<div class="panel panel-login">
					<div class="panel-heading">
						<div class="row">
							<div class="col-xs-6">
								<a href="#" class="active" id="login-form-link">Login</a>
							</div>
							<div class="col-xs-6">
								<a href="google.com" id="register-form-link">Register</a>
							</div>
						</div>
						<hr>
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-lg-12">
								<form id="login-form" action="logreg.php" method="post" role="form" style="display: block;">
									<div class="form-group">
										<input type="text" name="user_name" id="username" tabindex="1" class="form-control" placeholder="User name" value="">
									</div>
									<div class="form-group">
										<input type="password" name="user_pass" id="password" tabindex="2" class="form-control" placeholder="Password">
									</div>
									 <?php
                    if(isset($status)){
                      echo "<p style='color:red'> $status</p>";
                    }
                  ?>
									<div class="form-group text-center">
										<input type="checkbox" tabindex="3" class="" name="remember" id="remember">
										<label for="remember"> Remember Me</label>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
												<input type="submit" name="LoginButton" id="login-submit" tabindex="4" class="form-control btn btn-login" value="Log In">
											</div>
										</div>
									</div>

								</form>
<?php
$con=mysqli_connect('localhost','root','','ripni');
if ($con) {
}else{
  die("Connection failed:".mysqli_connect_error());
}
$flag=0;
$name=$pass=$email=$username=$email2=$pass=$BAD="";
$nameError=$passError=$usernameError=$emailError=$emailError2=$passError2="";

if (isset($_POST['Register-submit'])) {
    //if ($_POST['name']=="") {
     // $nameError="Fill name";
    //}else {
     // $name=test_input($_POST['name']);
      //if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
      // $nameError="Only letters and white space allowed";
      //}
   // }

    if ($_POST['username']=="") {
      $usernameError="Fill username";
    }else {
      $username=test_input($_POST['username']);
      // if (!preg_match("/^(?=.{8,20}$)(?![_.])(?!.*[_.]{2})[a-zA-Z0-9._]+(?<![_.])$/",$username)) {
      //  $usernameError="Only letters and numbers white space allowed";
      // }
    }
    if ($_POST['password']=="") {
      $passError="Fill password";
    }else{
      $pass=test_input($_POST['password']);
      if (!preg_match("/[0-9]/",$pass)) {
        $passError="Only numbers allowed";
      }
    }
    if ($_POST['cpass']=="") {
      $passError2="Fill password";
    }else{
      $pass2=test_input($_POST['cpass']);
      if ($pass!=$pass2) {
        $passError2="Invalid password";
      }
    }

    if($nameError=="" && $emailError=="" && $usernameError=="" && $passError=="" ){
      $queryy="SELECT * FROM users";
    $resultt=mysqli_query($con,$queryy);
    if(mysqli_num_rows($resultt)>0){
      while($row=mysqli_fetch_assoc($resultt)){
        if ($row['user_name']==$username) {
         $flag=1;
         break;
        }
      }
    }
    echo $flag;
    $user=$_POST['username'];
    $passs=$_POST['password'];
    $cpass=$_POST['cpass'];
    $image='http://www.riskid.nl/assets/testimonials/user-3995d1ed5f9b6ea6ef9c7bc9ead47415.jpg';

    if ($flag==1) {
      $BAD="SORRY...THERE IS ALREADY REGISTERED USER WITH THAT E-MAIL...";
    }else{
      $queryy2="INSERT INTO `users`(`user_name`, `user_pass`, `user_checkpoint`)
      VALUES('$user','$passs', '1')";
      $resultt2=mysqli_query($con,$queryy2);
      if ($resultt2) {
        $_SESSION['user_name']=$user_name;
        $_SESSION['user_checkpoint'] = 1;
        // $_SESSION['email']=$email;
        header('Location: menu.php');
      }else{
        echo "Failed:".$queryy2."<br/>".mysqli_error($con);
      }
    }
    }

}
function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}
?>




<?php echo "<label class='label-danger'> $usernameError   </label>";  ?>
<?php echo "<label class='label-danger'> $emailError   </label>";  ?>
<?php echo "<label class='label-danger'> $passError   </label>";  ?>
								<form id="register-form" action="logreg.php" method="post" role="form" style="display: none;">
									<div class="form-group">
										<input type="text" name="username" id="username" tabindex="1" class="form-control" placeholder="User name" value="">

									</div>
									<div class="form-group">
										<input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Password">

									</div>
									<div class="form-group">
										<input type="password" name="cpass" id="confirm-password" tabindex="2" class="form-control" placeholder="Confirm Password">

									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
												<input type="submit" name="Register-submit" id="register-submit" tabindex="4" class="form-control btn btn-register" value="Register Now">
											</div>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>

</html>
