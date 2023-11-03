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
        Schema::create('san_phams', function (Blueprint $table) {
            $table->id();
            $table->string("ten");
            $table->string("nhaSX");
            $table->integer("namSX");
            $table->string("tonKho");
            $table->string('moTa',2000);
            $table->string("baoHanh");
            $table->bigInteger("giaBan");
            $table->bigInteger("giaNhap");
            $table->foreignId("danhMuc_id")->nullable()->constrained("danh_mucs");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('san_phams');
    }
};
