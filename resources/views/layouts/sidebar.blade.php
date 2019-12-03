<div class="col-sm-3 blog-sidebar">
    <div class="sidebar-module sidebar-module-inset">
        <h4>About</h4>
        <p>Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>
    </div>
    <div class="sidebar-module">
        <h4>Oznake</h4>
        <ol class="list-unstyled">
            @foreach ($tags as $tag)
                <li><a href="{{ route('tags.index', $tag) }}">{{ $tag }}</a></li>
            @endforeach        
        </ol>
    </div>
    <div class="sidebar-module">
        <h4>Popular posts</h4>
        <ol class="list-unstyled">
            @foreach ($popularPosts as $post)
                <li><a href="{{ route('posts.show', $post) }}">{{ $post->title }}</a></li>
            @endforeach  
        </ol>
    </div>
</div><!-- /.blog-sidebar -->