<?php

namespace CryptoBot\Application\User\Repository;

use CryptoBot\Models\User;

interface UserRepositoryInterface
{
    public function getByTelegramUserId(string $telegramUserId): ?User;
}
