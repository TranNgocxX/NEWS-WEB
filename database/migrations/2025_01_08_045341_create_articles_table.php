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
        Schema::create('articles', function (Blueprint $table) {
            $table->id('MaBaiViet');
            $table->string('TieuDe', 255);
            $table->text('NoiDung');
            $table->dateTime('NgayTao')->default(now());
            $table->dateTime('NgayCapNhat')->default(now());
            $table->unsignedBigInteger('MaTacGia');
            $table->unsignedBigInteger('MaDanhMuc');
            $table->integer('LuotXem')->default(0);
            $table->boolean('DuyetBaiViet')->default(true);
            $table->foreign('MaTacGia')->references('MaNguoiDung')->on('users');
            $table->foreign('MaDanhMuc')->references('MaDanhMuc')->on('categories');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};
