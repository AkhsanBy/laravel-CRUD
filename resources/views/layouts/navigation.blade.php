<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid mx-5">
        <a class="navbar-brand" href="{{ route('home') }}">Laravel8</a>
        <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-link" aria-current="page" href="{{ route('post') }}">Posts</a>
            </div>
        </div>
    </div>
</nav>