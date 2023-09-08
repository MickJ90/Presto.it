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
        Schema::create('insertions', function (Blueprint $table) {
            $table->id();
            $table->string('title', 150);
            $table->unsignedBigInteger('category_id');
            $table->unsignedInteger('price');
            $table->string('description', 150);
            $table->unsignedBigInteger('user_id');
            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('categories');
            $table->foreign('user_id')->references('id')->on('users');

        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('insertions');
    
    }
};
