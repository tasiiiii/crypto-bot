<?php

namespace CryptoBot\Application\User\Contract;

interface CreateUserDataInterface
{
    public function getTelegramUserId(): string;
}
