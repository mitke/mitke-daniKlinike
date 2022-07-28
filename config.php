<?php

/**
 * Configuration for database connection
 *
 */
$host       = "localhost";
$username   = "user_dani";
$password   = "tirsova";
$dbname     = "db_daniKlinike"; 
$dsn        = "mysql:host=$host;dbname=$dbname"; 
$options    = array(
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
              );
			  
?>