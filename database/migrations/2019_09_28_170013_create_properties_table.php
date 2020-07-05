<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->bigIncrements('id');
            $table->integer("user_id")->nullable();
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('added_by');
            $table->string('title');
            $table->string('type');
            $table->string('area_sq');
            $table->string('kitchens');
            $table->string('bedroom');
            $table->string('bathroom');
            $table->string('country')->nullable();
            $table->string('state');
            $table->string('city');
            $table->string('postal');
            $table->string('address');
            $table->string('status')->nullable();
            $table->text('description')->nullable();
            $table->integer('price');
            $table->boolean('image');
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
