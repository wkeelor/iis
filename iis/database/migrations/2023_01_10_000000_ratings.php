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
        Schema::create('ratings', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('event_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('event_id')->references('id')->on('events')->onDelete('cascade');

            $table->string('message');
            $table->integer('rating');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        schema::dropIfExists('ratings');
    }
};
