<?php

namespace App\Controllers;

use App\Database\Query;
use App\Models\Field;
use App\Models\ExerciseHelper;

class ExerciseController extends Controller {
    private int $id;
    private string $title;
    private ExerciseHelper $exerciseHelper;
    private Query $query;

    public function __construct(array $params = []) {
        // Constructor logic here
        parent::__construct();
        $this->exerciseHelper = new ExerciseHelper();
    }

    public function index() {
        // Logic to show exercise
        
        $this->view('exercises/index', [
            'exercises' => $this->exerciseHelper->get(),
            'router'    => $this->router,
        ]);
    }

    public function answering() {
        // Logic to show exercise
        
        $this->view('exercises/answering', [
            'exercises' => $this->exerciseHelper->get(),
            'router'    => $this->router,
        ]);
    }
    public function new() {
        // Logic to show exercise
        
        $this->view('exercises/new', [
            // 'exercises' => $this->exerciseHelper->get(),
            'router'    => $this->router,
        ]);
    }

    public function getId(): int {
        // Getter logic here
        return $this->id;
    }

    public function setTitle(string $title): void {
        // Setter logic here
        $this->title = $title;
    }

    public function getFields(int $fieldId): array {
        $params = [':exerciseId' => $this->id, ':fieldId' => $fieldId];
        return $this->query->select('fields', Field::class, 'exercise_id = :exerciseId', $params);
    }

    public function createField(Field $field): void {
        // Logic to create field
        
        $data = ['exercise_id' => $this->id, 'name' => $field->getName(), 'description' => $field->getDescription()];
        $field->setId($this->query->insert('fields', Field::class, $data));
        
    }

    public function deleteField(Field $field): void {
        // Logic to delete field
        $params = [':fieldId' => $field->getId()];
        $this->query->delete('fields', 'id = :fieldId', $params);
        
    }

    public function getFulfillments(int $fulfillmentId): array {
        // Logic to get fulfillments
    }
}