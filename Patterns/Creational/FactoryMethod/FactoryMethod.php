<?php

declare(strict_types=1);

// O Factory Method é um padrão de projeto criacional que fornece uma interface para 
// criar objetos em uma superclasse, mas permite que as subclasses alterem o tipo de objetos que serão criados.
// Utíl quando uma classe não pode antecipar a classe de objetos que deve criar.


// A interface Product declara as operações que todos os produtos concretos devem implementar.
interface Product
{
	public function operation(): string;
}

// Os produtos concretos fornecem várias implementações da interface do produto.
class ConcreteProduct1 implements Product
{
	public function operation(): string
	{
		return "{Result of the ConcreteProduct1}";
	}
}

class ConcreteProduct2 implements Product
{
	public function operation(): string
	{
		return "{Result of the ConcreteProduct2}";
	}
}

// A classe Creator declara o método fábrica que deve retornar um objeto de uma classe DO TIPO PRODUTO.
// A assinatura do método fábrica deve retornar um tipo de produto abstrato, enquanto dentro do método um produto concreto deve ser instanciado.
abstract class Creator
{
	// Observe que o método fábrica também pode fornecer alguma implementação padrão do objeto.
	abstract public function factoryMethod(): Product;

	// Além disso, observe que, apesar do nome, a principal responsabilidade do Criador não é criar produtos. 
	// Normalmente, ele contém alguma lógica de negócios que depende dos objetos de produto retornados pelo método fábrica.
	public function someOperation(): string
	{
		// Chama o método fábrica para criar um objeto de produto.
		$product = $this->factoryMethod();
		// Agora, usa o produto.
		$result = "Creator: The same creator's code has just worked with " . $product->operation();

		return $result;
	}
}

// Os criadores concretos substituem o método fábrica para alterar o tipo de produto resultante.
class ConcreteCreator1 extends Creator
{
	// Observe que a assinatura do método ainda usa o tipo de produto abstrato, mesmo que o produto concreto seja realmente retornado do método.
	public function factoryMethod(): Product
	{
		return new ConcreteProduct1();
	}
}

class ConcreteCreator2 extends Creator
{
	public function factoryMethod(): Product
	{
		return new ConcreteProduct2();
	}
}

// O código do cliente funciona com uma instância de um criador concreto, embora através de sua interface base.
function clientCode(Creator $creator)
{
	// ...
	echo "Client: I'm not aware of the creator's class, but it still works.\n" . $creator->someOperation();
	// ...
}

echo "App: Launched with the ConcreteCreator1.\n";
clientCode(new ConcreteCreator1());
echo "\n\n";

echo "App: Launched with the ConcreteCreator2.\n";
clientCode(new ConcreteCreator2());
echo "\n";

// Output:
// App: Launched with the ConcreteCreator1.
// Client: I'm not aware of the creator's class, but it still works.
// Creator: The same creator's code has just worked with {Result of the ConcreteProduct1}

// App: Launched with the ConcreteCreator2.
// Client: I'm not aware of the creator's class, but it still works.
// Creator: The same creator's code has just worked with {Result of the ConcreteProduct2}

