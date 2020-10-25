<!DOCTYPE html>
<html>
<head>
	<title>Lab task 2</title>
</head>
<body>


<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
	Student Id <br/> 
    <input type="text" name="student_id" required>
	<br /><br />
        
	Student Name <br/>
    <input type="text" name="student_name" required>
	<br /><br />

	Gender <br/>
    <input type="radio" name="Gender" value="Male" required>Male
    <br/>
	<input type="radio" name="Gender" value="Female" required>Female
    <br /><br />
    
        
    Student Email <br/>
    <input type="text" name="Email" value="@"  required>
	<br /><br />
    
    Address  <br/>
    <input type="text" name="Address" required style=" width:300px">
	<br />     
    Street Address<br/>
    <input type="text" name="Street_address"  style=" width:300px">
	<br />
    Address line 2  <br/>  
    <input type="text" name="line1">
    <input type="text" name="line2">
    <br /><br />
	City <br/>
	<input type="text" name="City" required>
	<br />
	
	State/Province/Region<br/>
    <input type="text" name="Region"  required>
	<br/>
    <select name="Country" style=" width:160px">
    <option value="Asia">Asia</option>
    <option value="Europe">Europe</option>
    <option value="Africa">Africa</option>
    <option value="North Amreica">North America</option>
    </select>
    <br/>
    <span style="margin-right:70px">Zip/Postal Code</span>
	 <span>Country</span>
	
	<br /><br />
	<input type="submit" value="Save Form" style="color:green; font-weigt:bold">
	</form>
	<br />
    
	<?php
	
	  	$student_id_Error = "";
	  	if($_SERVER["REQUEST_METHOD"] == "POST") {
			if(empty($_REQUEST["student_id"])) {
				  $student_id_Error = "ID is required";
			}
			else {
				echo "Id is: " . $_REQUEST["student_id"];
				
			}
		}
        echo "<br>";
        $student_name_Error = "";
	  	if($_SERVER["REQUEST_METHOD"] == "POST") {
			if(empty($_REQUEST["student_name"])) {
				  $student_name_Error = "Name is required";
			}
			else {
				echo "Name is: " . $_REQUEST["student_name"];
			}
		}
        echo "<br>";
        $gender_Error = "";
	  	if($_SERVER["REQUEST_METHOD"] == "POST") {
			if(empty($_REQUEST["Gender"])) {
				  $gender_Error = "Gender is required";
			}
			else {
				echo "Gender is: " . $_REQUEST["Gender"];
			}
		}
        
        echo "<br>";
        $email_Error = "";
	  	if($_SERVER["REQUEST_METHOD"] == "POST") {
			if(empty($_REQUEST["Email"])) {
				  $email_Error = "Email is required";
			}
			else {
				echo "Email is: " . $_REQUEST["Email"];
			}
		}
        
        echo "<br>";
        $address_Error = "";
	  	if($_SERVER["REQUEST_METHOD"] == "POST") {
			if(empty($_REQUEST["Address"])) {
				  $address_Error = "Address is required";
			}
			else {
				echo "Address is: " . $_REQUEST["Address"];
			}
		}
    
        echo "<br>";
        $city_Error = "";
	  	if($_SERVER["REQUEST_METHOD"] == "POST") {
			if(empty($_REQUEST["City"])) {
				  $city_Error = "City is required";
			}
			else {
				echo "City is: " . $_REQUEST["City"];
			}
		}
    
        echo "<br>";
        $country_Error = "";
	  	if($_SERVER["REQUEST_METHOD"] == "POST") {
			if(empty($_REQUEST["Country"])) {
				  $country_Error = "Country is required";
			}
			else {
				echo "Country is: " . $_REQUEST["Country"];
			}
		}
        
	?>
	
	<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
	
	<span><?php echo $student_id_Error; ?></span><br />
        
    <span><?php echo $student_name_Error; ?></span><br />

    <span><?php echo $gender_Error; ?></span><br />
	
    <span><?php echo $email_Error; ?></span><br />
   
    <span><?php echo $address_Error; ?></span><br />
	
    <span><?php echo $city_Error; ?></span>
	
   
        
    <span><?php echo $country_Error; ?></span>
	
	</form>
	
</body>
</html>