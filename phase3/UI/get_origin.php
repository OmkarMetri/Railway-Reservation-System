<?php 
require_once('Database.php');
$db = new Database();
$sql = "SELECT Source_station
		FROM train;
";

$Source_station = $db->getRows($sql);

$db->Disconnect();

