<!-- Masthead -->
<div class="test"
  style="position:absolute;top:0px;left:0px;width:100%;height:100000px;background-color:red;z-index:19;overflow-y: hidden;">


  <header class="masthead">
    <div class="container h-100">
      <div class="row h-100 align-items-center justify-content-center text-center">
        <div class="col-lg-10 align-self-end">
        <h1 class="text-uppercase text-white font-weight-bold">{{ $trip->name }}</h1>
        </div>
        <div class="col-lg-8 align-self-baseline">
          <h4 class="text-white text-justify">
              @if ( Config::get('app.locale') == 'en')

              {{ $trip->text_en }}
           
              @elseif ( Config::get('app.locale') == 'fr' )
           
              {{ $trip->text_fr }}
           
              @endif
            
          
          </h4>
        </div>
      </div>
    </div>
  </header>
  </br>
</div>