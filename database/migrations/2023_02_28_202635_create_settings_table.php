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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string("name")->default("")->nullable();
            $table->longText("description")->default("")->nullable();
            $table->string("address")->default("")->nullable();
            $table->string("phone")->default("")->nullable();
            $table->string("email")->default("")->nullable();
            $table->string("logo")->default("")->nullable();
            $table->string("favicon")->default("")->nullable();
            $table->string("facebook")->default("")->nullable();
            $table->string("twitter")->default("")->nullable();
            $table->string("instagram")->default("")->nullable();
            $table->string("youtube")->default("")->nullable();
            $table->string("tiktok")->default("")->nullable();
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
        Schema::dropIfExists('settings');
    }
};
