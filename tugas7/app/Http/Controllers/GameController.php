<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Genre;
use Illuminate\Http\Request;

class GameController extends Controller
{
    public function index()
    {
        $games = Game::get();
        return view('index', compact('games'));
    }

    public function take(Game $game)
    {
        $genres = Genre::get();
        return view('take', ['game' => $game, 'genres' => $genres]);
    }

    public function takeStore(Game $game, Request $request)
    {
        $genres = Genre::find($request->genre_id);
        $game->genres()->sync($genres);
        return redirect()->route('games.index');
    }

    public function create()
    {
        return view('game.create');
    }

    public function store(Request $request)
    {
        $validatedev = $request->validate([
            'developer' => 'required',
            'game' => 'required',
        ]);

        Game::create($validatedev);
        return redirect()->route('games.index')->with('message', "Data game {$validatedev['game']} dari {$validatedev['developer']} berhasil ditambahkan");
    }

    public function edit(Game $game)
    {
        return view('game.edit', ['game' => $game]);
    }

    public function update(Request $request, Game $game)
    {
        $validatedev = $request->validate([
            'developer' => 'required',
            'game' => 'required',
        ]);
        $game->update($validatedev);

        return redirect()->route('games.index')->with('message', "Data game $game->game dari $game->developer berhasil diubah");
    }

    public function destroy(Game $game)
    {
        $game->delete();
        return redirect()->route('games.index')->with('message', "Data game $game->game dari $game->developer berhasil dihapus");
    }
}
