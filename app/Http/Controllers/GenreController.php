<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Genre;

class GenreController extends Controller
{
    public function genre()
    {
        $genres = Genre::latest()->get();
        return view('admin.genre', compact('genres'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:55|unique:genres,name',
            'description' => 'nullable|string',
        ]);

        Genre::create([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        toastr()->success('Genre has been added successfully!');
        return redirect()->route('genre');
    }

    public function edit($genreId)
    {
        $genre = Genre::findOrFail($genreId);
        $genres = Genre::latest()->get();
        return view('admin.genre', compact('genres', 'genre'));
    }

    public function update(Request $request, $genreId)
    {
        $request->validate([
            'name' => 'required|string|max:55|unique:genres,name,' . $genreId,
            'description' => 'nullable|string',
        ]);

        $genre = Genre::findOrFail($genreId);
        $genre->update([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        toastr()->success('Genre has been updated successfully!');
        return redirect()->route('genre');
    }

    public function delete($genreId)
    {
        Genre::where('id', $genreId)->delete();
        toastr()->success('Genre has been deleted successfully!');
        return redirect()->route('genre');
    }
}
