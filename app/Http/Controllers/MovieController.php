<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;
use App\Models\Genre;

class MovieController extends Controller
{
    public function movie()
    {
        $movies = Movie::latest()->get();
        $genres = Genre::all();
        return view('admin.movie', compact('movies', 'genres'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:55',
            'description' => 'nullable|string',
            'duration' => 'required|numeric|min:1',
            'release_date' => 'required|date',
            'rating' => 'required|numeric|min:0|max:10',
            'genre_id' => 'required|exists:genres,id',
            'language' => 'nullable|string|max:15',
            'cast' => 'nullable|string',
        ]);

        Movie::create([
            'name' => $request->name,
            'description' => $request->description,
            'duration' => $request->duration,
            'release_date' => $request->release_date,
            'rating' => $request->rating,
            'genre_id' => $request->genre_id,
            'language' => $request->language ?? 'english',
            'cast' => $request->cast,
        ]);

        toastr()->success('Movie has been added successfully!');
        return redirect()->route('movie');
    }

    public function delete($movieId)
    {
        Movie::where('id', $movieId)->delete();
        toastr()->success('Data has been deleted successfully!');
        return redirect()->route('movie');
    }
}
