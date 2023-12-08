<!-- 店舗詳細画面 -->
<div>
     <h2> Show Restaurant</h2>
 </div>
 <div>
     <a href="{{ route('restaurants.index') }}"> Back</a>
 </div>
 
 <div>
     <strong>Name:</strong>
     {{$restaurant->name}}
 </div>
 
 <div>
     <strong>Category:</strong>
     @foreach ($restaurant->categories as $category)
                {{$category->name}}
     @endforeach 
 </div>

 <div>
     <strong>Price:</strong>
     {{$restaurant->lunch_lowest_price_id}} 
 </div>

 <div>
     <strong>Hours:</strong>
     {{$restaurant->hours}}
 </div>

 <div>
     <strong>Holiday:</strong>
     {{$restaurant->holiday}}
 </div>

 <div>
     <strong>Description:</strong>
     {{$restaurant->description}}
 </div>
 <div>
     <strong>Address:</strong>
     {{$restaurant->address}}
 </div>
 <div>
     <strong>Phone:</strong>
     {{$restaurant->phone}}
 </div>

<td>
  <a href="{{ route('restaurants.edit',$restaurant->id) }}">Edit</a>
</td>
 
 