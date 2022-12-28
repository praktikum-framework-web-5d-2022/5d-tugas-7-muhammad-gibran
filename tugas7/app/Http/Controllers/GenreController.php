<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Genre;

class GenreController extends Controller
{
    public function create()
    {
        return view('genre.create');
    }
    public function store(Request $request)
    {
        $validategenre = $request->validate([
            'kode' => 'required',
            'genre' => 'required',
        ]);

        Genre::create($validategenre);
        return redirect()->route('games.index')->with('message', "Genre {$validategenre['genre']} berhasil ditambahkan");
    }
}
