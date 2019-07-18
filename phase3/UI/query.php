<?php
	$db = mysqli_connect('localhost', 'root', '', 'railway') or die('Error connecting to MySQL server.');
?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
	<title>Query result</title>
</head>
<body>
	<?php
		if(isset($_POST["submit"]))
		{
			$query = $_POST["query"];
			//$query = "SELECT * FROM Donor;";
			$result = mysqli_query($db, $query) or die('Error querying database beacuse ' . mysqli_error($db));
			
			if(mysqli_num_rows($result) > 0)
			{
				$col_name = array();
				$i = 0;
				$colDets = mysqli_fetch_assoc($result);
				echo "<div class = 'container'><table class = 'table table-bordered'><tr>";
				foreach ($colDets as $key => $value) 
				{
					echo "<th>" . $key . "</th>";
					$col_name[$i++] = $key;
				}
				echo "</tr><tr>";
				foreach ($colDets as $key => $value) 
				{
					echo "<td>" . $value . "</td>";
				}
				echo "</tr>";
				//print_r($row);
    			while ($row = mysqli_fetch_assoc($result)) 
    			{
    				echo "<tr>";
					for($j = 0; $j < $i; $j++)
						echo "<td>" . $row[$col_name[$j]] . "</td>";
					echo "</tr>";
    			}
    			echo "</table>";
			}
			else
   				echo "0 results";
   			echo "<a href = 'query.html' class = 'btn-link btn' style = ''>Go back</a></div>";
		}
	?>
</body>
</html>