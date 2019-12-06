<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->increments('id');

            $table->text('title');
            $table->mediumText('body');
            $table->text('photo');
            $table->enum('status',['ACTIVE', 'DESACTIVE'])->default('ACTIVE');
            $table->tinyInteger('send')->default('0');
            $table->integer('view');
            $table->integer('like');
            $table->string('slug', 150)->unique();

            $table->integer('user_id')->unsigned();

            $table->timestamps();

            //relaciones

            $table->foreign('user_id')->references('id')->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blogs');
    }
}
