<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSanphamTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sanpham', function (Blueprint $table) {
            $table->id();
            $table->string('tensp', 255)->nullable();
            $table->text('mota')->nullable();
            $table->text('noidung')->nullable();
            $table->string('hinhanh', 255)->nullable();
            $table->text('thuvienanh')->nullable();
            $table->integer('giaban')->nullable();
            $table->integer('soluong')->nullable();
            $table->string('cpu', 255)->nullable();
            $table->string('ram', 255)->nullable();
            $table->string('ocung', 255)->nullable();
            $table->string('carddohoa', 255)->nullable();
            $table->string('manhinh', 255)->nullable();
            $table->string('pin', 255)->nullable();
            $table->string('trongluong', 255)->nullable();
            $table->string('mausac', 255)->nullable();
            $table->string('kichthuoc', 255)->nullable();
            $table->integer('noibat')->nullable();
            $table->integer('hienthi')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sanpham');
    }
}
