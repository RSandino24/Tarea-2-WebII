<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Categoría</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Agregar Nueva Categoría</h1>
        <form action="{{ route('categories.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Nombre de la Categoría</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="form-group">
                <a href="{{ route('home') }}" class="btn btn-primary" style="border-radius: 12px;">Volver</a>
                <button type="submit" class="btn btn-primary ml-2" style="border-radius: 12px;">Guardar</button>
            </div>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
