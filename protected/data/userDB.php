<?php
ini_set('display_errors', 1);

try
{
	$db = new PDO("sqlite:userDB.db");
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e)
{
	echo $e->getMessage();
}

$db->exec(utf8_encode('PRAGMA encoding = "UTF-8";'));
 
$db->exec(utf8_encode('CREATE TABLE IF NOT EXISTS users(id INTEGER PRIMARY KEY, username VARCHAR(50) NOT NULL UNIQUE, password VARCHAR(50) NOT NULL)'));

$db->exec(utf8_encode('INSERT INTO users (username, password) VALUES ("user", "user");'));

?>