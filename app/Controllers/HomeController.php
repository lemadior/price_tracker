<?php

namespace App\Controllers;

use Core\Auth;
use Core\Controller;

class HomeController extends Controller
{
    public function index()
    {
        if (!Auth::check()) {
            header('Location: /login');

            return false;
        }

        return $this->view('home');
    }
}
