<?php 
    session_start();
 ?>

<html>
	
	<head>
		<title>Admin Profile page </title>
	</head>
	
	<body>
	 <h1>Profile page</h1>
	 
	<div style="display:inline-block;">
    <?php include 'header.php' ?>
    </div>
	
	 
	 <?php 
	 echo  $_SESSION['Email'];
	 ?>
	 <br>
	 <br>
	 <li class="Employee">
		<a href="AdminEmployee.php">Employee</a>
	</li>
	
	<li class="Sponsors">
		<a href="AdminSponsors.php">Sponsors</a>
	</li>
	
	<li class="Seller-Buyer info">
		<a href="AdminSB.php">Seller-Buyer info</a>
	</li>
	
	<li class="Job Vacancy">
		<a href="AdminJV.php">Job Vacancy</a>
	</li>
	
	<a href="AdminLogin.php"> Logout </a>
	
	
	<div>
    <?php include 'footer.php' ?>
  </div>
  
	
	
	</body>

</html>