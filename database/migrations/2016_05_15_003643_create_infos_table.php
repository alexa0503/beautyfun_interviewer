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
            $table->string('name',120)->nullable();
            $table->string('mobile',40)->index()->nullable();
            $table->string('address',200)->nullable();
            $table->boolean('has_win')->index();
            $table->dateTime('created_time');
            $table->ipAddress('created_ip');
            $table->dateTime('lottery_time')->nullable();
            $table->ipAddress('lottery_ip')->nullable();
            $table->dateTime('post_time')->nullable();
            $table->ipAddress('post_ip')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('infos');
    }
}
