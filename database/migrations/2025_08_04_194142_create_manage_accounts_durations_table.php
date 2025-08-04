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
        Schema::create('manage_accounts_durations', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('duration', 150)->nullable();
            $table->string('title', 100)->nullable();
            $table->string('amount', 150)->nullable();
            $table->string('created_at', 150)->nullable();
            $table->string('updated_at', 150)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('manage_accounts_durations');
    }
};
