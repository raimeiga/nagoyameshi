<!-- 店舗一覧のページ -->
@extends('layouts.app')
 
 @section('content')
  <div class="row">
     <div class="col-2">
         @component('components.sidebar', ['categories' => $categories])
         @endcomponent
     </div>
     <div class="col-9">
        <div class="container">   
             @if ($category !== null)
                 <a href="{{ route('restaurants.index') }}">トップ</a> > <a href="#">{{ $category->name }}</a> > {{ $category->name }}
                 <h1>{{ $category->name }}の店舗一覧{{$total_count}}件</h1>
             @endif        
        </div>
         <div>
            Sort By           
            @sortablelink('price', '予算')
            @sortablelink('score', '★数')
            <!-- ↑↑↑↑↑↑↑　お気に入り数でソートを効かせたいが、まだ★の数で評価する機能がないので、とりあえずカラム名は'　'としておく -->

         </div>

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
         <!-- 「次のページへ」というページネーションの表示 -->
         {{ $restaurants->links() }}
     </div>
 </div>
 @endsection