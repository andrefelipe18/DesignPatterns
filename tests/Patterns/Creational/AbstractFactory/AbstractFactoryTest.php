<?php

declare(strict_types=1);

require_once __DIR__ . '/../../../../Patterns/Creational/AbstractFactory/AbstractFactory.php';

test('ConcreteFactory1', function () {
	$factory = new ConcreteFactory1();
	$productA = $factory->createProductA();
	$productB = $factory->createProductB();
	expect($productA)->toBeInstanceOf(ConcreteProductA1::class);
	expect($productB)->toBeInstanceOf(ConcreteProductB1::class);
});

test('ConcreteFactory2', function () {
	$factory = new ConcreteFactory2();
	$productA = $factory->createProductA();
	$productB = $factory->createProductB();
	expect($productA)->toBeInstanceOf(ConcreteProductA2::class);
	expect($productB)->toBeInstanceOf(ConcreteProductB2::class);
});