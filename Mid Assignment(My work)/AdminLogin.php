<?php 
    session_start();
 ?>


<!DOCTYPE html>
<html>
<head>
	<title>  Admin Log in Form</title>
</head>
<body>
 <div style="display:inline-block;">
    <?php include 'header.php' ?>
  </div>
  
     <h2> Admin Log in </h2>

	<?php
	
	    
		$email1 = $_POST["email"];     //Imported form the previous form
		//echo $email1;
		
		$pass1 = $_POST["password"];   //Imported form the previous form
		 
		//echo $pass1;
		
		
		$myfile = fopen("../Web tech/SignInResult.txt", "a") or die("Unable to open file!");
        $txt = $email1;
        fwrite($myfile, $txt."\n");
        $txt = $pass1;
        fwrite($myfile, $txt."\n");
        fclose($myfile);
		
		
		 
		$email=$password=$Fp= $HP1="";  //fp=forget password??
		 
		 
		 $emailError = $passwordError = $genderError = $passwordError=$DOBError= "";
       $signup_status = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $counter = 0;
      if (isset($_POST["email"]) & !empty($_POST["email"])) {
        $email = test_input($_POST["email"]);
        }
      else {
        $emailError = "Invalid Email";
        $counter = $counter + 1;
        }

      if (isset($_POST["password"]) & !empty($_POST["password"])) {
        $password = test_input($_POST["password"]);
        }
      else {
        $passwordError = "Invalid Password";
        $counter = $counter + 1;
        }

  if($counter == 0) {
    $signup_status = "Logged In Successfully";
	
  }
  else {
    $signup_status = "Log in  Failed";
    $counter = 0;
  }
}
else {
	$signup_status = "Log In  Failed";
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

		
		
        
	?>
	
	<form action="AdminProfile.php" method="post">
     Email <br/>
    <input type="text" name="email" required>
	
	<br /><br />
    <span><?php echo $emailError; ?></span><br />
    
    Password  <br/>
    <input type="text" name="password" required style=" width:333px">
	<br />
    <span><?php echo $passwordError; ?></span><br />	
	
	<br /><br />
	<input type="submit" name="HP1" value="Log In" style="color:green; font-weigt:bold">
	
	</form>
	
	
	
	
	<form action="AdminFP.php" method="post">
	<input type="submit" name="Fp" value="forgot password??" style="color:green; font-weigt:bold">
	</form>
	
	 <?php 
	 $_SESSION['Email']=$email1;        //Session is created
	 echo  $_SESSION['Email'];
	 ?>
	
	<a href="AdminSignin.php"> Back </a>
	
	<div>
    <?php include 'footer.php' ?>
  </div>
	
	
</body>
</html>