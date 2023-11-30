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
        Schema::create('events', function (Blueprint $table) {
            $table->id('id');
            //Foreign keys
            //TODO delete nullable
            $table->unsignedBigInteger('host_id')->nullable();
            $table->unsignedBigInteger('category_id')->nullable();
            $table->unsignedBigInteger('venue_id')->nullable();
            $table->unsignedBigInteger('price_category_id')->nullable();

            //$table->foreign('host_id')->references('id')->on('users')->onDelete('cascade');
            //$table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            //$table->foreign('venue_id')->references('id')->on('venues')->onDelete('cascade');

            //Other atributes
            $table->text('website') -> nullable();
            $table->string('logo') -> nullable();
            $table->string('name');
            $table->dateTime('start_time');
            $table->dateTime('end_time');
            $table->integer('capacity')->nullable();
            $table->string('description')->nullable();
            $table->boolean('approved')->nullable();
            $table->boolean('requested_approval')->nullable();
            $table->integer('base_price')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
