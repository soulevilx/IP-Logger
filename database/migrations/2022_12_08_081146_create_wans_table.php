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
        Schema::create('wans', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->string('package');
            $table->string('isp');
            $table->string('current_ip')->nullable();
            $table->unsignedInteger('contract_speed');
            $table->unsignedInteger('download')->nullable();
            $table->unsignedInteger('upload')->nullable();

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
        Schema::dropIfExists('wans');
    }
};
