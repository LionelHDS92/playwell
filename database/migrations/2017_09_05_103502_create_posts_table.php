<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->unsignedInteger('user_id')->nullable(); // l'utilisateur qui rédige le post
            $table->unsignedInteger('category_id')->nullable();
            $table->string('title');
            $table->dateTime('published_at')->default(\Carbon\Carbon::now()); // insertion automatique de la date
            $table->text('content');
            
            $table->foreign('user_id')->references('id')->on('users')->onDelete('SET NULL');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('SET NULL');
            
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
        Schema::dropIfExists('posts');
    }
}
