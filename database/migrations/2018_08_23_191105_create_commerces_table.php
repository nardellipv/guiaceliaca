<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommercesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commerces', function (Blueprint $table) {
            $table->increments('id');


            $table->string('name')->nullable();
            $table->string('address')->nullable();
            $table->string('phone')->nullable();
            $table->mediumText('about')->nullable();
            $table->integer('votes_positive')->default(0)->nullable();
            $table->integer('votes_negative')->default(0)->nullable();
            $table->integer('visit')->default(0);
            $table->string('web')->nullable();
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('instagram')->nullable();
            $table->string('logo')->nullable();
            $table->enum('type',['FREE','BASIC','CLASIC','PREMIUM'])->default('FREE');
            $table->string('slug', 150)->nullable()->unique();

            $table->integer('user_id')->unsigned();
            $table->integer('province_id')->unsigned()->nullable();
            $table->integer('region_id')->unsigned()->nullable();

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
        Schema::dropIfExists('commerces');
    }
}
