<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAttendancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attendances', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id')->unsigned(); //unsigned:符号無し
            $table->foreign('user_id')->references('id')->on('users');
            //18行目で定義したuser_idに追加で設定。存在しないuser_idを定義できなくする。なくても動くけど。
            $table->dateTime('attend_time');
            $table->dateTime('leave_time')->nullable();
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
        Schema::dropIfExists('attendances');
    }
}
