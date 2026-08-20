<?php

class LoginController extends Controller
{
    public function index()
{
    if (isset($_SESSION['teacher_id']))
    {
        $this->redirect("dashboard");
    }

    $this->view("auth/login");
}

    public function authenticate()
    {
        $email = trim($_POST['email']);
        $password = trim($_POST['password']);

        $teacherModel = $this->model("Teacher");

        $teacher = $teacherModel->login($email, $password);

        if ($teacher)
        {
            $_SESSION['teacher_id'] = $teacher['teacher_id'];
            $_SESSION['teacher_name'] = $teacher['first_name'];
            $_SESSION['teacher_email'] = $teacher['email'];

            $this->redirect("dashboard");
        }
        else
        {
            $this->redirect("login?error=1");
        }
    }

    public function logout()
    {
        session_unset();
        session_destroy();

        $this->redirect("login");
    }
}