<?php

namespace CryptoBot\Application\User\Action;

use CryptoBot\Application\Currency\Enum\CryptocurrencyCodeEnum;
use CryptoBot\Application\Currency\Enum\FiatCodeEnum;
use CryptoBot\Application\User\Contract\CreateUserDataInterface;
use CryptoBot\Application\User\Repository\UserRepositoryInterface;
use CryptoBot\Models\CryptocurrencyWallet;
use CryptoBot\Models\FiatWallet;
use CryptoBot\Models\User;

class CreateUserAction
{
    public function __construct(
        private readonly UserRepositoryInterface $userRepository
    )
    {}

    public function run(CreateUserDataInterface $data): void
    {
        $user = $this->userRepository->getByTelegramUserId($data->getTelegramUserId());
        if ($user) {
            return;
        }

        $user = new User();
        $user->telegram_user_id = $data->getTelegramUserId();
        $user->save();

        foreach (CryptocurrencyCodeEnum::cases() as $cryptocurrencyCode) {
            $cryptocurrencyWallet = new CryptocurrencyWallet();

            $cryptocurrencyWallet->currency_code = $cryptocurrencyCode->value;
            $cryptocurrencyWallet->user_id       = $user->id;
            $cryptocurrencyWallet->balance       = 0.0;

            $cryptocurrencyWallet->save();
        }

        foreach (FiatCodeEnum::cases() as $fiatCode) {
            $fiatWallet = new FiatWallet();

            $fiatWallet->currency_code = $fiatCode->value;
            $fiatWallet->user_id       = $user->id;
            $fiatWallet->balance       = 0.0;

            $fiatWallet->save();
        }
    }
}
