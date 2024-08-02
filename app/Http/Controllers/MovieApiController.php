<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Category;
use Illuminate\Http\Request;

class MovieApiController extends Controller
{

    public function index(Request $request)
    {
        $sort = $request->query('sort', 'title:asc');
    
        $parts = explode(':', $sort);
        $sortField = $parts[0];
        $sortOrder = $parts[1] ?? 'asc';
    
        $validSortFields = ['title', 'year', 'studio'];
        $validSortOrders = ['asc', 'desc'];
    
        if (!in_array($sortField, $validSortFields)) {
            return response()->json(['error' => 'Campo de ordenación no válido'], 400);
        }
    
        if (!in_array($sortOrder, $validSortOrders)) {
            return response()->json(['error' => 'Orden no válido'], 400);
        }
    
        $movies = Movie::orderBy($sortField, $sortOrder)->get();
        return response()->json($movies);
    }
    

public function store(Request $request)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'year' => 'required|integer',
        'studio' => 'required|string|max:255',
        'category_id' => 'required|exists:categories,id',
    ]);

    $movie = Movie::create($request->all());

    return response()->json(['message' => 'Película agregada con éxito.', 'movie' => $movie], 201);
}

public function show($id)
{
    $movie = Movie::with('category')->find($id);

    if (!$movie) {
        return response()->json(['error' => 'Película no encontrada'], 404);
    }

    return response()->json($movie);
}

public function update(Request $request, $id)
{
    $movie = Movie::find($id);

    if (!$movie) {
        return response()->json(['error' => 'Película no encontrada'], 404);
    }

    $request->validate([
        'title' => 'sometimes|required|string|max:255',
        'year' => 'sometimes|required|integer',
        'studio' => 'sometimes|required|string|max:255',
        'category_id' => 'sometimes|required|exists:categories,id',
    ]);

    $movie->update($request->all());

    return response()->json(['message' => 'Película actualizada con éxito.', 'movie' => $movie]);
}

public function destroy($id)
{
    $movie = Movie::find($id);

    if (!$movie) {
        return response()->json(['error' => 'Película no encontrada'], 404);
    }

    $movie->delete();

    return response()->json(['message' => 'Película eliminada con éxito.']);
}
}