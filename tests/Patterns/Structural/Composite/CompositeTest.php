<?php

declare(strict_types=1);

require_once __DIR__ . '/../../../../Patterns/Structural/Composite/Composite.php';

test('Guarantee that the children classes implement the Renderable interface', function () {
	$form = new Form();
	$textElement = new TextElement('Email:');
	$inputElement = new InputElement();

	expect($textElement)->toBeInstanceOf(Renderable::class);
	expect($inputElement)->toBeInstanceOf(Renderable::class);
	expect($form)->toBeInstanceOf(Renderable::class);
});

test('Guarantee that form is render correctly', function () {
	$form = new Form();
	$form->addElement(new TextElement('Email:'));
	$form->addElement(new InputElement());
	$embed = new Form();
	$embed->addElement(new TextElement('Password:'));
	$embed->addElement(new InputElement());
	$form->addElement($embed);	

	expect($form->render())->toBe('<form>Email:<input type="text" /><form>Password:<input type="text" /></form></form>');
});