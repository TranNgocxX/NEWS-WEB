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
        Schema::create('comments', function (Blueprint $table) {
            $table->id('MaBinhLuan');
            $table->unsignedBigInteger('MaBaiViet');
            $table->unsignedBigInteger('MaNguoiDung');
            $table->text('NoiDung');
            $table->dateTime('NgayTao')->default(now());
        
            // Định nghĩa khóa ngoại
            $table->foreign('MaBaiViet')->references('MaBaiViet')->on('articles')->onDelete('cascade');
            $table->foreign('MaNguoiDung')->references('MaNguoiDung')->on('users')->onDelete('cascade');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};
