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
         <strong>Category:</strong>
         <select name="category_id"> 
         @foreach ($categories as $category)  
             <!-- このコードは何？samuraimartとは仕様が異なり、naoyameshiではカテゴリと店舗の関係が多対多なので、どう書いたらいいかわからん -->
             @if ($category->id == $restaurant->category_id)
                 <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
             @else
                 <option value="{{ $category->id }}">{{ $category->name }}</option>
             @endif
         @endforeach
         </select>
     </div>

     <div>
         <strong>Price:</strong>
         <input type="number" name="price"  value="{{ $restaurant->price }}">
     </div>
                  
     <div>
         <strong>Hours:</strong>
         <input type="number" name="hours"  value="{{ $restaurant->hours }}">
     </div>
     
     <div>
         <strong>Holiday:</strong>
         <input type="text" name="holiday" value="{{ $restaurant->holiday }}" placeholder="Holiday">
     </div>
     
     <div>
         <strong>Description:</strong>
         <textarea style="height:150px" name="description" placeholder="description">{{ $restaurant->description }}</textarea>
     </div>
     
     <div>
         <strong>address:</strong>
         <input type="text" name="address" value="{{ $restaurant->address }}" placeholder="Address">
     </div>

     <div>
         <strong>Phone:</strong>
         <input type="number" name="phone"  value="{{ $restaurant->phone }}">
     </div>

     <div>
         <button type="submit">Submit</button>
     </div>
 
 </form>