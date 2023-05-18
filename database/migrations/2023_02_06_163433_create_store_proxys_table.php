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
        Schema::create('store_proxys', function (Blueprint $table) {
            $table->id();
            $table->string('proxy_id')->unique();
            $table->string('username');
            $table->string('password');
            $table->string('proxy_address');
            $table->string('port');
            $table->boolean('valid');
            $table->string('last_verification');
            $table->string('country_code');
            $table->string('city_name');
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
        Schema::dropIfExists('store_proxys');
    }
};
