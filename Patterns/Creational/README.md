# Propósito

O propósito de usar patterns criacionais (Creational Patterns) é **fornecer mecanismos de criação de objetos que aumentem a flexibilidade e a reutilização de código já existente**.

- **Abstract Factory**: Fornece uma interface para criar famílias de objetos relacionados ou dependentes sem especificar suas classes concretas.
- **Builder**: Permite que você construa objetos complexos passo a passo. O padrão permite que você produza diferentes tipos e representações de um objeto usando o mesmo código de construção.
- **Factory Method**: Define uma interface para criar um objeto, mas permite que as subclasses alterem o tipo de objetos que serão criados.
- **Prototype**: Permite que você copie objetos existentes sem fazer seu código depender de suas classes.
- **Singleton**: Garante que uma classe tenha apenas uma instância e fornece um ponto de acesso global para essa instância.

# Problema

Imagine que você está desenvolvendo um sistema de gerenciamento de carros. Você precisa criar um sistema que permita a criação de carros elétricos e carros a gasolina. Cada tipo de carro tem suas próprias partes, como motor, pneus e carroceria. Além disso, cada parte do carro tem suas próprias implementações, como motor elétrico, motor a gasolina, pneu comum, pneu de performance, carroceria elétrica e carroceria a gasolina.

# Solução

Para resolver esse problema, você pode usar o padrão de projeto Abstract Factory. O padrão Abstract Factory fornece uma interface para criar famílias de objetos relacionados ou dependentes sem especificar suas classes concretas.

