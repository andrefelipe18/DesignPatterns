<?php

declare(strict_types=1);

// Como o composite é mais complexo, vamos criar um exemplo onde temos uma instância de classe de 
// formulário lida com todos os seus elementos de formulário como uma única instância do formulário
// Quando renderizamos o formulário (`render()`), ele renderiza todos os elementos de formulário.

// Vamos criar uma interface Renderable que define o método `render()`
interface Renderable
{
	public function render(): string;
}

/**
 * TODOS os nós concretos devem implementar ou estender a interface (nesse caso, Renderable)
 * Isso é obrigatório para a construção de uma árvore de componentes.
 */
class Form implements Renderable
{
	/**
	 * @var Renderable[]
	 */
	private array $elements;

	/**
	 * Percorre através de todos os elementos e chama render() neles, então retorna código do formulário.
	 *
	 * De fora, não veremos isso e o formulário agirá como uma única instância de objeto
	 */
	public function render(): string
	{
		$formCode = '<form>';

		foreach ($this->elements as $element) {
			$formCode .= $element->render();
		}

		return $formCode . '</form>';
	}

	public function addElement(Renderable $element)
	{
		$this->elements[] = $element;
	}
}

/**
 * Essa classe seria um nó folha. Como não tem filhos, ele não implementa `addElement()`
 */
class InputElement implements Renderable
{
	public function render(): string
	{
		return '<input type="text" />';
	}
}

/**
 * Essa classe seria um nó folha. Como não tem filhos, ele não implementa `addElement()`
 */
class TextElement implements Renderable
{
    public function __construct(private string $text)
    {
    }

    public function render(): string
    {
        return $this->text;
    }
}

// Vamos criar um formulário
$form = new Form();

// Adicionando elementos ao formulário
$form->addElement(new TextElement('Email:'));
$form->addElement(new InputElement());

// Adicionando um formulário dentro de um formulário (Para mostrar que podemos aninhar elementos, e o formulário agirá como uma única instância de objeto)
$embed = new Form();
$embed->addElement(new TextElement('Password:'));
$embed->addElement(new InputElement());

$form->addElement($embed);

echo $form->render();