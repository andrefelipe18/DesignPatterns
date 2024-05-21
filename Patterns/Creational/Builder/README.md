# Propósito

O padrão Builder é útil quando você tem um objeto complexo que você quer criar, mas quer evitar um construtor com muitos parâmetros. Ele separa a construção de um objeto complexo da sua representação, permitindo que o mesmo processo de construção possa criar diferentes representações.

Por exemplo, no caso do nosso exemplo [Builder.php](Builder.php), a "representação" do personagem seria todas as características que o definem, como raça, classe, arma e armadura. O padrão Builder nos permite construir diferentes representações do personagem (ou seja, diferentes personagens) usando o mesmo processo de construção, mas com diferentes configurações de propriedades.

# Aplicabilidade

Use o padrão Builder quando:
	- O algoritmo para criar um objeto complexo deve ser independente das partes que compõem o objeto e de como elas são montadas.
	- O processo de construção deve permitir diferentes representações do objeto que está sendo construído.

# Implementação

1. Crie uma interface `Builder` que defina os métodos necessários para construir o objeto.
2. Crie uma classe `CharacterBuilder` que implemente a interface `Builder` e que será responsável por construir o objeto.
3. Crie uma classe `Character` que será o objeto complexo que você quer construir.

Exemplos:
	- [Builder.php](Builder.php)
    - [BuilderWithDirector.php](BuilderWithDirector.php)
    - [BuilderTest.php](../../../tests/Patterns/Creational/Builder/BuilderTest.php)

# Consequências

|   | Builder |
|---|---------|
| <span style="color:green">Bom</span> | Permite a construção de objetos complexos passo a passo; |
| <span style="color:green">Bom</span> | Permite a construção de diferentes representações do objeto; |
| <span style="color:green">Bom</span> | Permite a reutilização do mesmo código de construção para diferentes objetos; |
| <span style="color:red">Ruim</span> | O código final pode se tornar muito complexo |

