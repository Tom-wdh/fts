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
        Schema::create('trips', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('festivalid');
            $table->string('time', 5);
            $table->string('city');
            $table->decimal('price', 8, 2);
            $table->integer('points_to_give');
            
            $table->foreign('festivalid')->references('id')->on('festivals')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trips');
    }
};
