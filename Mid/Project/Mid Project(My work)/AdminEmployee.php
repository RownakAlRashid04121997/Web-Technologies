<?php 
    session_start();
 ?>

<html>
	
	<head>
		<title>Admin Employee page </title>
	</head>
	
	<body>
	 <h1>Employee page</h1>
	 
	<div style="display:inline-block;">
    <?php include 'header.php' ?>
    </div>
	 
	 <?php 
	 echo  $_SESSION['Email'];
	 ?>
	 <br>
	 <br>
	
	<a href="AdminProfile.php"> Back </a>
	
    <div>
    <?php include 'footer.php' ?>
     </div>
	
  
	
	
	</body>

</html>