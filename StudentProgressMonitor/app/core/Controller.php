<?php

class Controller
{
    /**
     * Load a model
     */
    public function model($model)
    {
        $modelFile = "app/models/" . $model . ".php";

        if(file_exists($modelFile))
        {
            require_once $modelFile;

            return new $model();
        }

        die("Model '$model' not found.");
    }

    /**
     * Load a view with the default layout
     */
public function view($view, $data = [], $layout = "app")
{
    extract($data);

    $content = "app/views/" . $view . ".php";

    require_once "app/views/layouts/" . $layout . ".php";
}

    /**
     * Redirect to another page
     */
    public function redirect($page)
    {
        header("Location: /StudentProgressMonitor/" . $page);
        exit();
    }
}