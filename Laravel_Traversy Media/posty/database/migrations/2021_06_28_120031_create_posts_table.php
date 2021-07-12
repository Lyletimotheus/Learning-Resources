<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id(); // AI primary key id column
            // $table->integer('user_id')->unsigned()->index(); // Same as below
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Here we are looking into the users table under the column id
            // If we delete a user it will delete all of there posts as well
            $table->text('body');
            $table->timestamps(); // created and updated columns
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
