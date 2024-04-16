<?php

namespace App\Http\Controllers;

use App\Models\Actor;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Inertia\Inertia;

class ActorController extends Controller
{
    public function index(Request $request)
    {
        $actors = Actor::all();

        if($request->header('Accept') === 'application/json') {
            return response()->json();
        }


        return Inertia::render('Actors/Index',
            ['actors' => $actors]
        );
    }

    public function show($id)
    {
        $actor = Actor::find($id);

        if (!$actor) {
            abort(404, 'Actor not found');
        }

        return Inertia::render('Actors/Show',
            ['actor' => $actor]
        );
    }

    public function create()
    {
        return Inertia::render('Actors/Create');
    }

    public function edit($id)
    {
        $actor = Actor::find($id);

        if (!$actor) {
            abort(404, 'Actor not found');
        }

        return Inertia::render('Actors/edit',
            ['actors' => $actor]
        );

    }

    public function store(Request $request)
    {
        $requestData = $request->validate([
            'name' => 'required|unique:actors|max:255'
        ]);

        Actor::create([
            'name' => $requestData['name']
        ]);

        return redirect()->route('actors.index')->with('success', 'Actor created successfully');
    }

    public function update(Request $request, $id)
    {
        $actor = Actor::find($id);
        if (!$actor) {
            abort(404, 'Actor not found');
        }
        $requestData = $request->validate([
            'name' => 'unique:actors|max:255'
        ]);

        $actor->update($request->only('name'));

        return redirect()->route('actors.index')->with('success', 'Actor updated successfully');
    }

    public function destroy($id)
    {
        $actor = Actor::findOrFail($id);

        $actor->delete();

        return redirect()->route('actors.index')->with('success', 'Actor deleted successfully');

    }

}
