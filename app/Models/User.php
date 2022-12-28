<?php

namespace CryptoBot\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * @property int    $id
 * @property string $telegram_user_id
 */
class User extends Authenticatable
{}
