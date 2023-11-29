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
        $restaurants = Restaurant::all();
 
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
    public function store(Request $request)
    {
         $restaurant = new Restaurant();
         $restaurant->name = $request->input('name');
         $restaurant->category_id = $request->input('category_id');
         $restaurant->price = $request->input('price');
         $restaurant->hours = $request->input('hours');
         $restaurant->holiday = $request->input('holiday');
         $restaurant->description = $request->input('description');
         $restaurant->address = $request->input('address');
         $restaurant->phone = $request->input('phone');
         $restaurant->save();
 
         return to_route('restaurants.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function show(Restaurant $restaurant)
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
         $restaurant->category_id = $request->input('category_id');
         $restaurant->price = $request->input('price');
         $restaurant->hours = $request->input('hours');
         $restaurant->holiday = $request->input('holiday');
         $restaurant->description = $request->input('description');
         $restaurant->address = $request->input('address');
         $restaurant->phone = $request->input('phone');
         $restaurant->update();

        return to_route('restaurants.show');
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
