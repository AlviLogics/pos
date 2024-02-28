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
        Schema::create('purchases', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->unsignedBigInteger('vendor_id');
            $table->string('bill_number');
            $table->string('particular');
            $table->unsignedInteger('quantity');
            $table->unsignedBigInteger('packing_id');
            $table->decimal('rate', 10, 2);
            $table->decimal('debit', 10, 2);
            $table->decimal('credit', 10, 2);
            $table->decimal('balance', 10, 2);
            $table->timestamps();

            $table->foreign('vendor_id')->references('id')->on('vendors')->onDelete('cascade');
            $table->foreign('packing_id')->references('id')->on('packings')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchases');
    }
};
