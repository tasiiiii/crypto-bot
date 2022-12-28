<?php

namespace CryptoBot\Application\Common;

interface MessageInterface
{
    public function getText(): string;
    public function getKeyboard(): array;
}
