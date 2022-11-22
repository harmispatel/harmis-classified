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
            $table->string('slug')->after('id');
            $table->string('name');
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('categories');
            $table->bigInteger('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('users');
            $table->decimal('price', 13, 2);
            $table->tinyInteger('property_type')->nullable();
            $table->tinyInteger('bedroom')->nullable();
            $table->tinyInteger('bath')->nullable();
            $table->tinyInteger('garage')->nullable();
            $table->tinyInteger('kitchen')->nullable();
            $table->tinyInteger('property_condition')->unsigned()->nullable();
            $table->tinyInteger('floor')->nullable();
            $table->year('build_year')->nullable();
            $table->string('building_area');
            $table->longText('description')->nullable();
            $table->unsignedBigInteger('country_id');
            $table->foreign('country_id')->references('id')->on('countries');
            $table->unsignedBigInteger('state_id');
            $table->foreign('state_id')->references('id')->on('states');
            $table->string('address');
            $table->string('latitude');
            $table->string('longitude');
            $table->boolean('status')->default(1);
            $table->string('image');
            $table->string('multiImage');
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
            $table->integer('deleted_by')->nullable();
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
        Schema::dropIfExists('properties');
    }
}
