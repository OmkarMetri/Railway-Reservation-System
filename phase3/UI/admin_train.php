<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>

	<title> TRAIN</title>
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
 	padding: 50px;
 	background: rgba(100,100,100,0.5);
 	color: white;
</style>
<body>
	<br><br>
	<br><br>
	<br><br>
	<br><br>
	<center>
	<fieldset style="height: 650px;width: 40%;margin-top:30px">
		<p style="font-size: 30px ">Edit Train </p>
		<form action="" method="POST">
	<table>
		<tr>
			<td>
				Train_Id:
			</td>
			<td>
				<input type="text" placeholder="Train_Id" name="Train_Id" required>
			</td>
		</tr>
		<tr>
			<td>
				Train_Name:
			</td>
			<td>
				<input type="text" placeholder="Train_Name" name="Train_Name" required>
			</td>
		</tr>
			<tr>
			<td>
				Train_type:
			</td>
			<td>
				<input type="text" placeholder="Train_type" name="Train_type" required>
				
			</td>
		</tr>
			<tr>
			<td>
				Source_station:
			</td>
			<td>
				<input type="text" placeholder="Source_station" name="Source_station" required>
			</td>
		</tr>
			<tr>
			<td>
				Destination_station:
			</td>
			<td>
				<input type="text" placeholder="Destination_station" name="Destination_station" required>
			</td>
		</tr>
			<tr>
			<td>
				Source_Id:
			</td>
			<td>
				<input type="text" placeholder="Source_Id" name="Source_Id" required>
			</td>
		</tr>
		<tr>
			<td>
				Destination_Id:
			</td>
			<td>
				<input type="text" placeholder="Destination_Id" name="Destination_Id" required>
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
	{$train_Id=$_POST['Train_Id'];
	$Train_Name=$_POST['Train_Name'];
	$Train_type=$_POST['Train_type'];
	$Source_station=$_POST['Source_station'];
	$Destination_station=$_POST['Destination_station'];
	$source_Id=$_POST['Source_Id'];
	$Destination_Id=$_POST['Destination_Id'];
	
		$sql = "SELECT * FROM train WHERE Train_id = '$train_Id'";
		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) == 0) 
		{
		    $insertsql = "INSERT INTO train VALUES ('$train_Id','$Train_Name','$Train_type','$Source_station
		    ','$Destination_station','$source_Id','$Destination_Id')";
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