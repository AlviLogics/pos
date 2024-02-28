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
        Schema::create('bank_books', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('credit_account_id');
            $table->unsignedBigInteger('debit_account_id');
            $table->double('credit_amount');
            $table->double('debit_amount');
            $table->text('description')->nullable();
            $table->timestamps();

            $table->foreign('credit_account_id')->references('id')->on('accounts');
            $table->foreign('debit_account_id')->references('id')->on('accounts');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bank_books');
    }
};
