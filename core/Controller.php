<?php

namespace Core;

class Controller
{
    protected function view($view, $data = [])
    {
        extract(array: $data);

        require "../app/Views/{$view}.php";
    }
}
