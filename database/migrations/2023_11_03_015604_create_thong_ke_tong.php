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
        Schema::create('thong_ke_tongs', function (Blueprint $table) {
            $table->id();
            $table->bigInteger("tienChi")->default(0);
            $table->bigInteger("tienThu")->default(0);
            $table->bigInteger("doanhThu")->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('thong_ke_tong');
    }
};
