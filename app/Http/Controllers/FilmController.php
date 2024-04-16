<?php

namespace App\Http\Controllers;

use App\Models\Film;
use Illuminate\Http\Request;
use Inertia\Inertia;


class FilmController extends Controller
{

    public function index()
    {
        $films = Film::with('actors')->get();


        return Inertia::render('Films/Films', [
            'films' => $films
        ]);
    }

    public function show($id)
    {
        $film = Film::with('actors')->find($id);

        if (!$film) {
            return response()->json(['message'=> 'Film not found'], 404);
        }

        return Inertia::render('Films/Show', [
            'film' => $film
        ]);
    }

    public function create()
    {
        return Inertia::render('Films/Create');
    }

    public function edit($id)
    {
        $film = Film::find($id);

        if (!$film) {
            abort(404, 'Film not found');
        }

        return Inertia::render('Films/Edit', [
            'film' => $film
        ]);
    }

    public function store(Request $request)
    {
        $requestData = $request->validate([
            'name' => 'required|unique:films|max:255',
            'actors' => 'required|array',
            'actors.*' => 'exists:actors,id'
        ]);

        $film = Film::create([
            'name' => $requestData['name']
        ]);

        $film->actors()->attach($requestData['actors']);

        return redirect()->back()->with('success', 'Film created successfully');
    }

    public function update(Request $request, $filmId)
    {
        $film = Film::find($filmId);

        if (!$film) {
            abort(404, 'Film not found');
        }

        $requestData = $request->validate([
            'name' => 'max:255',
            'actors'=> 'array',
            'actors.*' => 'exists:actors,id'
        ]);


        if ($request->has('name')) {
            $film->name = $requestData['name'];
        }

        if ($request->has('actors')) {
            $film->actors()->sync($requestData['actors']);
        }

        $film->save();

        return redirect()->back()->with('success', 'Film updated successfully.');

    }

    public function destroy($id)
    {
        $film = Film::findOrFail($id);
        $film->actors()->detach();
        $film->delete();
        return redirect()->back()->with('success', 'Film deleted successfully.');
    }
}
