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
        Schema::create('investments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user');
            $table->string('amount');
            $table->string('roi');
            $table->string('reference');
            $table->string('source');
            $table->string('profitPerReturn');
            $table->string('currentProfit');
            $table->string('nextReturn');
            $table->string('currentReturn');
            $table->string('returnType');
            $table->string('numberOfReturns');
            $table->string('duration', 50)->nullable();
            $table->integer('package');
            $table->string('asset', 200)->nullable();
            $table->string('wallet', 200)->nullable();
            $table->string('timeWithdrawCapital', 120)->nullable();
            $table->string('service', 200)->nullable();
            $table->integer('status')->default(2);
            $table->integer('capitalReturned')->default(2);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('investments');
    }
};
