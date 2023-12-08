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
            <!--↓ $categoriesは、RestaurantControllerのcreateアクションから渡されたCategoryモデルのインスタンス（categoriesテーブルの全カラム） -->
            @foreach ($categories as $category) 
            <input type="checkbox" name="category_ids[]" value="{{ $category->id }}" >{{ $category->name }}
            @endforeach
                    
            <!-- 店とカテゴリは「多対多」。チェックボックスに複数チェックが入ると、value属性の値{{ $category->id }}にチェックしたカテゴリのidが格納される。
                 このように、複数のvalue属性の値を受け取るには、name属性の値に[]（角括弧）をつけて配列にする。
                 つまりname属性の値をcategory_ids[]にして,value属性の値を$category->id にする。
                 あとは、コントローラのstoreアクションに$request->input('category_ids')を記述することで、チェックしたカテゴリの
 　              IDの配列が取得できる。 -->
     </div>
     <div>       
         <strong>Lunch_lowest_price:</strong>
         <select name="lunch_lowest_price_id">
              @foreach ($lunch_lowest_prices as $lunch_lowest_price) 
                 <option value="{{ $lunch_lowest_price->id }}">{{ $lunch_lowest_price->price }}</option>
              @endforeach
         </select>      
     </div> 
     
     <div>
         <strong>Hours:</strong>
         <input type="text" name="hours" placeholder="Hours">
     </div>

     <div>
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