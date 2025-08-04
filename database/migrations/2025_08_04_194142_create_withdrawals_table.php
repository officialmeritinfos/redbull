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
        Schema::create('withdrawals', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user');
            $table->string('reference');
            $table->string('amount', 100);
            $table->string('asset', 100);
            $table->string('cryptoAmount', 100)->nullable();
            $table->string('details');
            $table->string('transHash')->nullable();
            $table->string('paymentRef', 100)->nullable();
            $table->integer('status')->default(2);
            $table->string('source', 200)->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('withdrawals');
    }
};
