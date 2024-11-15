<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClientRequest;
use App\Models\Client;
use App\Services\PersonService;
use Illuminate\Support\Facades\DB;

class ClientController extends Controller
{
    public function index()
    {
        $clients = Client::with([
                'person.natural_person',
                'person.address',
            ])
            ->get();

        return response()->json($clients, 200);
    }

    public function store(ClientRequest $request)
    {
        $data = $request->all();

        $client = new Client();

        DB::transaction(function () use ($client, $data) {
            $person = PersonService::create($data);
            $client->person()->associate($person);
            $client->save();
        });

        return response()->json($client, 201);

    }

    public function show(Client $client)
    {
        return response()->json(
            Client::with([
                'person.natural_person',
                'person.address',
                'person.phones',
            ])->find($client->id), 200);
    }

    public function update(ClientRequest $request, Client $client)
    {
        $data = $request->all();

        DB::transaction(function () use ($client, $data) {
            $person = PersonService::update($data, $client->person);
            $client->person()->associate($person);
            $client->save();
        });

        return response()->json($client, 200);

    }

    public function destroy(Client $client)
    {
        $client->delete();
        return response()->json(null, 204);
    }
}
