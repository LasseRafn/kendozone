<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->timestamps();
            $table->engine = 'InnoDB';
        });

        Schema::create('category_tournament', function (Blueprint $table) {

            $table->integer('tournament_id')->unsigned()->index();
            $table->integer('category_id')->unsigned()->index();

            $table->primary(array('tournament_id', 'category_id'));
            $table->foreign('tournament_id')
                ->references('id')
                ->on('tournament')
                ->onDelete('cascade');

            $table->foreign('category_id')
                ->references('id')
                ->on('category')
                ->onDelete('cascade');

            $table->timestamps();
            $table->engine = 'InnoDB';


        });


        Schema::create('category_tournament_user', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('category_id')->unsigned()->index();
            $table->foreign('category_id')
                ->references('id')
                ->on('category')
                ->onDelete('cascade');

            $table->integer('tournament_id')->unsigned()->index();
            $table->foreign('tournament_id')
                ->references('id')
                ->on('tournament')
                ->onDelete('cascade');

            $table
                ->foreign(array('category_id', 'tournament_id'))
                ->references(array('category_id', 'tournament_id'))
                ->on('category_tournament')
                ->onDelete('cascade');

            $table->integer('user_id')->unsigned()->index();
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

            $table->boolean('confirmed');

            $table->timestamps();
            $table->engine = 'InnoDB';


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('category_tournament_user');
        Schema::dropIfExists('category_tournament');
        Schema::dropIfExists('category');


    }
}
