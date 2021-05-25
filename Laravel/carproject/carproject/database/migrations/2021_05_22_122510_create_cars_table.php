<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('founded');
            $table->longText('description');
            $table->timestamps();
        });

        Schema::create('car_models', function(Blueprint $table){
            $table->increments('id');
            $table->unsignedInteger('car_id'); // Refers to the id above
            $table->string('model_name');
            $table->timestamps();
            $table->foreign('car_id')->references('id')->on('cars')->onDelete('cascade'); //Here we are saying that the unsignedInteger is our foreign key that makes reference to the id in the car table above
            // The onDelete('cascade') function deletes all columns that make reference to a specific car. You can also set the 'cascade' to 'set null' if the model or cars are deleted from the DB. 

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cars');
    }
}
