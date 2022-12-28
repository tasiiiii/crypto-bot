<?php

use Illuminate\Support\Facades\Route;
use Telegram\Bot\Laravel\Facades\Telegram;

Route::post('/run', function () {
    Telegram::commandsHandler(true);
});
