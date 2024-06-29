<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateYoutubersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('youtubers', function (Blueprint $table) {
            $table->id()->comment('編號');
            $table->string('yt_name')->comment('成員');
            $table->foreignId('c_id')->comment('頻道編號');
            $table->date('year')->default('1916-01-01')->nullable()->comment('年齡');
            $table->date('onboarddate')->default('1946-06-06')->nullable()->comment('年資');
            $table->string('education')->comment('學歷');
            $table->string('country')->comment('國家');
            $table->foreign('c_id')
                ->references('id')
                ->on('channels')
                ->onDelete('cascade');
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
        Schema::dropIfExists('youtubers');
    }
}
