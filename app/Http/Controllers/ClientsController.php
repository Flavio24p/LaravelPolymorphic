<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateNewClientRequest;
use App\Http\Requests\UpdateClientRequest;
use App\Models\Client;
use App\Models\Tag;

class ClientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = Client::all();

        return view('clients.index', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::all();

        return view('clients.new', compact('tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateNewClientRequest $request)
    {
        $client = new Client();
        $client->name = $request->name;
        $client->surname = $request->surname;
        $client->save();

        foreach ($request->tags as $tag)
        {
            $client->tags()->attach($tag);
        }

        return redirect()->route('clients.index')->with('success', 'Client Created Successfully');
    }

    public function show($id)
    {
        $client = Client::with('tags')->findOrFail($id);

        return view('clients.view', compact('client'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $client = Client::with('tags')->findOrFail($id);

        $tags = Tag::all();

        $arrayOfCLientTags = $client->tags->pluck('id')->toArray();

        return view('clients.edit', compact('client', 'tags', 'arrayOfCLientTags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateClientRequest $request, $id)
    {
        $client = Client::findOrFail($id);
        $client->name = $request->name;
        $client->surname = $request->surname;
        $client->save();

        $client->tags()->detach($client->tags);

        foreach ($request->tags as $tag)
        {
            $client->tags()->attach($tag);
        }

        return redirect()->route('clients.index')->with('success', 'Client Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Client::findOrFail($id)->delete();

        return back()->with('success', "Client Deleted Successfully");
    }
}
