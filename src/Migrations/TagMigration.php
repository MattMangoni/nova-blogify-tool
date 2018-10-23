<?php

namespace Mattmangoni\NovaBlogifyTool\Migrations;

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

class TagMigration
{
    public function up()
    {
        Schema::create(config('nova-blogify.table_prefix').'tags', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->text('description')->nullable();
            $table->unsignedInteger('tagged_count')->default(0);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists(config('nova-blogify.table_prefix').'tags');
    }
}
