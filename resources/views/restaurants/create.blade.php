@extends('layouts.app')
 
 @section('content')
 <div class="container">
     <h1>新しい店舗を追加</h1>
 
     <form action="{{ route('restaurants.store') }}" method="POST">
         @csrf
         <div class="form-group">
             <label for="restaurant-name">店名</label>
             <input type="text" name="name" id="restaurant-name" class="form-control">
         </div>       

        <div class="form-group">
        <label for="restaurant-category">カテゴリ</label><br>
            <!--↓ $categoriesは、RestaurantControllerのcreateアクションから渡されたCategoryモデルのインスタンス（categoriesテーブルの全カラム） -->
            @foreach ($categories as $category) 
            <input type="checkbox" name="category_ids[]" value="{{ $category->id }}" >{{ $category->name }}
            @endforeach
        </div>

         <div class="form-group">
             <label for="restaurant-price">予算</label>
             <input type="number" name="price" id="restaurant-price" class="form-control">
         </div>
         
         <div class="form-group">
             <label for="restaurant-hours">営業時間</label>
             <input type="text" name="hours" id="restaurant-hours" class="form-control">
         </div>

         <div class="form-group">
             <label for="restaurant-holiday">定休日</label>
             <input type="text" name="holiday" id="restaurant-holiday" class="form-control">
         </div>

         <div class="form-group">
             <label for="restaurant-description">説明</label>
             <textarea name="description" id="restaurant-description" class="form-control"></textarea>
         </div>
        
         <div class="form-group">
             <label for="restaurant-address">住所</label>
             <input type="text" name="address" id="restaurant-address" class="form-control">
         </div>

         <div class="form-group">
             <label for="restaurant-phone">電話番号</label>
             <input type="tel" name="phone"" id="restaurant-phone"" class="form-control">
         </div>


         

         <button type="submit" class="btn btn-success">商品を登録</button>

     </form>
 
     <a href="{{ route('restaurants.index') }}">商品一覧に戻る</a>
 </div>
 @endsection