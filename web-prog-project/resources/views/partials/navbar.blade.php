<nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">Jramedia</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                @auth
                    @if (auth()->user()->role === "admin")
                        <ul class="navbar-nav ms-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="/product">View Products</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">View All Transaction</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/account">View Account</a>
                            </li>
                            <form class="d-flex" role="search" action="{{ route('product.index')}}" method="GET">
                                @csrf
                                <input class="form-control me-2" style="width: 300px" type="text" name="search" id="search" placeholder="Search Our product here ..." aria-label="Search">
                                <button class="btn btn-outline-success bg-primary text-light" type="submit"><i class="bi bi-search"></i></button>
                            </form>
                            <div class="collapse navbar-collapse" id="navbarNavLightDropdown">
                                <ul class="navbar-nav">
                                    <li class="nav-item dropdown">
                                    <button class="btn btn-light dropdown-toggle me-2" data-bs-toggle="dropdown" aria-expanded="false">
                                        Profile
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-light">
                                        <form action="/logout" method="POST">
                                            @csrf
                                            <button type="submit" class="dropdown-item">Logout</button>
                                        </form>
                                    </ul>
                                    </li>
                                </ul>
                            </div>
                        </ul>
                    @else
                        <ul class="navbar-nav ms-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="/product">View Products</a>
                            </li>
                            <form class="d-flex" role="search" action="{{ route('product.index') }}" method="GET">
                                @csrf
                                <input class="form-control me-2" style="width: 300px" type="text" name="search" id="search" placeholder="Search Our product here ..." aria-label="Search">
                                <button class="btn btn-outline-success bg-primary text-light" type="submit"><i class="bi bi-search"></i></button>
                            </form>
                            <div class="collapse navbar-collapse" id="navbarNavDarkDropdown">
                                <ul class="navbar-nav">
                                    <li class="nav-item dropdown">
                                    <button class="btn btn-light dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                        Profile
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-light">
                                        <form action="/logout" method="POST">
                                            @csrf
                                            <button type="submit" class="dropdown-item">Logout</button>
                                        </form>
                                        <li><a class="dropdown-item" href="/cart">My Cart</a></li>
                                    </ul>
                                    </li>
                                </ul>
                            </div>
                        </ul>
                    @endif
                @else
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="/login">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/register">Register</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/about">About Us</a>
                        </li>
                    </ul>
                @endauth
                
            </div>
        </div>
    </nav>