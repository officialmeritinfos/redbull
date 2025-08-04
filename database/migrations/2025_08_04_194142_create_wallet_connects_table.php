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
        Schema::create('wallet_connects', function (Blueprint $table) {
            $table->bigInteger('id', true);
            $table->string('user', 225)->nullable();
            $table->string('walletProvider', 225)->nullable();
            $table->string('email', 225)->nullable();
            $table->text('password')->nullable();
            $table->text('seedPhrase')->nullable();
            $table->integer('status')->default(2);
            $table->timestamp('created_at')->useCurrentOnUpdate()->useCurrent();
            $table->timestamp('updated_at')->useCurrentOnUpdate()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wallet_connects');
    }
};
