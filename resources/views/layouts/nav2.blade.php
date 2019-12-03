<!-- Navigation -->

<div class="back-button" style="z-index:100;">
    <a class="navbar-brand js-scroll-trigger" href="{{ redirect()->getUrlGenerator()->previous() }}"><i
            class="fas fa-2x fa-chevron-left"></i></a>
</div>

<div class="language" style="z-index:100;">
    @if (App::getLocale() == "fr")
    <a href="{{ url('locale/en') }}">EN</a>
    @else
    <a href="{{ url('locale/fr') }}">FR</a>
    @endif
</div>