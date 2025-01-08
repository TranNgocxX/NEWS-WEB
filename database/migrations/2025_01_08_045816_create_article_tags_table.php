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
        Schema::create('article_tags', function (Blueprint $table) {
                $table->unsignedBigInteger('MaBaiViet');
                $table->unsignedBigInteger('MaThe');
                $table->primary(['MaBaiViet', 'MaThe']);
                
                // Định nghĩa khóa ngoại
                $table->foreign('MaBaiViet')->references('MaBaiViet')->on('articles')->onDelete('cascade');
                $table->foreign('MaThe')->references('MaThe')->on('tags')->onDelete('cascade');
                
                $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('article_tags');
    }
};
