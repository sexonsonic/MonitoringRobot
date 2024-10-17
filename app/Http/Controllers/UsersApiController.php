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

        $response2 = Http::withOptions([
            'verify' => false,
        ])->get('https://main.robotahli.id/html/dusage?list=1');

        // Assuming the API returns JSON data
        $data = $response->json(); // Convert JSON to array
        $data2 = $response2->json();

        // Optional: Validate the structure
        $mergeData = array_merge($data, $data2);

        return view('mockapi.index', [
            "data" => $data,
            "data2" => $data2,
            "mergeData" => $mergeData
        ]);
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
