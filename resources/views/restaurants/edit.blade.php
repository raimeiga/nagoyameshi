<!-- 店舗の編集画面 -->
<div>
     <h2>Edit Restaurant</h2>
 </div>
 <div>
     <a href="{{ route('restaurants.index') }}"> Back</a>
 </div>
 
 <form action="{{ route('restaurants.update',$restaurant->id) }}" method="POST">
     @csrf
     @method('PUT')
 
     <div>
         <strong>Name:</strong>
         <input type="text" name="name" value="{{ $restaurant->name }}" placeholder="Name">
     </div>

     <div>
         <!-- <strong>Category:</strong>
            @foreach ($categories as $category) 
             <input type="checkbox" name="category_ids[]" value="{{ $category->id }}" >{{ $category->name }}
            @endforeach
         </div> -->

     <div>
     <strong>Category:</strong>
        @foreach ($categories as $category) 
            @if($restaurant->categories()->where("category_id", $category->id)->exists())
                <input type="checkbox" name="category_ids[]" value="{{ $category->id }}" checked>{{ $category->name }}
            @else
                <input type="checkbox" name="category_ids[]" value="{{ $category->id }}" >{{ $category->name }}
            @endif
         @endforeach
     </div>

     <div>
         <strong>Holiday:</strong> 
         @foreach ($categories as $category)        
            @if($restaurant->where("holiday",$restaurant->holiday))->exists()
                <input type="checkbox" name="holiday" value="{{ $restaurant->holiday }}"checked>{{ $restaurant->holiday }}
             @else
                <input type="checkbox" name="holiday" value="{{ $restaurant->holiday }}" >{{ $restaurant->holiday }}
            @endif
         @endforeach
     </div>


     <div>
         <strong>Price:</strong>
         <input type="text" name="price"  value="{{ $restaurant->price }}">
     </div>
                  
     <div>
         <strong>Hours:</strong>
         <input type="text" name="hours"  value="{{ $restaurant->hours }}">
     </div>
<!--      
      <div>
         <strong>Holiday:</strong>
         <input type="text" name="holiday" value="{{ $restaurant->holiday }}">
     </div> -->


     <div>
         <strong>Description:</strong>
         <textarea style="height:150px" name="description" placeholder="Description">{{ $restaurant->description }}</textarea>
     </div>
     
     <div>
         <strong>Address:</strong>
         <input type="text" name="address" value="{{ $restaurant->address }}" placeholder="Address">
     </div>

     <div>
         <strong>Phone:</strong>
         <input type="tel" name="phone"  value="{{ $restaurant->phone }}">
     </div>

     <div>
         <button type="submit">Submit</button>
     </div>
 
 </form>