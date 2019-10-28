<!-- Menu -->
<nav class="navbar justify-content-end bg-light rounded" id="navbarfixed">
    <div class="collapse navbar-collapse flex-grow-0" id="navbarSupportedContent">
        <ul class="navbar-nav text-right">
            <li class="nav-item active">
                <a class="nav-link" href="#">Author</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="#">About</a>
            </li>
            <li class="nav-item active">
                    <a class="nav-link" href="/trips">{{$trip->name}}</a>
                </li>
        </ul>
    </div>
    <a class="navbar-brand" href="#">Login</a>
    <label class="navbar-toggler collapsed text-right" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="icon-bar top-bar"></span>
        <span class="icon-bar middle-bar"></span>
        <span class="icon-bar bottom-bar"></span>
    </label>
</nav>
<!-- **Menu -->