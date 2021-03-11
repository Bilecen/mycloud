<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDosyaServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dosya_services', function (Blueprint $table) {
            $table->id();
            $table->foreignId('file');
            $table->string('ismi');
            $table->bigInteger('boyut');
            $table->jsonb('access')->nullable();
            $table->string('uzantisi')->nullable();
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
        Schema::dropIfExists('dosya_services');
    }
}
