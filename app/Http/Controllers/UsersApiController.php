<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class UsersApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $response = Http::withOptions([
        'verify' => false,
    ])->get('https://main.robotahli.id/html/usage?list=1');
    
    // Assuming the API returns JSON data
    $data = $response->json(); // Convert JSON to array

    // Optional: Validate the structure
    // dd($data);

    return view('mockapi.index', ["data" => $data]);
}
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('mockapi.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
