<?php

namespace CryptoBot\Repository;

use CryptoBot\Application\User\Repository\UserRepositoryInterface;
use CryptoBot\Models\User;

class UserRepository implements UserRepositoryInterface
{
    public function getByTelegramUserId(string $telegramUserId): ?User
    {
        return User::query()
            ->where('telegram_user_id', '=', $telegramUserId)
            ->first();
    }
}
