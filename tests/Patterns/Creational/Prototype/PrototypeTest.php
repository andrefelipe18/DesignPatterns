<?php

declare(strict_types=1);

require_once __DIR__ . '/../../../../Patterns/Creational/Prototype/Prototype.php';

test('Guarantee that the Document class extends the Prototype class', function () {
	$document = new Document('Content of the original document');

	expect($document)->toBeInstanceOf(Prototype::class);
});