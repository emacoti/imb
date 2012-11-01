<?php
ini_set('display_errors', 1);

try
{
	$db = new PDO("sqlite:inmoDB.db");
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e)
{
	echo $e->getMessage();
}

$db->exec(utf8_encode('PRAGMA encoding = "UTF-8";'));
 
$db->exec(utf8_encode('CREATE TABLE IF NOT EXISTS houses(id INTEGER PRIMARY KEY, name VARCHAR(50) NOT NULL UNIQUE)'));
 
$db->exec(utf8_encode('CREATE TABLE IF NOT EXISTS users(id INTEGER PRIMARY KEY, username VARCHAR(50) NOT NULL UNIQUE, password VARCHAR(50) NOT NULL, salt VARCHAR(128) NOT NULL)'));

?>