<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('posts.index') }}">Posts</a>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                </li>

            </ul>

        </div>
        @auth
            <div class="float-end">
                <ul class="list-group list-group-horizontal">
                    <li class="list-group-item"><span>{{ auth()->user()->name }}</span> ({{ auth()->user()->email }})</li>
                    <li class="list-group-item"><a class="nav-link" href="{{ route('logout') }}">Logout</a></li>
                </ul>
            </div>
        @endauth
    </div>
</nav>
