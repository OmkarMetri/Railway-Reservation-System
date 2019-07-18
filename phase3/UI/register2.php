<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title> Register</title>
</head>
<style>
 input[type=text],[type = password]{
    width: 100%;
    padding: 15px;
    margin: 5px 0 22px 0;
    display: inline-block;
    border: none;
    background: #ffffff;
}
input[type=text]:focus,[type=password]:focus{
    background-color: #ddd;
    outline: none;
}
 .button{
	background-color: brown;
	border: none;
	color: white;
	padding: 15px 32px;
	text-align: center;
	text-decoration: none;
	display: inline-block;
	font-size: 16px;
	margin: 4px 2px;
	border-radius: 4px ;
	box-sizing: border-box;
	cursor: pointer;

}
 .hello{
 	width: 100%;
 	padding: 12px 20px;
 	margin:8px 0;
 	display: inline-block;
 	border: 1px solid #ccc;
 	border-radius: 4px;
 	box-sizing: border-box;
}
body{
 	background-image: url(filip-mroz-531492-unsplash.jpg);background-size: cover;
 
 }
 fieldset{
 	padding: 20px;
 	background: rgba(50,0,0,0.5);
 	color: white;
</style>
<body>
	<br><br>
	<br><br>
	<br><br>
	<br><br>
	<center>
	<fieldset style="height: 800px;width: 40%;margin-top: 75px">
		<p style="font-size: 30px">Register </p>
		<form action="" method="POST">
	<table>
		<tr>
			<td>
				Name:
			</td>
			<td>
				<input type="text" placeholder="Name" name="username" required>
			</td>
		</tr>
		<tr>
			<td>
				Password:
			</td>
			<td>
				<input type="Password" placeholder="Password" name="password" required>
			</td>
		</tr>
		<tr>
			<td>
				Gender:
			</td>
			<td>
				<input type="radio" name="gender" value="M" required>Male
				<input type="radio" name="gender" value="F" required>Female
			</td>
		</tr>
		<tr>
			<td>
				Email:
			</td>
			<td>
				<input type="mail" placeholder="Email" name="email" required>
			</td>
		</tr>
		<tr>
			<td>
				Phone no:
			</td>
			<td>
				<select name="phonecode" required>
					<option selected hidden value="">Select Code</option>
					<option value="91">91</option>
					<option value="94">94</option>
					<option value="97">97</option>
					<option value="88">88</option>
					<option value="95">95</option>
					<option value="96">96</option>
					<option value="99">99</option>
				</select>
				<input type=" Phone" placeholder="91********" name="phone" required>
			</td>
		</tr>
		<tr>
			<td>
				Age:
			</td>
			<td>
				<input type="number" name="age" required>
			</td>
		</tr>
		<tr>
			<td>
				Date Of Birth:
			</td>
			<td>
				
                <input type="date" name="dob" required>	
                </select>
			</td>
		</tr>
		<tr>
			<td>
				City:
			</td>
			<td>
				<input type="text" placeholder="city" name="city" required>
			</td>
		</tr>
		<tr>
			<td>
				State:
			</td>
			<td>
				<input type="text" placeholder="state" name="state" required>
			</td>
		</tr>
		
		<tr>
			<td>
				Security Question:
			</td>
			<td>
				<input type="text" placeholder="Security Question" name="sq" required>
			</td>
		</tr>
		<tr>
			<td>
				Security Answer:
			</td>
			<td>
				<input type="text" placeholder="Security Answer" name="sa" required>
			</td>
		</tr>
		<tr>
			<td>
				<input type="submit" name="submit" class = "button" value="submit" style="padding: 20px 20px;display: inline-block;border-radius: 4px ;box-sizing: border-box;" ><br>
			</td>
			<td>
				<input type="button" name="back" onclick="history.back()" value="back" style="padding: 10px 20px ;display: inline-block;border-radius: 4px ;box-sizing: border-box ; align-self: center;"; ><br>
			</td>
		</tr> 
	</table>
</form>	

		

		
	</fieldset>
    </center>

</body>
</html>
<?php 


	$host = "localhost";
	$dbUsername="root";
	$dbPassword="";
	$dbname="railway";

	$conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
	if (mysqli_connect_error()) {
	     die('Connect Error('. mysqli_connect_errno().')'.mysqli_connect_error());
	} 

	if(isset($_POST['submit']))
	{$username=$_POST['username'];
	$password=$_POST['password'];
	$gender=$_POST['gender'];
	$email=$_POST['email'];
	$phonecode=$_POST['phonecode'];
	$phone=$_POST['phone'];
	$age=$_POST['age'];
	$dob=$_POST['dob'];
	$city=$_POST['city'];
	$state=$_POST['state'];
	$security_question=$_POST['sq'];
	$security_answer=$_POST['sa'];

		$sql = "SELECT * FROM users WHERE Email_Id = '$email'";
		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) == 0) 
		{
		    $insertsql = "INSERT INTO users VALUES ('$username','$password','$email','$dob','$gender','$age','$phone','$city','$state','$security_question','$security_answer')";
		    if (mysqli_query($conn, $insertsql)) 
			    echo '<script>alert("Succussfull");</script>';
			else
			    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		} 
		else 
		{
	    	echo '<script>alert("already");</script>';
		}

		mysqli_close($conn);

	}

	?> 