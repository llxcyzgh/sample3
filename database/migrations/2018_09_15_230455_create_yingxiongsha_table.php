<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateYingxiongshaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('yxs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->index();// 当前宝箱名称
            $table->integer('number');// 当前宝箱碎片数目
            $table->index('created_at');// 当前宝箱碎片数目
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
        Schema::dropIfExists('yxs');
    }
}
