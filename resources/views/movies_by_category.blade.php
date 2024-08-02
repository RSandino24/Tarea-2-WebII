<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movies by Category</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h1 class="mb-4">Lista de películas en la categoría: {{ $category->name }}</h1>
        <div class="mb-4">
            <a href="{{ route('movies.create') }}" class="btn btn-success" style="border-radius: 12px;">Agregar Nueva Película</a>
        </div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Título</th>
                    <th>Año</th>
                    <th>Estudio</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($movies as $movie)
                    <tr>
                        <td>{{ $movie->title }}</td>
                        <td>{{ $movie->year }}</td>
                        <td>{{ $movie->studio }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <a href="{{ route('home') }}" class="btn btn-primary" style="border-radius: 12px;">Volver</a>
    </div>
</body>
</html>
