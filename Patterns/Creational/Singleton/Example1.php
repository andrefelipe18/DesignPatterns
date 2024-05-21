<?php

declare(strict_types=1);

class DatabaseConnection
{
	private static ?DatabaseConnection $instance = null;

	private function __construct()
	{
	}

	public static function getInstance(): DatabaseConnection
	{
		if (self::$instance === null) {
			//Aqui iria a lógica de conexão com o banco de dados
			//Por exemplo, para SQLite em memória
			self::$instance = new PDO('sqlite::memory:');
		}

		return self::$instance;
	}
}

// Exemplos de uso
$database1 = DatabaseConnection::getInstance();
$database2 = DatabaseConnection::getInstance();

var_dump($database1 === $database2); // true