<!-- お気に入り店舗一覧 -->
@extends('layouts.app')
 
 @section('content')
 <div class="container  d-flex justify-content-center mt-3">
     <div class="w-75">
         <h1>お気に入り店舗一覧</h1>
 
         <hr>
 
         <div class="row">
             @foreach ($favorites as $fav)
             <div class="col-md-7 mt-2">
                 <div class="d-inline-flex">
                     <a href="{{route('restaurants.show', $fav->favoriteable_id)}}" class="w-25">
                         <img src="{{ asset('img/dummy.png')}}" class="img-fluid w-100">
                     </a>
                     <div class="container mt-3">
                         <h5 class="w-100 samuraimart-favorite-item-text">店舗名：{{App\Models\Restaurant::find($fav->favoriteable_id)->name}}</h5>                   
                         <h6 class="w-100 samuraimart-favorite-item-text">カテゴリ：
                            <!-- ↓ Restaurantモデル（restaurantテーブル）と紐づくCategoryモデル（categoriesテーブル）から$category->nameを引っ張ってきた書き方 -->
                            @foreach (App\Models\Restaurant::find($fav->favoriteable_id)->categories as $category)
                                {{ $category->name }}
                            @endforeach
                         </h6>                
                         <h6 class="w-100 samuraimart-favorite-item-text">予算：&yen;{{App\Models\Restaurant::find($fav->favoriteable_id)->price}}</h6>
                         <h6 class="w-100 samuraimart-favorite-item-text">営業時間：{{App\Models\Restaurant::find($fav->favoriteable_id)->hours}}</h6>
                     </div>
                 </div>
             </div>
             <div class="col-md-2 d-flex align-items-center justify-content-end">
                 <a href="{{ route('restaurants.favorite', $fav->favoriteable_id) }}" class="samuraimart-favorite-item-delete">
                     削除
                 </a>
             </div>
             
             @endforeach
         </div>
 
         <hr>
     </div>
 </div>
 @endsection