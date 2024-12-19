<?php

namespace App\Controllers;

use App\Database\Query;
use App\Models\Field;
use App\Models\ExerciseHelper;
use App\Models\Exercise;

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
        
        $params['router'] = $this->router;
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $exercise = new Exercise(['title' => $_POST['title']]);
            if ($exerciseId = $this->exerciseHelper->save($exercise)) {
                $this->router->redirect('fields_index', ['exercise' => $exerciseId]);
            }
            $params["error"] = "Le titre est déjà utilisé. Veuillez en choisir un autre.";
        }
        $this->view('exercises/new', $params);

    }

    public function getId(): int {
        // Getter logic here
        return $this->id;
    }

    public function getTitle(): string
    {
        return $this->title;
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
        $this->query->delete('fields',Field::class, 'id = :fieldId', $params);
        
    }

    public function getFulfillments(int $fulfillmentId): array {
        // Logic to get fulfillments
    }
}