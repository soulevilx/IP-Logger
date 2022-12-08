<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('speedtests', function (Blueprint $table) {
            $table->id();

            $table->string('ip');
            $table->json('interface');
            $table->json('ping');
            $table->unsignedBigInteger('download');
            $table->json('download_data');
            $table->unsignedBigInteger('upload');
            $table->json('upload_data');

            $table->json('server');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('speedtests');
    }
};
