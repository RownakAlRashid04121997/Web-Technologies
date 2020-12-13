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
       $add_status = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $counter = 0;
	   if (isset($_POST["id"]) & !empty($_POST["id"])) {
        $id = test_input($_POST["id"]);
        }
      else {
        $idError = "Invalid id";
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
    $add_status = "added";
	
  }
  else {
    $add_status = "add Failed";
    $counter = 0;
  }
}
else {
	$add_status = "add Failed";
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

 
    //Insert Part
	
	$stmt = $conn -> prepare("INSERT INTO  labtask3(id,username,email,password,dob) VALUES (? ,?)");
$stmt -> bind_param("issss",$id, $UserName, $email, $password, $DOB);

$stmt -> execute();

echo "<h4>Records Inserted Successfully</h4>";
//$stmt -> close();

$sql = "SELECT id, username FROM labtask3"; 
$result = $conn -> query($sql); 

if($result->num_rows > 0) {
	
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

//$conn -> close();




	//Update part
	$stmt = $conn -> prepare("UPDATE labtask3 SET username = ? WHERE id = ?");
$stmt -> bind_param("si", $UserName, $id);


$stmt -> execute();

echo "<h4>Records Updated Successfully</h4>";
$stmt -> close();

$sql = "SELECT id, Fullname FROM labtask3"; 
$result = $conn -> query($sql); 

if($result->num_rows > 0) {
	
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

//$conn -> close();


     //Delete part
	$stmt = $conn -> prepare("DELETE from labtask3 WHERE id = ?");
$stmt -> bind_param("i", $id);

$id = 3;
$stmt -> execute();

echo "<h4>Records Deleted Successfully</h4>";
$stmt -> close();

$sql = "SELECT id, Fullname FROM Users"; 
$result = $conn -> query($sql); 

if($result->num_rows > 0) {
	
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