<?php

namespace Core\Services;

use App\Enums\MessageEnum;

class MessageService
{
    protected const MSG_MAP = [
        'info' => [],
        'warning' => [],
        'error' => [],
        'success' => []
    ];

    public function getTypes(): array
    {
        $types = [];

        foreach (MessageEnum::cases() as $msg) {
            $types[] = $msg->value;
        }

        return $types;
    }

    public function getAllMessages(): array
    {
        foreach (MessageEnum::cases() as $msg) {
            self::MSG_MAP[$msg->value] = $this->getMessage($msg);
        }

        return self::MSG_MAP;
    }

    public function getMessage(MessageEnum $messageType): array
    {
        $message = !empty($_SESSION[$messageType->value])
            ? $message[] = $_SESSION[$messageType->value]
            : [];

        $this->cleanMessage($messageType);

        return $message;
    }

    public function sendMessage(MessageEnum $messageType, string $message): MessageService
    {
        if (empty($message)) {
            return $this;
        }

        $_SESSION[$messageType->value][] = $message;

        return $this;
    }

    protected function cleanMessage(MessageEnum $messageType): void
    {
        unset($_SESSION[$messageType->value]);

        self::MSG_MAP[$messageType->value] = [];
    }
}
