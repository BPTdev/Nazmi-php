<?php
namespace App\Controllers;

use App\Database\Query;
class FieldsController extends Controller {
    private int $id;
    private Exercise $exercise;
    private string $label;
    private string $valueKind;
    private Query $query;

    public function __construct(array $params) {
        // Constructor logic here
    }

    public function getId(): int {
        // Getter logic here
        return $this->id;
    }

    public function setLabel(string $label): void {
        // Setter logic here
    }

    public function setValueKind(string $valueKind): void {
        // Setter logic here
    }

    public function update(): bool {
        // Update logic here
    }
}