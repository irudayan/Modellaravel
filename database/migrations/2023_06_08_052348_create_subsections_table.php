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
        Schema::create('subsections', function (Blueprint $table) {
            $table->id();
            // $table->string('mainsectionname');
            $table->string('subsectionname')->nullable();
            $table->string('description')->nullable();
            $table->unsignedBigInteger('section_id');
            $table->timestamps();       
            $table->foreign('section_id')->references('id')->on('mainsection')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subsections');
    }
};
