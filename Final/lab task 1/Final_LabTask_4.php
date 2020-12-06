<html>
	
	<head>
		<title>Final lab 1</title>
	</head>
	
	<body>
	 <h1>DB connect</h1>
	 
	 <?php  
	    $conn= new mysqli("localhost","user1","12345");
		
		if($conn->connect_error)
		{
			die("Connection failure");
		}
		else
	    {
			echo "Connection Success";
			
			$createTableSql="CREATE TABLE userTable(
			                 id INT(10) PRIMARY KEY,
							 name VARCHAR(2) NOT NULL,
							 balance INT(30) NOT NULL,
							 deposit INT(20),
							 withdraw INT(20)
							 )";
							 
			
			if($conn -> query($createTableSql)){
				echo "Table created Successfully";
			}
			else{
				echo "Table created Unsuccessfully";
				echo "<br />";
				echo $conn->error;
				
			}
			$conn-> close();
		}
	 ?>
	 <br>
	 <br>
	
	
	</body>

</html>