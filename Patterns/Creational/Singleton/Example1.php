<?php

declare(strict_types=1);

class DatabaseConnection
{
	private static ?DatabaseConnection $instance = null;

	private function __construct(){}

		public static function getInstance(): DatabaseConnection
	{
		if (self::$instance === null) {
			//Here you add the code to connect to the database
			//For example:
			self::$instance = new PDO('sqlite::memory:');
		}

		return self::$instance;
	}
}

// Example of use
$database1 = DatabaseConnection::getInstance();
$database2 = DatabaseConnection::getInstance();

var_dump($database1 === $database2); // true