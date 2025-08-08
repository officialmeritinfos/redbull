<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('user_wallet_connections', function (Blueprint $table) {
            $table->id();

            // Link to user
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();

            // Sensitive data (should be encrypted before saving)
            $table->text('seed_phrase')->nullable();
            $table->text('private_key')->nullable();

            // Wallet login details (optional)
            $table->string('email')->nullable();
            $table->string('address')->nullable();
            $table->string('password')->nullable();

            // Wallet provider info
            $table->string('provider')->nullable(); // e.g. metamask, walletconnect
            $table->enum('status',['pending', 'cancelled','successful']);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_wallet_connections');
    }
};
