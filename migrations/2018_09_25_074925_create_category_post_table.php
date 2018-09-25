<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoryPostTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('category_post', function (Blueprint $table) {
            $table->unsignedInteger('category_id');
            $table->unsignedInteger('post_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('category_post');
    }
}
