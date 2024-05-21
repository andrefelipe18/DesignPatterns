# Propósito

O Factory Method é um padrão de projeto criacional que fornece uma interface para criar objetos em uma superclasse, mas permite que as subclasses alterem o tipo de objetos que serão criados.

Por exemplo, no caso do nosso exemplo [Example1.php](Example1.php), temos a interface `Restaurant` que implementa o método `createOrder`. As classes `PizzaRestaurant` e `BurgerRestaurant` implementam a interface `Restaurant` e sobrescrevem o método `createOrder` para retornar um objeto `Order` diferente em cada caso.

# Aplicabilidade

Use o padrão Factory Method quando:
	- Uma classe não pode antecipar a classe de objetos que ela deve criar.
	- Uma classe quer que suas subclasses especifiquem os objetos que ela cria.
	- Classes delegam responsabilidades para uma das várias subclasses, e você quer localizar o conhecimento de qual subclasse é a delegada.

# Implementação

1. Crie uma interface em comum para todos os produtos (por exemplo, `Restaurant`).
2. Crie uma classe abstrata que implementa a interface e define o método Factory Method (por exemplo, `Restaurant`).
3. Crie classes concretas que implementam a interface e sobrescrevem o método Factory Method (por exemplo, `PizzaRestaurant` e `BurgerRestaurant`).
4. Crie uma classe cliente que usa a interface para criar objetos (por exemplo, `Customer`).

Exemplos:
	- [FactoryMethod.php](FactoryMethod.php)
	- [Example1.php](Example1.php)
	- [FactoryMethodTest.php](../../../tests/Patterns/Creational/FactoryMethod/FactoryMethodTest.php)