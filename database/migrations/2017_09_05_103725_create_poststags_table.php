<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePoststagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_tag', function (Blueprint $table) {
            $table->unsignedInteger('post_id');     // FK --- unsignedInteger pour un entier positif
            $table->unsignedInteger('tag_id');      // FK
            $table->unique([
                    'tag_id',
                    'post_id',]);                    // Evite les doublons dans les tags
            $table->foreign('post_id')->references('id')->on('posts')->onDelete('CASCADE');
            $table->foreign('tag_id')->references('id')->on('tags')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('post_tag');
    }
}
