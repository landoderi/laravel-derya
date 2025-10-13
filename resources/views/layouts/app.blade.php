<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>CRUD Biodata</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar bg-dark navbar-dark mb-4">
        <div class="container">
            <a class="navbar-brand" href="{{ route('biodata.index') }}">CRUD Biodata</a>
        </div>
    </nav>

    @yield('content')
</body>
</html>
