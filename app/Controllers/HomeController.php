<?php

namespace App\Controllers;

use Core\Auth;
use Core\Controller;
use App\Enums\MessageEnum as Message;

class HomeController extends Controller
{
    public function index()
    {
        if (!Auth::check()) {
            $this->redirect('/login');
        }

        // var_dump($password);
        return $this->view('home');
    }
}
