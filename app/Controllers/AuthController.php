<?php

namespace App\Controllers;

use Core\Controller;
use Core\Auth;
use App\Models\User;

class AuthController extends Controller
{
    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];

            $user = User::findByUsername($username);

            if ($user && password_verify($password, $user['password'])) {
                Auth::login($user);
                header('Location: /');
                return;
            }

            return $this->view('login', ['error' => 'invalid credentials']);
        }

        return $this->view('login');
    }

    public function logout(): void
    {
        Auth::logout();

        header('Location: /login');

        return;
    }
}
