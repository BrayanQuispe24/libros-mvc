<?php

class Auth
{
    public static function check(): bool
    {
        return isset($_SESSION['user_id']);
    }

    public static function userId(): ?int
    {
        return $_SESSION['user_id'] ?? null;
    }

    public static function userName(): ?string
    {
        return $_SESSION['user_name'] ?? null;
    }

    public static function requireLogin(): void
    {
        if (!self::check()) {
            header('Location: ' . BASE_URL . '/');
            exit;
        }
    }

    public static function logout(): void
    {
        session_unset();
        session_destroy();
    }
}