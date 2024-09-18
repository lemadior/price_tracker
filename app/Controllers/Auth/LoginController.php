<?php

namespace App\Controllers\Auth;

use Core\Auth;
use Exception;
use App\Models\User;
use Core\Controller;

class LoginController extends Controller
{
    public function __invoke()
    {
        $bp = true;
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];

            try {
                $user = User::findByUsername($username);
            } catch (Exception $err) {
                return $this->view('login', ['error' => $err->getMessage()]);
            }

            if ($user && password_verify($password, $user['password'])) {
                Auth::login($user);

                header('Location: /');

                return;
            }

            return $this->view('login', ['error' => 'invalid credentials']);
        }

        return $this->view('login');
    }
}
