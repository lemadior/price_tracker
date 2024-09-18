<?php

namespace App\Controllers\Auth;

use Core\Auth;
use Core\Controller;

class LogoutController extends Controller
{
    public function __invoke(): void
    {
        Auth::logout();

        header('Location: /login');

        return;
    }
}
