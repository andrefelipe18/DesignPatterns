<?php

declare(strict_types=1);

require_once __DIR__ . '/../../../../Patterns/Creational/FactoryMethod/FactoryMethod.php';

test('ConcreteCreator1', function () {
	$creator = new ConcreteCreator1();
	$product = $creator->factoryMethod();
	expect($product)->toBeInstanceOf(ConcreteProduct1::class);
	expect($product->operation())->toBe("{Result of the ConcreteProduct1}");
	expect($creator->someOperation())->toBe("Creator: The same creator's code has just worked with {Result of the ConcreteProduct1}");
});

test('ConcreteCreator2', function () {
	$creator = new ConcreteCreator2();
	$product = $creator->factoryMethod();
	expect($product)->toBeInstanceOf(ConcreteProduct2::class);
	expect($product->operation())->toBe("{Result of the ConcreteProduct2}");
	expect($creator->someOperation())->toBe("Creator: The same creator's code has just worked with {Result of the ConcreteProduct2}");
});
