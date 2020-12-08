<!DOCTYPE html>
<html>
<head>
	<title> Lab task 3(Final) </title>
</head>
<body>

    <h2> Insert,Update,Delete </h2>

	<?php
	
	$servername = "localhost";
    $user = "abc";
    $pass = "789";
    $dbname = "testdb";

    $conn = new mysqli($servername, $user,$pass, $dbname);

    if($conn -> connect_error) {
	    die("Error in db connection: " . $conn -> connect_error);
    }
    else {
	    echo "<h3>Db connection successful.</h3>";
	
			
	echo "<br>";
    }
	
	
	
	
	  $id = $email =$DOB= $UserName= $password ="";	
       $idError=$UserNameError = $emailError = $passwordError=$DOBError= "";
       $signup_status = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $counter = 0;
	   if (isset($_POST["id"]) & !empty($_POST["id"])) {
        $id = test_input($_POST["id"]);
        }
      else {
        $idError = "Invalid Name";
        $counter = $counter + 1;
        }
      if (isset($_POST["UserName"]) & !empty($_POST["UserName"])) {
        $UserName = test_input($_POST["UserName"]);
        }
      else {
        $UserNameError = "Invalid UserName";
        $counter = $counter + 1;
        }

      if (isset($_POST["email"]) & !empty($_POST["email"])) {
        $email = test_input($_POST["email"]);
        }
      else {
        $emailError = "Invalid Email";
        $counter = $counter + 1;
        }
		
		if (isset($_POST["DOB"]) & !empty($_POST["DOB"])) {
        $DOB = test_input($_POST["DOB"]);
        }
      else {
        $DOBError= "Invalid DOB";
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
    $signup_status = "Sign Up Successful";
	
  }
  else {
    $signup_status = "Sign Up Failed";
    $counter = 0;
  }
}
else {
	$signup_status = "Sign Up Failed";
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}





        
	?>
	
	
	
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
	
	Id <br/>
    <input type="text" name="id" required>
	<br /><br />
    <span><?php echo $idError; ?></span><br />
	
	 UserName <br/>
    <input type="text" name="UserName" required>
	<br /><br />
    <span><?php echo $UserNameError; ?></span><br />
	
	 Date <br/>
    <input type="text" name="DOB" required>
	<br /><br />
    <span><?php echo $DOBError; ?></span><br />
	
    
        
     Email <br/>
    <input type="text" name="email" required>
	<br /><br />
    <span><?php echo $emailError; ?></span><br />
    
    Password  <br/>
    <input type="text" name="password" required style=" width:333px">
	<span><?php echo $passwordError; ?></span><br />
	<br /> 


	<br /><br />
	<input type="submit" value="Insert" style="color:green; font-weigt:bold">
	<?php
	
	$stmt = $conn -> prepare("INSERT INTO  labtask3(id,username,email,password,dob) VALUES (? ,?)");
$stmt -> bind_param("issss",$id, $UserName, $email, $password, $DOB);

//$id = id;
//$fullName = "ghi";
$stmt -> execute();

//$id = 7;
//$fullName = "mno";
//$stmt -> execute();

echo "<h4>Records Inserted Successfully</h4>";
//$stmt -> close();

$sql = "SELECT id, username FROM labtask3"; // Query
$result = $conn -> query($sql); // result set

if($result->num_rows > 0) {
	// show result
	echo "<p>Result is more than zero</p>";
	echo "<br>";

	echo "<ol>";
	while($row = $result -> fetch_assoc()) {
		echo "<li>id: " . $row['id'] . " " . "username: " . $row['username'] .   " " . "email: " . $row['email'] . "</li>";
	}
	echo "</ol>";

}
else {
	echo "<p>Result is zero</p>";
}

$conn -> close();
	?>
	
	
		<input type="submit" value="Update" style="color:green; font-weigt:bold">
	<?php
	
	$stmt = $conn -> prepare("UPDATE labtask3 SET username = ? WHERE id = ?");
$stmt -> bind_param("si", $UserName, $id);

//$id = 6;
//$fullName = "round";
$stmt -> execute();

echo "<h4>Records Updated Successfully</h4>";
$stmt -> close();

$sql = "SELECT id, Fullname FROM labtask3"; // Query
$result = $conn -> query($sql); // result set

if($result->num_rows > 0) {
	// show result
	echo "<p>Result is more than zero</p>";
	echo "<br>";

	echo "<ol>";
	while($row = $result -> fetch_assoc()) {
		echo "<li>id: " . $row['id'] . " " . "username: " . $row['username'] .   " " . "email: " . $row['email'] . "</li>";
	}
	echo "</ol>";

}
else {
	echo "<p>Result is zero</p>";
}

$conn -> close();


	?>
	
	
	<input type="submit" value="Delete" style="color:green; font-weigt:bold">
	<?php
	$stmt = $conn -> prepare("DELETE * from labtask3 WHERE id = ?");
$stmt -> bind_param("i", $id);

$id = 3;
$stmt -> execute();

echo "<h4>Records Deleted Successfully</h4>";
$stmt -> close();

$sql = "SELECT id, Fullname FROM Users"; // Query
$result = $conn -> query($sql); // result set

if($result->num_rows > 0) {
	// show result
	echo "<p>Result is more than zero</p>";
	echo "<br>";

	echo "<ol>";
	while($row = $result -> fetch_assoc()) {
		echo "<li>id: " . $row['id'] . " " . "username: " . $row['username'] .   " " . "email: " . $row['email'] . "</li>";
	}
	echo "</ol>";

}
else {
	echo "<p>Result is zero</p>";
}


$conn -> close();


	?>

	</form>
	
	
</body>
</html>





