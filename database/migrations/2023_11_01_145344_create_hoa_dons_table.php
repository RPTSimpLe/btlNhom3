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
        Schema::create('hoa_dons', function (Blueprint $table) {
            $table->id();
            $table->string("diaChi");
            $table->string("ghiChu");
            $table->bigInteger("tongTien");
            $table->integer("ship")->default(20000);
            $table->integer("giamGia")->default(0);
            $table->string("danhGia")->nullable();
            $table->string("TrangThai")->default("Chờ xác nhận");
            $table->string("hinhThucThanhToan")->nullable();
            $table->foreignId("user_id")->nullable()->constrained()->onDelete("cascade");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hoa_dons');
    }
};
