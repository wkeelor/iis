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
        Schema::create('order_item', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('order_id');
            $table->unsignedBigInteger('price_id');
            $table->foreign('order_id')->references('id')->on('order_table')->onDelete('cascade');
            $table->foreign('price_id')->references('id')->on('price_type')->onDelete('cascade');
            $table->integer('quantity');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        schema::dropIfExists('order_item');
    }
};
