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
        Schema::create('latest_transactions', function (Blueprint $table) {
            $table->bigInteger('id', true);
            $table->string('name', 150);
            $table->string('amount', 150);
            $table->enum('type', ['deposit', 'withdrawal', '', '']);
            $table->string('created_at', 150)->nullable();
            $table->string('updated_at', 150)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('latest_transactions');
    }
};
