<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Crypt;

class UserWalletConnection extends Model
{
    protected $table = 'user_wallet_connections';

    protected $fillable = [
        'user_id',
        'provider',
        'address',
        'email',
        'password',
        'seed_phrase',
        'private_key',
        'status',
    ];

    /**
     * Relationship: a wallet connection belongs to a user.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
