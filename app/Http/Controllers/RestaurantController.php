<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use App\Models\Category;  
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {    //途中で、$restaurants = Restaurant::with('categories')->get();に書き換えたけど、換えた理由がわからない。一応残しとく。
         $restaurants = Restaurant::all();         
         return view('restaurants.index', compact('restaurants'));         
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   //コードのトップの方でCategoryモデルのuse宣言してるので、Categoriesテーブルから、すべてのデータをインスタンスのコレクションとして取得
        $categories = Category::all(); 
        
        return view('restaurants.create', compact('categories')); //1行前の$categoriesをcreate.blade.phpに渡す
    }
    
    /**
     * Store a newly created resource in storage.
     *  
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, category $category) 
    {
         $restaurant = new Restaurant();
         $restaurant->name = $request->input('name');
         $restaurant->price = $request->input('price');
         $restaurant->hours = $request->input('hours');
         $restaurant->holiday = $request->input('holiday');
         $restaurant->description = $request->input('description');
         $restaurant->address = $request->input('address');
         $restaurant->phone = $request->input('phone');
         $restaurant->save();
            
         $restaurant->categories()->sync($request->input('category_ids')); 
            /*↑ 中間テーブルへの保存　sync()メソッド＝引数には紐付けたいリレーション先のIDを指定
                sync()メソッドの引数に$request->input('category_ids')を渡すことで、その店（restaurant）と
                チェックされたカテゴリ（category）を紐付けて中間テーブルに保存できる                
                「category_ids」（複数形）で記述しないと、中間テーブルにも保存されず、indexにも反映されない */
         return to_route('restaurants.index');  //←to_route()の第２引数にcompact('restaurant')入れたほうがいいのか？
         
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function show(Restaurant $restaurant)
    {   
        // ↓ restauransとreviewsテーブルは別なので、「->」でつないで、get();で全てのデータを取得
        $reviews = $restaurant->reviews()->get();  
        return view('restaurants.show', compact('restaurant','reviews')); // 1行前の$reviewsをshow.blade.phpに渡している
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function edit(Restaurant $restaurant, category $category)
    {
        $categories = Category::all();
        $restaurants = Restaurant::all(); 
         return view('restaurants.edit', compact('restaurant', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Restaurant $restaurant)
    {    
         
         $restaurant->name = $request->input('name');
         $restaurant->price = $request->input('price');
         $restaurant->hours = $request->input('hours');
         $restaurant->holiday = $request->input('holiday');
         
         $restaurant->description = $request->input('description');
         $restaurant->address = $request->input('address');
         $restaurant->phone = $request->input('phone');
         $restaurant->update();

         $restaurant->categories()->sync($request->input('category_ids')); 

        return to_route('restaurants.index',compact('restaurant'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */

    public function destroy(Restaurant $restaurant)
    {
        $restaurant->delete();
  
         return to_route('restaurants.index');
    }
}
