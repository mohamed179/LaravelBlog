<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateStatusImageLikesDislikesCloumnsInPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->boolean('status')->default(0)->change();
            $table->string('image', 255)->nullable()->change();
            $table->integer('likes')->default('0')->change();
            $table->integer('dislikes')->default('0')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->boolean('status')->change();
            $table->string('image', 255)->change();
            $table->integer('likes')->change();
            $table->integer('dislikes')->change();
        });
    }
}
