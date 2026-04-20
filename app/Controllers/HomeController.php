<?php
namespace App\Controllers;

use App\Core\Controller;

class HomeController extends Controller {

    public function index() {
        // Here we could interact with a Model (e.g., fetch users from database)
        // For now, let's just pass some static data to the view
        $data = [
            'title' => 'Welcome to Modern MVC Matrimony',
            'message' => 'This is the new advanced MVC architecture page!'
        ];

        // Call inherited method to load view
        // 'home/index' maps to app/Views/home/index.php
        $this->view('home/index', $data);
    }
}