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
        Schema::create('category_restaurant', function (Blueprint $table) {
            $table->id();
            $table->foreignId('restaurant_id')->constrained()->cascadeOnDelete();
            $table->foreignId('category_id')->constrained()->cascadeOnDelete();   
            $table->timestamps();
            // constrained()=Laravelのマイグレーションにおいて「外部キー制約」を追加するためのメソッド,参照先のテーブルとカラムを自動的に推測
            // cascadeOnDelete()=親テーブルのレコードが削除された場合に、それに関連する子テーブルのレコードも自動的に削除する
        });
    }       

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('category_restaurant');
    }
};
