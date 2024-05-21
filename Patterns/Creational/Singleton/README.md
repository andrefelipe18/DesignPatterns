# Propósito

Garantir que uma classe tenha apenas uma instância e fornecer um ponto global de acesso a ela.

# Aplicabilidade

Use o padrão Singleton quando:
	- Quando uma classe precisa ter somente uma instância disponível em todo o sistema
	- Quando você perceber que está utilizando variáveis globais para guardar partes importantes do programa, como configurações que são usadas em vários lugares da aplicação.

# Implementação

1. Crie uma classe Singleton com um construtor privado, que não pode ser acessado de fora da classe.
2. Crie um método estático que será responsável por criar uma instância da classe e garantir que apenas uma instância seja criada.
3. Crie uma variável estática privada que armazenará a instância da classe.

Exemplos:
	- [Singleton.php](Singleton.php)
    - [Example1.php](Example1.php)
    - [SingletonTest.php](../../../tests/Patterns/Creational/Singleton/SingletonTest.php)

# Consequências

|   | Singleton |
|---|-----------|
| <span style="color:green">Bom</span> | Acesso controlado por encapsulamento à instância única; |
| <span style="color:green">Bom</span> | É possível permitir um número variável de instâncias (pode soar estranho, mas é possível criar um Singleton que permite N instâncias de uma classe); |
| <span style="color:green">Bom</span> | É possível usar thead lock para garantir que duas partes do código não alterem o singleton simultaneamente; |
| <span style="color:green">Bom</span> | Usa lazy instantiation, ou seja, o Singleton só será instanciado no momento do uso; |
| <span style="color:red">Ruim</span> | É mais difícil de testar; |
| <span style="color:red">Ruim</span> | Viola o princípio da responsabilidade única; |
| <span style="color:red">Ruim</span> | Requer tratamento especial em casos de concorrência; |