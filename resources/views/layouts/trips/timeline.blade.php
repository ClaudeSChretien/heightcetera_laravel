<section class="cd-timeline js-cd-timeline">
  <div class="container max-width-lg cd-timeline__container">

    @foreach ($trips as $trip)
    <div class="cd-timeline__block">
      <div class="cd-timeline__img cd-timeline__img--picture">
        <i class="fas fa-2x fa-walking text-primary mb-0" aria-hidden="true"></i>
      </div> <!-- cd-timeline__img -->

      <div class="cd-timeline__content text-component">
        <h2>{{$trip->name}}</h2>
        <p class="color-contrast-medium">{{$trip->text_fr}}</p>
        <img class="d-block w-100" src="tripImages/{{$trip->path}}" alt="">
        <div class="flex justify-between items-center">
          <span class="cd-timeline__date">{{date('y-m', strtotime($trip->date))}}</span>
          <a href="{{ url('/trip\\'. $trip->name .'') }}" class="btn btn--subtle">Plus</a>
        </div>
      </div> <!-- cd-timeline__content -->
    </div> <!-- cd-timeline__block -->

    @endforeach


  </div>
</section> <!-- cd-timeline -->
<script src="/js/main.js"></script>