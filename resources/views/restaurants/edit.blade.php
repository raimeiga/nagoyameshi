<!-- 店舗の編集画面 -->
@extends('layouts.app')
 
 @section('content')
 <div class="container">
     <h1>商品情報更新</h1>
 
     <form action="{{ route('restaurants.update',$restaurant->id) }}" method="POST">
         @csrf
         @method('PUT')
         <div class="form-group">
             <label for="restaurant-name">店名</label>
             <input type="text" name="name" id="restaurant-name" class="form-control" value="{{ $restaurant->name }}">
         </div>

         <div class="form-group">
             <label for="restaurant-category">カテゴリ</label>
             @foreach ($categories as $category) 
                 @if($restaurant->categories()->where("category_id", $category->id)->exists())
                    <input type="checkbox" name="category_ids[]" value="{{ $category->id }}" checked>{{ $category->name }}
                 @else
                    <input type="checkbox" name="category_ids[]" value="{{ $category->id }}" >{{ $category->name }}
                 @endif
            @endforeach             
         </div>         

         <div class="form-group">
             <label for="restaurant-holiday">定休日</label>
             <input type="text" name="holiday" id="restaurant-holiday" class="form-control" value="{{ $restaurant->holiday }}">
         </div>

         <div class="form-group">
             <label for="restaurant-price">予算</label>
             <input type="number" name="price" id="restaurant-price" class="form-control" value="{{ $restaurant->price }}">
         </div>

         <div class="form-group">
             <label for="restaurant-hours">営業時間</label>
             <input type="text" name="hours" id="restaurant-hours" class="form-control" value="{{ $restaurant->hours }}">
         </div>         

         <div class="form-group">
             <label for="restaurant-description">説明</label>
             <textarea name="description" id="restaurant-description" class="form-control">{{ $restaurant->description }}</textarea>
         </div>
         
         <div class="form-group">
             <label for="restaurant-address">住所</label>
             <input type="text" name="address" id="restaurant-address" class="form-control" value="{{ $restaurant->address }}">
         </div>
         
         <div class="form-group">
             <label for="restaurant-phone">住所</label>
             <input type="tel" name="phone" id="restaurant-phone" class="form-control" value="{{ $restaurant->phone }}">
         </div>

         <button type="submit" class="btn btn-danger">更新</button>
     </form>
 
     <a href="{{ route('restaurants.index') }}">商品一覧に戻る</a>
 </div>
 @endsection