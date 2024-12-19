<?php

namespace App\Controllers;

use App\Models\ExerciseHelper;
use App\Models\Field;

class FieldsController extends Controller
{
    protected ExerciseHelper $exerciseHelper;

    public function __construct()
    {
        parent::__construct();
        $this->exerciseHelper = new ExerciseHelper();
    }

    public function index(int $exerciseId): void
    {
        $exercise = $this->exerciseHelper->get($exerciseId);
        $params = [
            'exercise' => $exercise,
            'router'   => $this->router,
        ];
    
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $field = new Field([
                'label'      => $_POST['field']['label'],
                'value_kind' => $_POST['field']['value_kind'],
            ]);
    
            if ($exercise->createField($field)) {
                $this->router->redirect('fields_index', ['exercise' => $exercise->getId()]);
            } else {
                $params["error"] = "Le label déjà utilisé. Veuillez en choisir un autre.";
            }
        }
    
        $this->view('fields/index', $params);
    }
}

 