<?php

namespace App\Enums;

enum MessageEnum: string
{
    case INFO = 'info';
    case WARNING = 'warning';
    case ERROR = 'error';
    case SUCCESS = 'success';
}
