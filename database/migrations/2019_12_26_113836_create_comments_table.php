<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('article_id')->unsigned();
            $table->integer('parent_id')->unsigned();
            $table->integer('first_parent')->unsigned();
            $table->integer('theme_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->boolean('status')->default(false);
            $table->text('comment')->unsigned();
            $table->integer('plus')->default(0);
            $table->integer('minus')->default(0);
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
        Schema::dropIfExists('comments');
    }
}
