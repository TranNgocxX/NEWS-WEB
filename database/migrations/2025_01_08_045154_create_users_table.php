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
        Schema::create('users', function (Blueprint $table) {
            $table->id('MaNguoiDung');
            $table->string('TenDangNhap', 50);
            $table->string('MatKhau', 255);
            $table->string('Email', 100)->unique();
            $table->string('VaiTro', 20);
            $table->integer('Diemtichluy')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
