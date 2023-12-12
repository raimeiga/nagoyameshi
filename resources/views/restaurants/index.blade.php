<!-- 店舗一覧のページ -->
@extends('layouts.app')
 
 @section('content')
 <a href="{{ route('restaurants.create') }}"> Create New Restaurant</a>

 <div class="row">
     <div class="col-9">
         <div class="container mt-4">
             <div class="row w-100">
                 @foreach($restaurants as $restaurant)
                 <div class="col-3">
                     <a href="{{route('restaurants.show', $restaurant)}}">
                         <img src="{{ asset('img/dummy.png')}}" class="img-thumbnail">
                     </a>
                     <div class="row">
                         <div class="col-12">
                             <p class="samuraimart-product-label mt-2">
                                 {{$restaurant->name}}<br>
                                 @foreach ($restaurant->categories as $category)
                                    {{$category->name}}<br>
                                 @endforeach
                                 <label>￥{{$restaurant->price}}</label>
                             </p>
                         </div>
                     </div>
                 </div>
                 @endforeach
             </div>
         </div>
     </div>
 </div>
 @endsection