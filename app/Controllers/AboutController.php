<?php
namespace App\Controllers;

use App\Core\Controller;

class AboutController extends Controller
{

    public function index()
    {
        $data = [
            'title' => 'About Us - HM Matrimony',
            'heading' => 'About HM Matrimony',
            'content' => 'Welcome to HM Matrimony. We are dedicated to helping you find your perfect life partner. Our trusted platform is built with advanced security and modern architecture to provide you with the best matchmaking experience.'
        ];

        // Call inherited method to load view
        $this->view('about/index', $data);
    }
}