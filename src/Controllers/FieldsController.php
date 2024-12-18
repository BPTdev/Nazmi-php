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

    public function index(int $exerciseId) {
        // Logic to show exercise
        
        $exercise = $this->exerciseHelper->get($exerciseId);
        
        $this->view('fields/index', [
            'exercise' => $exercise,
            'router'    => $this->router,
        ]);
    }

}