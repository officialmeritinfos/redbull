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
        Schema::create('deposits', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user');
            $table->string('reference', 100);
            $table->string('amount', 100);
            $table->string('cryptoAmount', 100)->nullable();
            $table->string('asset', 100);
            $table->string('details');
            $table->string('transactionHash')->nullable();
            $table->string('paymentRef', 100)->nullable();
            $table->string('paymentProof')->nullable();
            $table->integer('paymentMethod')->nullable();
            $table->integer('methodType')->nullable();
            $table->string('timeOfPayment')->nullable();
            $table->string('status')->default('2');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('deposits');
    }
};
