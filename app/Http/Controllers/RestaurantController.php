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
    {
        // $restaurants = Restaurant::all();
        $restaurants = Restaurant::with('categories')->get();
         return view('restaurants.index', compact('restaurants'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
  
         return view('restaurants.create', compact('categories'));
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
 
         $restaurant->categories()->sync($request->input('category_id'));

         return to_route('restaurants.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function show(Restaurant $restaurant,category $category)
    {   
        return view('restaurants.show', compact('restaurant'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function edit(Restaurant $restaurant)
    {
        $categories = Category::all();
  
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

        return to_route('restaurants.show',compact('restaurant'));
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
