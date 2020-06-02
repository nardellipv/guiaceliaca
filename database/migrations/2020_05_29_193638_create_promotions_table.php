<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePromotionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('promotions', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('name');
            $table->string('text');
            $table->integer('percentage')->nullable();
            $table->date('end_date');

            $table->integer('picture_id')->unsigned();
            $table->integer('commerce_id')->unsigned();

            $table->timestamps();

            //relaciones

            $table->foreign('picture_id')->references('id')->on('pictures')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('commerce_id')->references('id')->on('commerces')
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
        Schema::dropIfExists('promotions');
    }
}
