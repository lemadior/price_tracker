<?php

namespace App\Models;

class User
{
    private static $users = [
        ['username' => 'admin', 'password' => '$2y$10$OVa0lUkGTa0PVFTCtQ1.Fe51EUKHIhgT/aILglayPwxbHfElwFlEG'], // password in hash is 'password' (test purposes only!)
    ];

    public static function findByUsername($username): array|null
    {
        $bp = true;
        foreach (self::$users as $user) {
            if ($user['username'] === $username) {
                return $user;
            }
        }

        return null;
    }
}
