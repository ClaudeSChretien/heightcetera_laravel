<!-- Portfolio Section -->
<section id="portfolio">
    <div class="container-fluid p-0">
        <div class="row no-gutters" id="macy-container">


            @foreach ($posts as $post)

            <div class="grid-item">
            <a class="portfolio-box" href="/postsImages/{{ $post->path }}">
                    <img class="img-fluid" src="/postsImages/{{ $post->path }}" alt="">
                    <div class="portfolio-box-caption">
                        <div class="project-category text-white-50">
                                {{ $post->name }}
                        </div>
                        <div class="project-name">
                                {{ $post->text_fr }}
                        </div>
                    </div>
                </a>
            </div>

            @endforeach
        </div>
    </div>
</section>