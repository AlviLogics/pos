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
        Schema::create('stocks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('packing_id');
            $table->unsignedBigInteger('vendor_id')->nullable();
            $table->decimal('rate', 10, 2);
            $table->integer('quantity');
            $table->integer('total');
            $table->enum('type', ['debit', 'credit']);
            $table->timestamps();
        
            $table->foreign('packing_id')->references('id')->on('packings')->onDelete('cascade');
            $table->foreign('vendor_id')->references('id')->on('vendors')->onDelete('cascade');
        
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stocks');
    }
};
