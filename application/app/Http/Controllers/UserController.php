<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\PersonService;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();

        return response()->json($users, 200);
    }

    public function store(Request $request)
    {
        $data = $request->all();

        $user = new User();

        DB::transaction(function () use ($user, $data) {
            $person = PersonService::create($data);
            $user->person()->associate($person);
            $user->save();
        });

        return response()->json($user, 201);

    }

    public function show(User $user)
    {
        return response()->json(User::with([
                'person.natural_person',
                'person.address',
                'person.phones',
            ])->find($user->id), 200);
    }

    public function update(Request $request, User $user)
    {
        $data = $request->all();

        DB::transaction(function () use ($user, $data) {
            $person = PersonService::update($data, $user->person);
            $user->person()->associate($person);
            $user->save();
        });

        return response()->json($user, 200);

    }

    public function destroy(User $user)
    {
        $user->delete();
        return response()->json(null, 204);
    }

}
