# Propósito

O padrão Prototype é um padrão de design criacional que permite a clonagem de objetos, mesmo que suas classes concretas sejam desconhecidas. Uma vez que a clonagem de objetos pode ser mais conveniente do que criar novos objetos a partir do zero, o padrão Prototype torna mais fácil copiar objetos existentes sem fazer seu código depender de suas classes concretas.

# Problema

Imagine que você tenha um objeto e deseje criar uma cópia exata dele. Você pode fazer isso manualmente copiando todos os campos do objeto original e passando-os para o construtor de uma nova classe. Mas há dois problemas com esse enfoque:

1. Você precisa saber a classe do objeto que está clonando. Isso pode não estar sempre disponível, especialmente se o código, que você está usando, for fornecido por terceiros.

2. Você precisa escrever muito código para copiar os valores de todos os campos, mesmo que apenas alguns campos tenham mudado.

# Solução

O padrão Prototype delega a clonagem de objetos para os próprios objetos. O padrão declara uma interface (Ou class abstrata) comum para todos os objetos que suportam clonagem. Essa interface permite clonar um objeto sem acoplar seu código a uma classe concreta do objeto. Normalmente, essa interface contém um método `__clone` que retorna uma cópia do próprio objeto. O método `__clone` serve como um substituto para o construtor, que, de fato, pode ser chamado para inicializar uma cópia do objeto.

# Aplicabilidade

Use o padrão Prototype quando:
	- Seu código precisa ser independente das classes concretas dos objetos que você precisa copiar.
	- Os objetos que você está copiando têm poucas variações entre si.

# Implementação

1. Crie uma interface `Prototype` que declare um método para clonar o objeto.
2. Implemente a interface `Prototype` em suas classes concretas.
3. Crie um método de fábrica que permita aos clientes produzir cópias dos objetos baseados em um protótipo.

Exemplos:
	- [Prototype.php](Prototype.php)
	- [PrototypeTest.php](../../../tests/Patterns/Creational/Prototype/PrototypeTest.php)

# Consequências

|   | Prototype |
|---|-----------|
| <span style="color:green">Bom</span> | Permite clonar objetos sem acoplar seu código a classes concretas; |
| <span style="color:green">Bom</span> | Permite adicionar e remover objetos em tempo de execução; |
| <span style="color:green">Bom</span> | Evita a explosão de subclasses |
| <span style="color:red">Ruim</span> | Pode ser difícil de implementar em linguagens que não suportam a clonagem de objetos; |
| <span style="color:red">Ruim</span> | Clonar objetos que que tem referências para outros objetos pode ser super complexo |