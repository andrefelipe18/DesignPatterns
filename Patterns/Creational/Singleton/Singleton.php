<?php

declare(strict_types=1);

class Singleton
{	
	/**
	 * This variable will store the instance of the Singleton class
	 * 
	 * @var Singleton|null
	 */
	private static ?Singleton $instance = null;

	/**
	 * The constructor is private to prevent the creation of new instances
	 */
	private function __construct(){}

	/**
	 * This method will return the instance of the Singleton class
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

// Example of use
$singleton1 = Singleton::getInstance();
$singleton2 = Singleton::getInstance();

var_dump($singleton1 === $singleton2); // true
