<!-- Masthead -->
<header class="masthead">
  <div class="container h-100">
    <div class="row h-100 align-items-center justify-content-center text-center">
      <div class="col-lg-10 align-self-end">
        <h1 class="text-uppercase text-white font-weight-bold">Ma plateforme de voyage</h1>
      </div>
      <div class="col-lg-8 align-self-baseline">
        
        <a class="btn btn-primary btn-xl" href="{{ url('/trips') }}">Mes voyages</a>
        <p class="text-white-75 font-weight-light m-4">Les plus récents</p>
        @foreach ($trips as $trip)
        <a class="btn btn-primary btn-xl"
          href="{{ url('/trip\\'. $trip->name .'') }}">{{$trip->name}}</a>
        @endforeach
        
      </div>
    </div>
  </div>
</header>
</br>