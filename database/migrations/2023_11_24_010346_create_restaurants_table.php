<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('restaurants', function (Blueprint $table) {
            $table->id();
            $table->string('name'); //店名
            $table->text('description'); //説明
            $table->integer('price')->unsigned(); //予算「～」がつくが、integerでいいのか？ unsignedを書くことで、マイナスの値が保存できないようにする
            $table->time('hours');  // 予約時が営業時間内か否かを判断する設定にするなら、inetgerでなく、timeのほうがよいらしい。
            $table->text('address');  //住所は、「〒」や数字が入るが、textでいいのか？
            $table->string('phone'); //電話番号
            $table->string('holiday'); //定休日
            $table->timestamps();  //作成日時・更新日時　　timestampがある　営業時間
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('restaurants');
    }
};
