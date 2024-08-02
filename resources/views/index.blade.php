<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movies by Category</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #808080;
        }
        .hero {
            background: url('{{ asset('images/net.jpeg') }}') no-repeat center center;
            background-size: cover;
            color: white;
            padding: 5rem 0;
            position: relative;
        }
        .hero h1 {
            color: #000000;
            font-size: 3rem;
            font-weight: 700;
        }
        .card {
            transition: transform 0.3s, box-shadow 0.3s;
        }
        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }
        .card-img-top {
            height: 180px;
            object-fit: cover;
        }
        .add-category-btn {
            position: absolute;
            top: 1rem;
            right: 1rem;
            margin-right: -180px;
            width: 200px;
            background-color: #000000;
            border-color: #000000;
            border-radius: 25px;
        }
    </style>
</head>
<body>
    <header class="hero text-center">
        <div class="container position-relative">
            <h1>Descubre Películas por Categoría</h1>
            <a href="{{ route('categories.create') }}" class="btn btn-danger add-category-btn">Agregar Nueva Categoría</a>
        </div>
    </header>
    <div class="container mt-5">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <div class="row">
            @foreach ($categories as $category)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="{{ asset('images/categ.jpg') }}" class="card-img-top" alt="{{ $category->name }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $category->name }}</h5>
                            <a href="{{ route('movies.byCategory', ['category_id' => $category->id]) }}" class="btn btn-primary">Ver Películas</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
