<?php
namespace App\Core;

class Controller {

    // Load a view file and pass data to it
    public function view($view, $data = []) {
        // Example: 'home/index' -> app/Views/home/index.php
        $viewFile = __DIR__ . '/../Views/' . $view . '.php';

        if (file_exists($viewFile)) {
            // Extract the associative array into individual variables
            // Example: ['name' => 'John'] -> $name = 'John'
            extract($data);

            // Require the view file
            require_once $viewFile;
        } else {
            die("View file does not exist: $viewFile");
        }
    }

    // Helper method to redirect
    public function redirect($url) {
        header("Location: $url");
        exit();
    }
}