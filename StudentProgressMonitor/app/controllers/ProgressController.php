<?php

class ProgressController extends Controller
{
    public function index($studentId)
    {
        $progressModel = $this->model("Progress");

        $student = $progressModel->getStudentProgress($studentId);

        $history = $progressModel->getProgressHistory($studentId);

        $this->view("students/progress", [
            "student" => $student,
            "history" => $history
        ]);
    }
}