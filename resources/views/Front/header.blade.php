
<nav class="navbar navbar-expand-lg navbar-light bg-white">
    <div class="container">
        <a class="navbar-brand" href="/">
            <img src="{{ asset('assist/assists/img/logo.jpg') }}" alt="" width="40" height="40">Nezam Academy
        </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="/#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/#courses">Courses</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/#team">Instructors</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/#contact-us">Contact Us</a>
                </li>
                </li>
            </ul>
        </div>
            @if (auth()->user())
                @if (auth()->user()->admin == 0)
                    <li class="nav-item dropdown">
                        <a class="drop-menu dropdown-toggle" href="#" id="dropdown01" data-bs-toggle="dropdown" aria-expanded="false">{{ auth()->user()->name }}</a>
                        <ul class="dropdown-menu" aria-labelledby="dropdown01">
                            <li><a class="dropdown-item" href="{{ route('front.Profile') }}">Edit Profile</a></li>
                            <li><a class="dropdown-item" href="{{ route('admin.logout') }}">Logout</a></li>
                        </ul>
                        </li>
                @else
                <li class="nav-item dropdown">
                    <a class="drop-menu dropdown-toggle" href="#" id="dropdown01" data-bs-toggle="dropdown" aria-expanded="false">{{ auth()->user()->name }}</a>
                    <ul class="dropdown-menu" aria-labelledby="dropdown01">
                        <li><a class="dropdown-item" href="{{ route('admin') }}" target="_blank">Dashboard</a></li>
                        <li><a class="dropdown-item" href="{{ route('admin.logout') }}">Logout</a></li>
                    </ul>
                @endif
            @endif
            @if (!auth()->user())
            <div class="regsteration">
                <a href="{{ route('admin.login') }}" class="nav-item"><button class="btn btn-light m-2 btn-outline-primary">Login</button></a>
                <a href="{{ route('front.signUp') }}" class="nav-item"><button class="btn btn-primary">Sign Up</button></a>
            </div>
            @endif
    </div>
</nav>