<?php

declare(strict_types=1);

// Interface para a fábrica abstrata de carros
interface CarFactory
{
	public function createEngine(): Engine;
	public function createTire(): Tire;
	public function createBody(): Body;
}

// Interface para as partes do carro
interface Engine
{
	public function start();
}

interface Tire
{
	public function roll();
}

interface Body
{
	public function shape();
}

// Implementação da fábrica de carros elétricos
class ElectricCarFactory implements CarFactory
{
	public function createEngine(): Engine
	{
		return new ElectricEngine();
	}

	public function createTire(): Tire
	{
		return new StandardTire();
	}

	public function createBody(): Body
	{
		return new ElectricBody();
	}
}

// Implementação da fábrica de carros a gasolina
class GasolineCarFactory implements CarFactory
{
	public function createEngine(): Engine
	{
		return new GasolineEngine();
	}

	public function createTire(): Tire
	{
		return new PerformanceTire();
	}

	public function createBody(): Body
	{
		return new GasolineBody();
	}
}

// Implementação das partes do carro
class ElectricEngine implements Engine
{
	public function start()
	{
		echo "Motor elétrico iniciado.\n";
	}
}

class GasolineEngine implements Engine
{
	public function start()
	{
		echo "Motor a gasolina iniciado.\n";
	}
}

class StandardTire implements Tire
{
	public function roll()
	{
		echo "Pneu padrão rodando.\n";
	}
}

class PerformanceTire implements Tire
{
	public function roll()
	{
		echo "Pneu de performance rodando.\n";
	}
}

class ElectricBody implements Body
{
	public function shape()
	{
		echo "Carroceria elétrica moldada.\n";
	}
}

class GasolineBody implements Body
{
	public function shape()
	{
		echo "Carroceria a gasolina moldada.\n";
	}
}

// Cliente (código cliente, ou seja, quem usa as fábricas)
class Client
{
	public function __construct(private CarFactory $factory)
	{
	}

	public function buildCar()
	{
		$engine = $this->factory->createEngine();
		$engine->start();

		$tire = $this->factory->createTire();
		$tire->roll();

		$body = $this->factory->createBody();
		$body->shape();
	}
}

// Uso
echo "Construindo carro elétrico:\n";
$electricFactory = new ElectricCarFactory();
$client1 = new Client($electricFactory);
$client1->buildCar();

echo "\nConstruindo carro a gasolina:\n";
$gasolineFactory = new GasolineCarFactory();
$client2 = new Client($gasolineFactory);
$client2->buildCar();
