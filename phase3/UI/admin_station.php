<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>

	<title> STATION</title>
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
 	background-image: url(claudio-schwarz-purzlbaum-687132-unsplash.jpg);background-size: cover;
 
 }
 fieldset{
 	padding: 20px;
 	background: rgba(0,0,00,0);
 	color: white;
</style>
<body>
	<br><br>
	<br><br>
	<br><br>
	<br><br>
	<center>
	<fieldset style="height: 350px;width: 40%;margin-top: 30px">
		<p style="font-size: 30px ">Edit Station </p>
		<form action="" method="POST">
	<table>
		<tr>
			<td>
				Station_Id:
			</td>
			<td>
				<input type="text" placeholder="Station_Id" name="Station_Id" required>
			</td>
		</tr>
		<tr>
			<td>
				Station_Name:
			</td>
			<td>
				<input type="text" placeholder="Station_Name" name="Station_Name" required>
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
	{$station_Id=$_POST['Station_Id'];
	$station_Name=$_POST['Station_Name'];
	
		$sql = "SELECT * FROM station WHERE Station_id = '$station_Id'";
		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) == 0) 
		{
		    $insertsql = "INSERT INTO station VALUES ('$station_Id','$station_Name')";
		    if (mysqli_query($conn, $insertsql)) 
			    echo '<script>alert("inserted Succussfully");</script>';
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