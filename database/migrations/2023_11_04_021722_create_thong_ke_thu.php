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
        Schema::create('thong_ke_thus', function (Blueprint $table) {
            $table->id();
            $table->string("tenSanPham");
            $table->bigInteger("soLuongBan");
            $table->bigInteger("giaBan");
            $table->bigInteger("tongTienBan");
            $table->foreignId("thongKeTong_id")->nullable()->constrained("thong_ke_tongs","id");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('thong_ke_thu');
    }
};
