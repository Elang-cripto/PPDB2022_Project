<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostlandsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('postlands', function (Blueprint $table) {
            $table->id();
            $table->string('judul_utama')->nullable();
            $table->text('judul_sub')->nullable();
            $table->string('img_utama')->nullable();
            $table->text('about_us')->nullable();
            $table->text('judul_post1')->nullable();
            $table->text('isi_post1')->nullable();
            $table->string('img_post1')->nullable();
            $table->text('judul_post2')->nullable();
            $table->text('isi_post2')->nullable();
            $table->string('img_post2')->nullable();
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
        Schema::dropIfExists('postlands');
    }
}
