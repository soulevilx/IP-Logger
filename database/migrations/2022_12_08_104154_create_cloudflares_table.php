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
        Schema::create('cloudflares', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('wan_id');
            $table->foreign('wan_id')
                ->references('id')
                ->on('wans');

            $table->string('token');
            $table->string('zone_id');
            $table->string('record_id');
            $table->string('type');
            $table->string('name');

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
        Schema::dropIfExists('cloudflares');
    }
};
