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
        Schema::dropIfExists('lunch_lowest_prices');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::create('lunch_lowest_prices', function (Blueprint $table) {
            $table->id();
            $table->integer('price')->unsigned(); //各店舗の昼の最低価格
            // ↓ 親モデルの小文字クラス名に「_id」という接尾辞を付けることで、Restaurantモデルに対する外部キーカラムを設定 
            $table->integer('restaurant_id')->unsigned(); 
            $table->timestamps();
        });
    }
};
