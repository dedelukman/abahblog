@props(['categories'])

<div class="side">
    <h3 class="sidebar-heading">Categories</h3>
    <div class="block-24">
   <ul>
       @foreach ($categories as $category )
            <li><a href="{{ route('category.show', $category)}}">{{$category->name}} <span>{{ $category->post_count}}</span></a></li>
       @endforeach
   </ul>
</div>
</div>
