<?php

declare(strict_types=1);

// O padrão Prototype é usado para criar objetos a partir de um modelo existente
// Para evitar o custo de criação de objetos da maneira padrão (new Classe()) e, em vez disso, crie um protótipo e clone-o

// Classe abstrata com o método mágico __clone()
abstract class Prototype {
    protected string $content;

    public function __construct(string $content) {
        $this->content = $content;
    }

    // Método mágico __clone() para clonar o objeto
    public function __clone() {
        // Faz uma cópia superficial do objeto, se a cópia profunda for necessária, implemente-a conforme necessário
    }

    public function getContent(): string {
        return $this->content;
    }
}

// Classe concreta que estende a classe abstrata Prototype
class Document extends Prototype {
    // Como não temos novos métodos ou propriedades,
    // não precisamos redefinir o construtor ou __clone()
}

// Classe Client
class DocumentManager {
    private array $documents = [];

    public function addDocument(Document $document) {
        $this->documents[] = $document;
    }

    public function cloneDocument(int $index): Document {
        // Clonando um documento específico
        return clone $this->documents[$index];
    }
}

// Uso
$originalDocument = new Document(" Conteúdo do documento original ");

$manager = new DocumentManager();
$manager->addDocument($originalDocument);

// Clonando o documento original
$clonedDocument = $manager->cloneDocument(0);

echo "Conteúdo do documento clonado: " . $clonedDocument->getContent() . PHP_EOL;