<?php

use CryptoBot\Infrastructure\Telegram\Event\EventHandler;
use Illuminate\Support\Facades\Route;
use Telegram\Bot\Laravel\Facades\Telegram;

Route::post('/run', function () {
    $update = Telegram::commandsHandler(true);
    EventHandler::tryHandle($update);
});
