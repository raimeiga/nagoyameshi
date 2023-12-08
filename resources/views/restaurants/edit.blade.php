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
            @foreach ($categories as $category) 
             <input type="checkbox" name="category_ids[]" value="{{ $category->id }}" >{{ $category->name }}
            @endforeach
     </div>

     <div>
         <strong>Price:</strong>
         <input type="text" name="price"  value="{{ $restaurant->lunch_lowest_price->price }}">
     </div>
                  
     <div>
         <strong>Hours:</strong>
         <input type="text" name="hours"  value="{{ $restaurant->hours }}">
     </div>
     
     <div>
         <strong>Holiday:</strong>
         <strong>Holiday:</strong>
         <input type="checkbox" name="holiday" value="無休" >無休
         <input type="checkbox" name="holiday" value="日曜日" >日曜日
         <input type="checkbox" name="holiday" value="月曜日" >月曜日
         <input type="checkbox" name="holiday" value="火曜日" >火曜日
         <input type="checkbox" name="holiday" value="水曜日" >水曜日
         <input type="checkbox" name="holiday" value="木曜日" >木曜日
         <input type="checkbox" name="holiday" value="金曜日" >金曜日
         <input type="checkbox" name="holiday" value="土曜日" >土曜日   
     </div>
     
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