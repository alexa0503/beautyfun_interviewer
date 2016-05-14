<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('infos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('wechat_users');
            $table->string('name',120);
            $table->string('mobile',40)->index();
            $table->string('address',200);
            $table->boolean('has_win')->index();
            $table->boolean('has_lottery')->index();
            $table->dateTime('created_time');
            $table->ipAddress('created_ip');
            $table->dateTime('lottery_time')->nullable();
            $table->ipAddress('lottery_ip')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //Schema::drop('infos');
        Schema::drop('infos');
    }
}
