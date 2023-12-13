<div class="container">
    @foreach ($categories as $category)
                 <label class="samuraimart-sidebar-category-label"><a href="#">{{ $category->name }}</a></label>
    @endforeach        
</div>