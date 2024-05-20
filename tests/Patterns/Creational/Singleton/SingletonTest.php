<?php

declare(strict_types=1);

require_once __DIR__ . '/../../../../Patterns/Creational/Singleton/Singleton.php';

it('Guarantees that the Singleton class returns the same instance', function () {
	$singleton1 = Singleton::getInstance();
	$singleton2 = Singleton::getInstance();

	expect($singleton1)->toBe($singleton2);	
});

it('The class Singleton should not allow the creation of new instances', function () {
	$reflection = new ReflectionClass(Singleton::class);
	$constructor = $reflection->getConstructor();

	expect($constructor->isPrivate())->toBeTrue();
});