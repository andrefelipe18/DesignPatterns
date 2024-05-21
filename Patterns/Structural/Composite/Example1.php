<?php

// Componente base (interface) que define o que os nós devem implementar
interface Employee {
    public function getName(): string;
    public function getSalary(): float;
}

// Funcionário individual (folha)
class SingleEmployee implements Employee {
    private string $name;
    private float $salary;

    public function __construct(string $name, float $salary) {
        $this->name = $name;
        $this->salary = $salary;
    }

    public function getName(): string {
        return $this->name;
    }

    public function getSalary(): float {
        return $this->salary;
    }
}

// Departamento (composto) que contém outros funcionários (que são departamentos ou funcionários individuais)
class Department implements Employee {
    private string $name;
    private array $employees = [];

    public function __construct(string $name) {
        $this->name = $name;
    }

    public function addEmployee(Employee $employee) {
        $this->employees[] = $employee;
    }

    public function getName(): string {
        return $this->name;
    }

    public function getSalary(): float {
        $totalSalary = 0;
        foreach ($this->employees as $employee) {
            $totalSalary += $employee->getSalary();
        }
        return $totalSalary;
    }
}

// Código cliente (organização) que contém o CEO e os departamentos
class Organization {
    private Employee $ceo;

    public function __construct(Employee $ceo) {
        $this->ceo = $ceo;
    }

    public function getSalaryBudget(): float {
        return $this->ceo->getSalary();
    }
}

// Uso
// Criando funcionários individuais (folhas)
$john = new SingleEmployee("John", 5000);
$jane = new SingleEmployee("Jane", 6000);

// Criando um departamento (composto) e adicionando funcionários a ele
$engineering = new Department("Engineering");
$engineering->addEmployee($john);
$engineering->addEmployee($jane);

// Criando o CEO (funcionário individual)
$ceo = new SingleEmployee("Steve", 10000);

// Criando a organização (Que será o nó raiz da árvore de componentes)
$organization = new Organization($ceo);
$organization->getSalaryBudget(); // 21000