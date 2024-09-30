<?php

namespace Core;

use Core\Services\MessageService;
use App\Enums\MessageEnum;


class Controller
{
    const MSG_INFO = MessageEnum::INFO->value;
    const MSG_WARNING = MessageEnum::WARNING->value;
    const MSG_ERROR = MessageEnum::ERROR->value;
    const MSG_SUCCESS = MessageEnum::SUCCESS->value;

    protected function view($view, $data = [])
    {
        extract(array: $data);

        require "../app/Views/{$view}.php";
    }

    protected function redirect(string $url, mixed $data = [])
    {
        $message = new MessageService();

        if (!empty($data)) {
            // Save any messages (if found) into $_SESSION
            foreach ($message->getTypes() as $msg) {
                // Here $msg has MessageEnum type
                $_msg = $data[$msg->value] ?? '';

                $message->sendMessage($msg, $_msg);
            }
        }

        // Redirect to the URL
        header("Location: {$url}");

        exit();
    }
}
