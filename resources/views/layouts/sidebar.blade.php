<div class="col-lg-4">

    <div class="sidebar">

      <h3 class="sidebar-title">Search</h3>
      <div class="sidebar-item search-form">
        <form action="{{Route('blog.search')}}" method="GET">
          <input type="text"name="cari">
          <button type="submit"><i class="bi bi-search"></i></button>
        </form>
      </div><!-- End sidebar search formn-->


      <h3 class="sidebar-title">Recent Posts</h3>
      <div class="sidebar-item recent-posts">
        @foreach ($postsRecent as $post)
        <div class="post-item clearfix">
          <img src="{{$post->image}}" alt="">
          <h4><a href="{{Route('blog.detail',['blog'=>$post->pslug])}}">{{Str::limit($post->ptitle,70)}}</a></h4>
          <time datetime="{{date("Y-m-d",strtotime($post->ptime))}}">{{date("Y-m-d",strtotime($post->ptime))}}</time>
        </div>
@endforeach
        

      </div><!-- End sidebar recent posts-->

   

    </div><!-- End sidebar -->

  </div><!-- End blog sidebar -->