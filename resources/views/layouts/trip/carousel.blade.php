<!-- **Map app -->
<section class="center slider" style="display:none;">
        @foreach ($posts as $post)    
    
            
    
        <div><img src='/postsImages/{{$post->path}}' class='sliderimg'></div>
        @endforeach
</section>