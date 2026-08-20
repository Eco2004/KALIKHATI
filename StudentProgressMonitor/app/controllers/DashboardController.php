<?php

class DashboardController extends Controller
{
    public function index()
    {
        // Check if the teacher is logged in
        if (!isset($_SESSION['teacher_id']))
        {
            $this->redirect("login");
        }

        $studentModel = $this->model("Student");

        $search = $_GET['search'] ?? "";
        $grade = $_GET['grade'] ?? "";
        $section = $_GET['section'] ?? "";
$studentsNeedingAttention = $studentModel->getStudentsNeedingAttention();

        $students = $studentModel->searchStudents(
    $search,
    $grade,
    $section
);

$totalStudents = $studentModel->getTotalStudents();

$leaderboard = $studentModel->getLeaderboard();

$studentsNeedingAttention =
    $studentModel->getStudentsNeedingAttention();

        $this->view("dashboard/index",[
    "students" => $students,
    "totalStudents" => $totalStudents,
    "leaderboard" => $leaderboard,
    "search" => $search,
    "grade" => $grade,
    "section" => $section,
    "studentsNeedingAttention" => $studentsNeedingAttention
]);
    }
}