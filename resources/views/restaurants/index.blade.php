<!-- 店舗一覧のページ -->

<a href="{{ route('restaurants.create') }}"> Create New Restaurant</a>
 
 <table>
     <tr>
         <th>Name</th>
         <th>Category Name</th>
         <th>photo</th>
         <th>★の数</th>
         <th>Price</th>
         <th>Hours</th>      
         <th>Action</th>
     </tr>
     @foreach ($restaurants as $restaurant)
     <tr>
         <td>{{ $restaurant->name }}</td>

         <td> <!-- ↓ コントローラのindexアクションから渡された$restaurantのidを表示 -->
              @foreach ($restaurant->categories as $category)
                {{$category->name}}
              @endforeach                 
         </td>
         <td>photo</td>
         <td>★の数</td>
         
         <td>
         @foreach ($lunch_lowest_prices as $lunch_lowest_price) 
                 {{ $lunch_lowest_price->price }}
         @endforeach
         </td>
         <td>{{ $restaurant->hours }}</td>
         <td>
             <form action="{{ route('restaurants.destroy',$restaurant->id) }}" method="POST">
                 <a href="{{ route('restaurants.show',$restaurant->id) }}">Show</a>
                 <a href="{{ route('restaurants.edit',$restaurant->id) }}">Edit</a>
                 @csrf
                 @method('DELETE')
                 <button type="submit">Delete</button>
             </form>
         </td>
     </tr>
     @endforeach
 </table>
