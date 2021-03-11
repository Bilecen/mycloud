<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateURLServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('urlservicetb', function (Blueprint $table) {
            $table->id();
            $table->foreignId('fileid');
            $table->foreignId('userid');
            $table->date('starttime');
            $table->date('endtime');
            $table->integer('downloadsize')->default(0); // sıfır dan kucuk olursa sınırsız olur
            $table->boolean('isdownload')->default(false);
            $table->string('key');
            $table->string('url');
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
        Schema::dropIfExists('urlservicetb');
    }
}
