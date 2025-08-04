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
        Schema::create('general_settings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->char('name', 150);
            $table->char('email', 150);
            $table->char('phone', 150);
            $table->string('address');
            $table->text('address2')->nullable();
            $table->integer('notification')->default(1);
            $table->text('description')->nullable();
            $table->integer('emailVerification')->default(2);
            $table->integer('twoFactor')->default(1);
            $table->integer('registration')->default(1);
            $table->integer('withdrawal')->default(1);
            $table->integer('compounding')->default(2);
            $table->integer('paymentMethod')->default(2);
            $table->char('codeExpiration', 50)->default('24 Hours');
            $table->char('minDeposit', 50)->default('50');
            $table->char('refBonus')->nullable();
            $table->string('logo');
            $table->string('favicon');
            $table->string('logo2', 100)->nullable();
            $table->char('currency', 30);
            $table->char('currencySign', 30);
            $table->string('transferCharge', 100)->default('2');
            $table->string('telegram', 150)->nullable();
            $table->integer('signupBonus')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('general_settings');
    }
};
