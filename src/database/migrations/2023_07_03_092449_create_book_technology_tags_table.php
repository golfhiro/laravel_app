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
        Schema::create('book_technology_tags', function (Blueprint $table) {
            $table->unsignedBigInteger('book_id');
            $table->unsignedBigInteger('technology_tag_id');
            $table->primary(['book_id', 'technology_tag_id']);
            $table->foreign('book_id')->references('id')->on('books');
            $table->foreign('technology_tag_id')->references('id')->on('technology_tags');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('book_technology_tag');
    }
};
