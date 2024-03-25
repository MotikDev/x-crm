<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreClientRequest;
use App\Http\Requests\UpdateClientRequest;
use App\Mail\WelcomeEmail;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    protected Client $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function index(Request $request)
    {
        $clients = Client::query()
                            ->when($request->input('search'), fn($query, $search) => $query->where('last_name', 'like', '%' . $search . '%'))
                            ->get(['id', 'first_name', 'last_name', 'created_at']);

        return Inertia::render('Index', [
            'clients' => $clients,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreClientRequest $request)
    {
        $clientProfile = $this->client->create($request->all());

        if($request->hasFile('profile_image')) {
            $path = Storage::putFile('public/clients', $request->file('profile_image'), 'public');
            $clientProfile->update(['profile_image' => $path]);
        }

        Mail::to($request->email)->send(new WelcomeEmail($clientProfile));

        return to_route('clients');
    }

    /**
     * Display the specified resource.
     */
    public function show(Client $client)
    {
        $client->profile_image = Storage::url($client->profile_image);

        return Inertia::render('Show', [
            'client' => $client,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Client $client)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateClientRequest $request, Client $client)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Client $client)
    {
        //
    }
}
