<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">DesignHub</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li>

            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li class="nav-item active">
                <a class="nav-link" href="#">
                    <i class="fa fa-shopping-cart" aria-hidden="true"></i> Shopping Chart</a>
            </li>

            <li class="nav-item dropdown active">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                   aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-user" aria-hidden="true"></i> User Management
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    @if(Auth::check())
                        <li><a class="dropdown-item" href="{{ url('user/profile') }}">User Profile</a>
                        <li>
                        <li role="separator" class="dropdown-divider">
                        <li>
                        <li><a class="dropdown-item" href="{{ url('user/logout') }}">Logout</a>
                        <li>
                    @else
                        <li><a class="dropdown-item" href="{{ url('user/signup') }}">Sign Up</a>
                        <li>
                        <li><a class="dropdown-item" href="{{ url('user/signin') }}">Sign in</a>
                    @endif
                </ul>
            </li>
        </ul>
    </div>
</nav>
