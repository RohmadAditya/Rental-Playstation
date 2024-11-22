<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;

class GameController extends Controller
{
    public function dashboardView() {
        return view('admin.pages.dashboard');
    }
    public function index () {

        $games = Game::all();
        // dd($games);

        return view('admin.pages.games', compact('games'));
        
    }

    public function createGames() {
        return view('admin.pages.create-games');
    }

    public function storeGames(Request $request) {
        // dd($request);

        $validated = $request->validate([
            'title' => 'required|max:255',
            'description' => 'nullable',
            'genre' => 'nullable',
            'platform' => 'required',
            'is_active' => 'nullable',
            'release_date' => 'nullable',
            'uploadImg' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

         // Simpan data ke database
         $game = new Game();
         $game->title = $validated['title'];
         $game->description = $validated['description'];
         $game->genre = $validated['genre'];
         $game->platform = $validated['platform'];
         $game->is_topgames = $validated['is_active'];
         $game->release_date = $validated['release_date'];
        //  $game->img_url = $validated['uploadImg'];
         // Simpan file di folder `public/uploads`
         $img = $request->file('uploadImg')->store('uploads', 'public');

         $game->img_url = $img;
         $game->save();

         // Redirect atau memberikan respons setelah data disimpan
         return to_route('game-index')->with('success', 'successfully!');
    }
}
