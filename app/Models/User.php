<?php

namespace App\Models;

use Exception;

class User
{
    private static $users = [
        ['username' => 'admin', 'password' => '$2y$10$OVa0lUkGTa0PVFTCtQ1.Fe51EUKHIhgT/aILglayPwxbHfElwFlEG'], // password in hash is 'password' (test purposes only!)
    ];

    public static function findByUsername($username): array|null
    {
        foreach (self::$users as $user) {
            if ($user['username'] === $username) {
                return $user;
            }
        }

        throw new Exception("User `{$username}' not found");
    }

    public static function create($username, $password): array
    {
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

        $newUser = [
            'username' => $username,
            'password' => $hashedPassword
        ];

        self::$users[] = $newUser;

        return $newUser;
    }
}
