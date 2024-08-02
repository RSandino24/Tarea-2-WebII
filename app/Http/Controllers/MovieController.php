<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Category;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('index', compact('categories'));
    }

    public function showMoviesByCategory(Request $request)
    {
        $categoryId = $request->input('category_id');
        $category = Category::find($categoryId);

        if (!$category) {
            return view('error');
        }

        $movies = $category->movies;
        return view('movies_by_category', compact('category', 'movies'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('movies.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'year' => 'required|integer',
            'studio' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
        ]);

        Movie::create($request->all());

        return redirect()->route('home')->with('success', 'Película agregada con éxito.');
    }
}
