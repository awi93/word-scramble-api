<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserPoints extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_points', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->bigInteger('user_id');
            $table->integer('point');
            $table->string('ref_id');
            $table->string('ref_type');
            $table->timestamps();
            $table->string('created_by')->nullable(true);
            $table->string('updated_by')->nullable(true);

            $table->foreign('user_id')
                ->on('users')
                ->references('id')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_points');
    }
}
