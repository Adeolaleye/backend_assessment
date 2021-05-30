<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EventController extends Controller
{
    public function index()
    {
        return response()->json(Event::all(), 200);
    }

    public function store(Request $request)
    {
        // return response()->json(($request->actor));
        $validator = Validator::make($request->all(), [
            'type'  => 'required',

            'actor' => 'required|json',
            // 'actor.id' => 'required|numeric',
            // 'actor.login' => 'required|alpha_num',
            // 'actor.avatar_url' => 'required|url',

            'repo' => 'required|json',
            // 'repo.id' => 'required|numeric',
            // 'repo.name' => 'required|string',
            // 'repo.url' => 'required|url',

            'created_at' => 'required|date_format:Y-m-d H:i:s'
        ]);

        if($validator->fails())
            return response()->json($validator->getMessageBag());

        Event::create($request->all());
        return response()->json($request->all(), 201);
    }

    public function actorsPut(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id'  => 'required',
            'login' => 'required',
            'avatar_url' => 'required|url'
        ]);

        if($validator->fails())
            return response()->json($validator->getMessageBag());

        Event::create($request->all());
        return response()->json([], 201);
    }

    public function getActorById($id){
        $actor = Event::find($id);
        if($actor){
            return response()->json($actor);
        }
        return response()->json(["message" => "resource does not exits"], 404);
    }

    public function delete(){
        Event::truncate();
        response()->json([], 200);
    }
}
