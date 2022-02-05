@props(['recentposts'])

<div class="side">
    <h3 class="sidebar-heading">Recent Blog</h3>
    @foreach ($recentposts as $recentpost)
        <div class="f-blog">
            <a href="{{ route('post.show', $recentpost)}}" class="blog-img" style="background-image: url({{ asset($recentpost->image->path)}});">
            </a>
            <div class="desc">
                <p class="admin"><span>{{$recentpost->created_at->diffforhumans()}}</span></p>
                <h2><a href="{{ route('post.show', $recentpost)}}">{{ Str::limit($recentpost->title,15)}}</a></h2>
                <p>{{ Str::limit($recentpost->body,50)}}</p>
            </div>
        </div>
    @endforeach
</div>
