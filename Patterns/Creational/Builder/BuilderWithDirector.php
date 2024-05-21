<?php

declare(strict_types=1);

// O padrão Builder é usado para criar objetos complexos passo a passo sem a necessidade de criar um construtor com muitos parâmetros
interface CharacterBuilderInterface
{
	public function setRace($race);
	public function setClass($class);
	public function setWeapon($weapon);
	public function setArmor($armor);
	public function build(): Character;
}

// O CharacterBuilder é responsável por criar o objeto Character
class CharacterBuilder implements CharacterBuilderInterface
{
	private $character;

	public function __construct()
	{
		$this->character = new Character();
	}

	public function setRace($race)
	{
		$this->character->setRace($race);
		return $this;
	}

	public function setClass($class)
	{
		$this->character->setClass($class);
		return $this;
	}

	public function setWeapon($weapon)
	{
		$this->character->setWeapon($weapon);
		return $this;
	}

	public function setArmor($armor)
	{
		$this->character->setArmor($armor);
		return $this;
	}

	public function build(): Character
	{
		return $this->character;
	}
}

class Character
{
	private $race;
	private $class;
	private $weapon;
	private $armor;

	public function setRace($race)
	{
		$this->race = $race;
	}

	public function setClass($class)
	{
		$this->class = $class;
	}

	public function setWeapon($weapon)
	{
		$this->weapon = $weapon;
	}

	public function setArmor($armor)
	{
		$this->armor = $armor;
	}

	public function describe()
	{
		echo "Race: {$this->race}\n";
		echo "Class: {$this->class}\n";
		echo "Weapon: {$this->weapon}\n";
		echo "Armor: {$this->armor}\n";
	}
}

class CharacterDirector
{
	private $builder;

	public function __construct(CharacterBuilderInterface $builder)
	{
		$this->builder = $builder;
	}

	public function buildWizardElf()
	{
		return $this->builder->setRace("Elf")
			->setClass("Wizard")
			->setWeapon("Staff")
			->setArmor("Robe")
			->build();
	}

	public function buildWarriorHuman()
	{
		return $this->builder->setRace("Human")
			->setClass("Warrior")
			->setWeapon("Sword")
			->setArmor("Plate")
			->build();
	}

	// Outros métodos para construir diferentes tipos de personagens
}

// Exemplos de uso

$builder = new CharacterBuilder();

//Usando o CharacterBuilder diretamente
$character = $builder
	->setRace('Human')
	->setClass('Warrior')
	->setWeapon('Sword')
	->setArmor('Plate')
	->build();

$character->describe();

//Usando o CharacterDirector
$director = new CharacterDirector($builder);

$wizardElf = $director->buildWizardElf();
$wizardElf->describe();

$warriorHuman = $director->buildWarriorHuman();
$warriorHuman->describe();

// Saída:
// $character = Human Warrior Sword Plate
// $wizardElf = Elf Wizard Staff Robe
// $warriorHuman = Human Warrior Sword Plate