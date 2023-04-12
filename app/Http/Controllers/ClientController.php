<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clients = Client::latest()->paginate(5);
        return view('clients.index', compact('clients'))->with('i', (request()->input('page',1)-1)*5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
                return view('clients.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'company_name' => 'required',
            'vat' => 'required',
            'address' => 'required',
        ]);
        Client::create($request->all());
        return redirect()->route('clients.index')->with('success','clients created successfully.');

    
    }

    /**
     * Display the specified resource.
     */
    public function show(Client $client)
    {
        return view('clients.show', compact('client'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Client $client)
    {
        return view('clients.edit',compact('client'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Client $client)
    {
  
        
        $request->validate([
            'company_name' => 'required',
            'vat' => 'required',
            'address' => 'required',
        ]);

        $client->update($request->all());
        return redirect()->route('clients.index')->with('success','client updated successfully');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Client $client)
    {
        $client->delete();
        return redirect()->route('clients.index')->with('success','client deleted successfully');

    }
}
