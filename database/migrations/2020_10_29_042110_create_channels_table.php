<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChannelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('channels', function (Blueprint $table) {
            $table->id()->comment('編號');
            $table->string('c_name',)->comment('頻道名稱');
            $table->string('category')->comment('類別');
            $table->string('fans' )->comment('粉絲數(萬)');
            $table->string('views')->comment('平均觀看量(萬)');
            $table->string('state')->comment('地區');
            /* $table->foreign('tid')
                 ->references('id')
                 ->on('teams')
                 ->onDelete('cascade');*/
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
        Schema::dropIfExists('channels');
    }
}
