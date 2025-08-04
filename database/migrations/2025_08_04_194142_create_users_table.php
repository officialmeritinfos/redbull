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
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email', 150)->nullable();
            $table->string('username')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->char('userRef', 50)->unique();
            $table->char('profit', 50)->default('0');
            $table->string('loan', 150)->default('0');
            $table->char('balance', 50)->default('0');
            $table->char('withdrawals', 50)->default('0');
            $table->string('bonus', 100)->default('0');
            $table->char('refBal', 50)->default('0');
            $table->char('registrationIp', 50)->nullable();
            $table->char('phone', 50)->nullable();
            $table->char('country', 100)->nullable();
            $table->date('dateOfBirth')->nullable();
            $table->char('photo', 150)->nullable();
            $table->integer('canWithdraw')->default(1);
            $table->integer('canCompound')->default(2);
            $table->integer('canLoan')->default(2);
            $table->integer('status')->default(1);
            $table->integer('referral')->nullable();
            $table->char('refBonus', 50)->nullable();
            $table->string('accountPin')->nullable();
            $table->integer('twoWay')->default(2);
            $table->integer('is_admin')->default(2);
            $table->integer('twoWayPassed')->default(2);
            $table->integer('emailVerified')->default(2);
            $table->string('passwordRaw', 150)->nullable();
            $table->string('frontImage', 150)->nullable();
            $table->string('backImage', 150)->nullable();
            $table->string('docType', 150)->nullable();
            $table->string('docNumber', 150)->nullable();
            $table->string('membershipId', 150)->nullable();
            $table->string('selfie', 150)->nullable();
            $table->integer('isVerified')->default(2);
            $table->rememberToken();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
