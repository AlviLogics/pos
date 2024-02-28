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
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->string('sale_type');
            $table->unsignedBigInteger('sale_to_id');
            $table->unsignedBigInteger('packing_id');
            $table->decimal('rate', 10, 2);
            $table->integer('quantity');
            $table->decimal('total_amount', 10, 2);
            $table->date('sale_date');
            $table->timestamps();

            $table->foreign('packing_id')->references('id')->on('packings')->onDelete('cascade');
     
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sales');
    }
};
