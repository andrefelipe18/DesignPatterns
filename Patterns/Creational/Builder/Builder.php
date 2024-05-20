<?php

declare(strict_types=1);

//The builder interface declares product construction steps that are common to all types of builders.
interface Builder
{
	public function producePartA(): void;

	public function producePartB(): void;

	public function producePartC(): void;
}

//Concrete builders provide different implementations of the construction steps. Concrete builders can produce and work with completely different products.

class ConcreteBuilder1 implements Builder
{
	private $product;

	public function __construct()
	{
		$this->reset();
	}

	public function reset(): void
	{
		$this->product = new Product1();
	}

	public function producePartA(): void
	{
		$this->product->parts[] = "PartA1";
	}

	public function producePartB(): void
	{
		$this->product->parts[] = "PartB1";
	}

	public function producePartC(): void
	{
		$this->product->parts[] = "PartC1";
	}

	public function getProduct(): Product1
	{
		$result = $this->product;
		$this->reset();

		return $result;
	}
}

class Product1
{
	public $parts = [];

	public function listParts(): void
	{
		echo "Product parts: " . implode(', ', $this->parts) . "\n\n";
	}
}

//The director is only responsible for executing the building steps in a particular sequence. This makes the director independent of the concrete builders.

class Director
{
	private $builder;

	public function setBuilder(Builder $builder): void
	{
		$this->builder = $builder;
	}

	public function buildMinimalViableProduct(): void
	{
		$this->builder->producePartA();
	}

	public function buildFullFeaturedProduct(): void
	{
		$this->builder->producePartA();
		$this->builder->producePartB();
		$this->builder->producePartC();
	}
}

//The client code creates a builder object, passes it to the director, and then initiates the construction process. The client code does not know the specific type of the builder or product.

$director = new Director();
$builder = new ConcreteBuilder1();
$director->setBuilder($builder);

echo "\nStandard basic product:\n";
$director->buildMinimalViableProduct();
$builder->getProduct()->listParts();

echo "Standard full featured product:\n";
$director->buildFullFeaturedProduct();
$builder->getProduct()->listParts();

echo "Custom product:\n";
$builder->producePartA();
$builder->producePartC();
$builder->getProduct()->listParts();
