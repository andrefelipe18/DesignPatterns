<?php

declare(strict_types=1);

class Singleton
{
	/**
	 * Essa variável armazenará a instância da classe Singleton
	 * 
	 * @var Singleton|null
	 */
	private static ?Singleton $instance = null;

	/**
	 * O construtor é privado para evitar que a classe seja instanciada
	 */
	private function __construct()
	{
	}

	/**
	 * O método getInstance é responsável por retornar a instância da classe Singleton
	 * 
	 * @return Singleton
	 */
	public static function getInstance(): Singleton
	{
		if (self::$instance === null) {
			self::$instance = new Singleton();
		}

		return self::$instance;
	}
}

// Exemplos de uso
$singleton1 = Singleton::getInstance();
$singleton2 = Singleton::getInstance();

var_dump($singleton1 === $singleton2); // true
