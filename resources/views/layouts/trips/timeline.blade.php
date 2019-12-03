<section class="cd-timeline js-cd-timeline">
  <div class="container max-width-lg cd-timeline__container">

    @foreach ($trips as $trip)
    <div class="cd-timeline__block">
      <div class="cd-timeline__img cd-timeline__img--picture">
        <i class="fas fa-2x fa-map-pin text-primary mb-0" aria-hidden="true"></i>
      </div> <!-- cd-timeline__img -->

      <div class="cd-timeline__content text-component">
        <h2>{{$trip->name}}</h2>
        <p class="color-contrast-medium">{{ $trip['text_'.App::getLocale()]}}</p>
        <a class="mt-2" href="{{ url('/trip\\'. $trip->name .'') }}" class="btn btn--subtle">
        <img class="d-block w-100" id="tripImg" src="tripImages/{{$trip->path}}" alt=""></a>
        <div class="flex justify-between items-center">
          <span class="cd-timeline__date">{{date('y-m', strtotime($trip->date))}}</span>
        
        <a class="mt-2 btn btn-primary" href="{{ url('/trip\\'. $trip->name .'') }}" class="btn btn--subtle">{{ __("trips.more")}}</a>
        </div>
      </div> <!-- cd-timeline__content -->
    </div> <!-- cd-timeline__block -->

    @endforeach


  </div>
</section> <!-- cd-timeline -->