<?php 
// enter your database host, name, username, and password
$db_host = 'localhost';
$db_name = 'XXXXXXXX';
$db_user = 'XXXXXXXX';
$db_pass = 'XXXXXXXX';

// connect with pdo 
try {
	$dbh = new PDO("mysql:host=$db_host;dbname=$db_name;", $db_user, $db_pass);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e) {
	die('pdo connection error: ' . $e->getMessage());
}