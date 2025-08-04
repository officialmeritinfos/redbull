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
        Schema::create('manage_accounts', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('user');
            $table->string('reference', 150)->nullable();
            $table->string('duration', 150)->nullable();
            $table->string('amount', 150)->nullable();
            $table->string('accountId', 150)->nullable();
            $table->string('accountPassword', 150)->nullable();
            $table->string('accountType', 150)->nullable();
            $table->string('currency', 150)->nullable();
            $table->string('leverage', 150)->nullable();
            $table->string('server', 150)->nullable();
            $table->integer('status')->default(2);
            $table->string('expires_at', 100)->nullable();
            $table->string('started_at', 100)->nullable();
            $table->string('created_at', 150)->nullable();
            $table->string('updated_at', 150)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('manage_accounts');
    }
};
