<?php

namespace App\Controllers\Auth;

use Exception;
use App\Models\User;
use Core\Controller;

class RegisterController extends Controller
{
    public function __invoke()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $confirmPassword = $_POST['password_confirmation'];

            try {
                $user = User::findByUsername($username);

                // If $user got a value it means that specified username is already taken
                return $this->view('register', ['error' => 'Username exist']);
            } catch (Exception $err) {
                $user = false;
            }

            if ($password !== $confirmPassword) {
                return $this->view('register', ['error' => 'Password do not match']);
            }

            try {
                User::create($username, $password);
            } catch (Exception $err) {
                return $this->view('register', ['error' => 'Cannot create the new user']);
            }

            return $this->view('login', ['success' => 'New User successfully created']);
        }

        return $this->view('register');
    }
}
