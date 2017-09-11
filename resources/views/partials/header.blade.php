<header>

    <nav class="navbar navbar-expand-lg navbar-dark elegant-color-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="/">Tom's Movie Manager</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/list">Movies</a>
                    </li>
                    <li class="nav-item">
                        @if (!$user)
                            <a class="nav-link" href="/login/github">Login with Github</a>
                        @endif
                    </li>
                </ul>
            </div>
        </div>
    </nav>

</header>
