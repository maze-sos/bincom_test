<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delta State Election Results</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <link rel="icon" href="{{ asset('favicon_io/favicon.ico') }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset('favicon_io/favicon.ico') }}" type="image/x-icon">

    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
        }

        .navbar {
            padding: 15px 0;
            background: #343a40;
        }

        .navbar-brand {
            font-size: 1.5rem;
            font-weight: bold;
            display: flex;
            align-items: center;
        }

        .navbar-brand img {
            margin-right: 10px;
            border-radius: 50%;
        }

        .nav-link {
            font-size: 1.1rem;
            transition: color 0.3s ease-in-out;
        }

        .nav-link:hover {
            color: #3d7bf0 !important;
        }

        .content-container {
            min-height: 70vh; 
        }

        .footer {
            background: #343a40;
            color: #fff;
            text-align: center;
            padding: 15px 0;
            margin-top: 40px;
            font-size: 0.9rem;
        }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">
                <img src="{{ asset('delta.jpg') }}" width="40" height="40" alt="Delta Logo">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="{{ route('home') }}">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('polling-units.index') }}">Polling Units</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('lgas.index') }}">LGA Results</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('results.create') }}">Add Result</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container content-container mt-4">
        @yield('content')
    </div>

    <footer class="footer">
        <div class="container">
            <p>&copy; {{ date('Y') }} Delta State Election Results. All Rights Reserved.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
