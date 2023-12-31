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
         <strong>price:</strong>
         <input type="text" name="price" placeholder="price">
     </div> 
     
     <div>
         <strong>Hours:</strong>
         <input type="text" name="hours" placeholder="Hours">
     </div>

     <div>
        <strong>Holiday:</strong>
        <input type="text" name="Holiday" placeholder="Holiday">      
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