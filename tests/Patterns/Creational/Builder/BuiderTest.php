<?php

declare(strict_types=1);

require_once __DIR__ . '/../../../../Patterns/Creational/Builder/Builder.php';

it('guarantees that the CharacterBuilder implements the CharacterBuilderInterface', function () {
	$characterBuilder = new CharacterBuilder();

	expect($characterBuilder)->toBeInstanceOf(CharacterBuilderInterface::class);
});

it('guarantees that the CharacterBuilder can create a Character object', function () {
	$characterBuilder = new CharacterBuilder();
	$character = $characterBuilder
		->setRace('Human')
		->setClass('Warrior')
		->setWeapon('Sword')
		->setArmor('Plate')
		->build();

	expect($character)->toBeInstanceOf(Character::class);
});