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
        Schema::create('event_img', function (Blueprint $table) {
            $table->id();
            //Foreign keys
            $table->foreign('event_id')->references('id')->on('events')->onDelete('cascade');
            //Other atributes
            $table->string('path');
          
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        schema::dropIfExists('event_img');
    }
};
