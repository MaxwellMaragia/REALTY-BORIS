<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->string("location");
            $table->string("price");
            $table->string("deposit")->nullable();
            $table->integer("bedroom")->nullable()->default("0");
            $table->integer("bathroom")->nullable()->default("0");
            $table->string("Property_status");
            $table->string("image");
            $table->boolean("featured")->nullable()->default("0");
            $table->boolean("banner")->nullable()->default("0");
            $table->string('banner_image')->nullable();
            $table->boolean("status")->nullable()->default("0");;
            $table->longText("description")->index();
            $table->longText("Keywords");
            $table->string('meta_title')->nullable();
            $table->string('meta_description')->nullable();
            $table->string('meta_keywords')->nullable();
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
        Schema::dropIfExists('properties');
    }
}
