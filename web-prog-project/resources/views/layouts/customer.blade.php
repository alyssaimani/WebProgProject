<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <title>Jramedia</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">Jramedia</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="d-flex">
                <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="#">View Products</a>
                    </li>
                    <form class="d-flex" role="search">
                        <input class="form-control me-2" style="width: 300px" type="search" placeholder="Search Our product here ..." aria-label="Search">
                        <button class="btn btn-outline-success bg-primary text-light" type="submit">Search</button>
                    </form>
                    <div class="collapse navbar-collapse" id="navbarNavDarkDropdown">
                        <ul class="navbar-nav">
                            <li class="nav-item dropdown">
                            <button class="btn btn-light dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                Profile
                            </button>
                            <ul class="dropdown-menu dropdown-menu-light">
                                <li><a class="dropdown-item" href="#">Admin</a></li>
                                <li><a class="dropdown-item" href="#">Customer</a></li>
                            </ul>
                            </li>
                        </ul>
                    </div>
                </ul>
            </div>
            </div>
        </div>
    </nav>

    <div class="bg-secondary">
        @yield('container')
    </div>

    <footer>
        <div class="d-flex justify-content-center">
            <p class="mt-3 mb-3">©2023 Copyright Jramedia Book Store</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>