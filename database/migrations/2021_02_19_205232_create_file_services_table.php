<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFileServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('file_services', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sahip');
            $table->string('filename');
            $table->string('fileurl');
            $table->foreignId('file')->default(0);
            $table->bigInteger('filesize');
            $table->json('subfile')->nullable();
            $table->jsonb('access');
            $table->boolean('isyedek');
            $table->enum('yedekaralik', ['ay', 'yil', 'gun', 'saat', 'dakika', 'hicbiri'])->default('hicbiri');
            $table->date('sonyedek')->nullable();
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
        Schema::dropIfExists('file_services');
    }
}
