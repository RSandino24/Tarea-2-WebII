<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Película</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Agregar Nueva Película</h1>
        <form action="{{ route('movies.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="title">Título</label>
                <input type="text" name="title" id="title" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="year">Año</label>
                <input type="number" name="year" id="year" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="studio">Estudio</label>
                <input type="text" name="studio" id="studio" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="category_id">Categoría</label>
                <select name="category_id" id="category_id" class="form-control" required>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <a href="{{ url()->previous() }}" class="btn btn-primary" style="border-radius: 12px;">Volver</a>
                <button type="submit" class="btn btn-primary ml-2" style="border-radius: 12px;">Agregar</button>
            </div>
        </form>
    </div>
</body>
</html>
