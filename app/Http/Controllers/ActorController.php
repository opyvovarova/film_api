<?php

namespace App\Http\Controllers;

use App\Models\Actor;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ActorController extends Controller
{
    public function index()
    {
        $actors = Actor::all();
        return response()->json($actors, 200);
    }

    public function show($id)
    {
        $actor = Actor::find($id);
        if (!$actor) {

        }
    }
}
