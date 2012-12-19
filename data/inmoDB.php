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

/*** Tablas ***/
$db->exec(utf8_encode('CREATE TABLE IF NOT EXISTS categories(id INTEGER PRIMARY KEY, name VARCHAR(30) NOT NULL UNIQUE)'));
 
$db->exec(utf8_encode('CREATE TABLE IF NOT EXISTS conditions(id INTEGER PRIMARY KEY, name VARCHAR(25) NOT NULL UNIQUE)'));
 
$db->exec(utf8_encode('CREATE TABLE IF NOT EXISTS locations(id INTEGER PRIMARY KEY, name VARCHAR(30) NOT NULL UNIQUE)'));

$db->exec(
	utf8_encode(
		'CREATE TABLE IF NOT EXISTS currencies (
			id INTEGER PRIMARY KEY,
			name VARCHAR(30) NOT NULL UNIQUE,
			symbol VARCHAR(10) NOT NULL)'
		));
 
$db->exec(
	utf8_encode(
		'CREATE TABLE IF NOT EXISTS estates (
			id INTEGER PRIMARY KEY,
			category_id INTEGER UNSIGNED NOT NULL,
			condition_id INTEGER UNSIGNED NOT NULL,
			location_id INTEGER UNSIGNED NOT NULL,
			currency_id INTEGER UNSIGNED NOT NULL,
			destacado INTEGER UNSIGNED NOT NULL,
			value INTEGER,
			neighborhood VARCHAR(50) NOT NULL,
			imgdes VARCHAR(100),
			description TEXT,
			
			FOREIGN KEY(category_id) REFERENCES categories(id),
			FOREIGN KEY(condition_id) REFERENCES conditions(id),
			FOREIGN KEY(location_id) REFERENCES locations(id))'
		));
 
$db->exec(
	utf8_encode(
		'CREATE TABLE IF NOT EXISTS data (
			id INTEGER PRIMARY KEY,
			estate_id INTEGER UNSIGNED NOT NULL,
			name VARCHAR(50) NOT NULL,
			data_type VARCHAR(50) NOT NULL,
			value VARCHAR(50) NOT NULL,
			
			FOREIGN KEY(estate_id) REFERENCES estates(id))'
		));
		
$db->exec(
	utf8_encode(
		'CREATE TABLE IF NOT EXISTS images (
			id INTEGER PRIMARY KEY,
			estate_id INTEGER UNSIGNED NOT NULL,
			path_name VARCHAR(20) NOT NULL,
			description VARCHAR(250),
			
			FOREIGN KEY(estate_id) REFERENCES estates(id))'
		));
 
$db->exec(utf8_encode('CREATE TABLE IF NOT EXISTS users(id INTEGER PRIMARY KEY, username VARCHAR(50) NOT NULL UNIQUE, password VARCHAR(50) NOT NULL, salt VARCHAR(128) NOT NULL)'));

/*** Inserto categorias ***/
$db->exec(utf8_encode('INSERT INTO categories (name) VALUES ("Casas");'));
$db->exec(utf8_encode('INSERT INTO categories (name) VALUES ("Cocheras");'));
$db->exec(utf8_encode('INSERT INTO categories (name) VALUES ("Departamentos");'));
$db->exec(utf8_encode('INSERT INTO categories (name) VALUES ("Emprendimientos");'));
$db->exec(utf8_encode('INSERT INTO categories (name) VALUES ("D�plex");'));
$db->exec(utf8_encode('INSERT INTO categories (name) VALUES ("Ph");'));
$db->exec(utf8_encode('INSERT INTO categories (name) VALUES ("Fondo de comercio");'));
$db->exec(utf8_encode('INSERT INTO categories (name) VALUES ("Galpones");'));
$db->exec(utf8_encode('INSERT INTO categories (name) VALUES ("Locales");'));
$db->exec(utf8_encode('INSERT INTO categories (name) VALUES ("Oficinas");'));
$db->exec(utf8_encode('INSERT INTO categories (name) VALUES ("Campos");'));
$db->exec(utf8_encode('INSERT INTO categories (name) VALUES ("Terrenos");'));

/*** Inserto condiciones ***/
$db->exec(utf8_encode('INSERT INTO conditions (name) VALUES ("En venta");'));
$db->exec(utf8_encode('INSERT INTO conditions (name) VALUES ("En alquiler");'));

/*** Inserto localidades ***/
$db->exec(utf8_encode('INSERT INTO locations (name) VALUES ("Bah�a Blanca");'));
$db->exec(utf8_encode('INSERT INTO locations (name) VALUES ("Zona");'));
$db->exec(utf8_encode('INSERT INTO locations (name) VALUES ("Buenos Aires");'));
$db->exec(utf8_encode('INSERT INTO locations (name) VALUES ("Otras Provincias");'));

/*** Inserto monedas ***/
$db->exec(utf8_encode('INSERT INTO currencies (name, symbol) VALUES ("Peso", "$");'));
$db->exec(utf8_encode('INSERT INTO currencies (name, symbol) VALUES ("Dolar", "U$D");'));
$db->exec(utf8_encode('INSERT INTO currencies (name, symbol) VALUES ("Euro", "�");'));

/*** Inserto propiedades ***/
$description= "IBB - Villa Belgrano - Lucero al 2.600 - DAUB Inmobiliaria vende una casa en construccion de 1 dormitorio con cocina comedor, un ba�o y un quincho,
	todo en construccion hasta dinteles, tiene un tanque australiano chico en el patio. se ubica en Villa Belgrano a mts. de la ruta, implantado sobre lote de 240 m2.";
$db->exec(utf8_encode(
	'INSERT INTO
		estates (category_id, condition_id, location_id, currency_id, value, neighborhood, description, destacado, imgdes)
		VALUES (1, 1, 1, 1, 200000, "Villa Belgrano", "' . $description . '", 1, "1/1_m.jpg");'));

/*** Inserto atributos ***/
$db->exec(utf8_encode('INSERT INTO data (estate_id, name, data_type, value) VALUES (1, "Living-comedor", "VARCHAR", "3.00 x 5.00");'));

/*** Inserto imagenes ***/
$db->exec(utf8_encode('INSERT INTO images (estate_id, path_name) VALUES (1, "1/1_m.jpg");'));

/*** Inserto usuario admin ***/
$db->exec(utf8_encode('INSERT INTO users (username, password, salt) VALUES ("admin", "d4863fb315f0e9ea68bc848f4f53b351", "25948");'));

?>