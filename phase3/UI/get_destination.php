<?php 
require_once('Database.php');
$db = new Database();
$sql = "SELECT Destination_station
		FROM Train;
";

$Destination_station = $db->getRows($sql);

$db->Disconnect();

