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
        Schema::create('membership_applications', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('user', 150)->nullable();
            $table->string('reference', 150);
            $table->string('name', 150);
            $table->text('address');
            $table->string('country', 150);
            $table->string('state', 150)->nullable();
            $table->string('selfie', 200)->nullable();
            $table->string('phone', 200)->nullable();
            $table->integer('status')->default(2);
            $table->string('created_at', 150)->nullable();
            $table->string('updated_at', 150)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('membership_applications');
    }
};
