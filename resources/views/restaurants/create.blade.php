<!-- 店舗の新規登録画面 管理者が店舗を登録するってことだよな？-->
<div>
     <h2>Add New Restaurant</h2>
 </div>
 <div>
     <a href="{{ route('restaurants.index') }}"> Back</a>
 </div>
 
 <form action="{{ route('restaurants.store') }}" method="POST">
     @csrf
 
     <div>  
         <strong>Name:</strong>
         <input type="text" name="name" placeholder="Name">
     </div>

     <div>
        <strong>Category:</strong>
            <!-- @foreach ($categories as $category)
            <input type="checkbox" name="category" value="{{ $category->id }}" >{{ $category->name }}
            @endforeach           -->
          
            @foreach ($categories as $category)
            <input type="checkbox" name="category_ids[]" value="{{ $category->id }}" >{{ $category->name }}
            @endforeach
          <!-- 居町講師のコード
          <strong>Category:</strong>
            <select multiple name="category_ids[]" >
            @foreach ($categories as $category)
            <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
         　</select> -->
     </div>
     
     <div>
         <strong>Price:</strong>
         <input type="text" name="price" placeholder="Price">
     </div>
     
     <div>
         <strong>Hours:</strong>
         <input type="text" name="hours" placeholder="Hours">
     </div>

     <div>
         <strong>Holiday:</strong>
         <input type="text" name="holiday" placeholder="Holiday">
     </div>

     <div>
         <strong>Description:</strong>
         <textarea style="height:150px" name="description" placeholder="Description"></textarea>
     </div>

     <div>
         <strong>Address:</strong>
         <input type="text" name="address" placeholder="Address">
     </div>
     
     <div>
         <strong>Phone:</strong>
         <input type="tel" name="phone" placeholder="Phone">
     </div>
     
     <div>
         <button type="submit">Submit</button>
     </div>
 
 </form>