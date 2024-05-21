<?php

declare(strict_types=1);

// O Abstract Factory é um padrão de design criacional que permite produzir famílias de objetos relacionados sem ter que especificar suas classes concretas.
// O padrão Abstract Factory define uma interface para criar todos os produtos, mas deixa a própria subclasse escolher qual produto criar.

// A interface Abstract Factory declara um conjunto de métodos que retornam diferentes produtos abstratos. 
// Esses produtos são chamados de família e são relacionados por um tema ou conceito de alto nível. 
// Produtos de uma família são frequentemente capazes de colaborar entre si.
// Uma família de produtos pode ter várias variantes, mas os produtos de uma variante são incompatíveis com produtos de outra.

// Cada fábrica concreta corresponde a uma variante específica (ou família) de produtos e cria apenas esses produtos.
interface AbstractFactory
{
	public function createProductA(): AbstractProductA;

	public function createProductB(): AbstractProductB;
}

// Cada fábrica concreta tem uma variante de produto correspondente e cria apenas esses produtos.
class ConcreteFactory1 implements AbstractFactory
{
	public function createProductA(): AbstractProductA
	{
		return new ConcreteProductA1();
	}

	public function createProductB(): AbstractProductB
	{
		return new ConcreteProductB1();
	}
}

class ConcreteFactory2 implements AbstractFactory
{
	public function createProductA(): AbstractProductA
	{
		return new ConcreteProductA2();
	}

	public function createProductB(): AbstractProductB
	{
		return new ConcreteProductB2();
	}
}

// Cada produto distinto da família de produtos deve ter uma interface base.
interface AbstractProductA
{
	public function usefulFunctionA(): string;
}

// Produtos concretos são criados por fábricas concretas correspondentes.
class ConcreteProductA1 implements AbstractProductA
{
	public function usefulFunctionA(): string
	{
		return "The result of the product A1.";
	}
}

class ConcreteProductA2 implements AbstractProductA
{
	public function usefulFunctionA(): string
	{
		return "The result of the product A2.";
	}
}

// Aqui está a interface base de outro produto. Todos os produtos podem interagir uns com os outros, mas a interação correta só é possível entre produtos da mesma variante concreta.
interface AbstractProductB
{
	// Produto B é capaz de fazer sua própria coisa...
	public function usefulFunctionB(): string;

	// ...mas também pode colaborar com o Produto A.
	//
	// A interface Abstract Factory garante que todos os produtos que ela cria são da mesma variante e seguem as regras de compatibilidade.
	public function anotherUsefulFunctionB(AbstractProductA $collaborator): string;
}

// Produtos concretos são criados por fábricas concretas correspondentes.
class ConcreteProductB1 implements AbstractProductB
{
	public function usefulFunctionB(): string
	{
		return "The result of the product B1.";
	}

	/**
	 * A variante, Produto B1, é apenas capaz de funcionar corretamente com o Produto A1. No entanto, ele aceita qualquer instância de AbstractProductA como argumento.
	 */
	public function anotherUsefulFunctionB(AbstractProductA $collaborator): string
	{
		$result = $collaborator->usefulFunctionA();

		return "The result of the B1 collaborating with the ({$result})";
	}
}

class ConcreteProductB2 implements AbstractProductB
{
	public function usefulFunctionB(): string
	{
		return "The result of the product B2.";
	}

	/**
	 * A variante, Produto B2, é apenas capaz de funcionar corretamente com o Produto A2. No entanto, ele aceita qualquer instância de AbstractProductA como argumento.
	 */
	public function anotherUsefulFunctionB(AbstractProductA $collaborator): string
	{
	$result = $collaborator->usefulFunctionA();

	return "The result of the B2 collaborating with the ({$result})";
	}
}

// O código do cliente funciona com fábricas e produtos apenas através de tipos abstratos: AbstractFactory e AbstractProduct. 
//Isso permite que você passe qualquer fábrica ou subclasse de produto para o código do cliente sem quebrá-lo.
function clientCodeAbstractFactory(AbstractFactory $factory)
{
	$productA = $factory->createProductA();
	$productB = $factory->createProductB();

	echo $productB->usefulFunctionB() . "\n";
	echo $productB->anotherUsefulFunctionB($productA) . "\n";
}

// O código do cliente pode funcionar com qualquer classe de fábrica concreta.
echo "Client: Testing client code with the first factory type:\n";
clientCodeAbstractFactory(new ConcreteFactory1());
echo "\n";


echo "Client: Testing the same client code with the second factory type:\n";
clientCodeAbstractFactory(new ConcreteFactory2());

// Output:
// Client: Testing client code with the first factory type:
// The result of the product B1.
// The result of the B1 collaborating with the (The result of the product A1.)
//
// Client: Testing the same client code with the second factory type:
// The result of the product B2.
// The result of the B2 collaborating with the (The result of the product A2.)
