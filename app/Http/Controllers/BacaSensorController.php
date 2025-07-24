<?php

namespace App\Http\Controllers;

use App\Models\BacaSensor;
use Illuminate\Http\Request;

class BacaSensorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard');
    }

    public function getLatestData()
    {
        // Ambil 50 data terakhir, urutkan dari terlama ke terbaru
        $data = BacaSensor::latest()->take(50)->get()->reverse()->values();

        return response()->json($data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'pitch' => 'nullable|numeric',
            'roll' => 'nullable|numeric',
            'pressure' => 'nullable|numeric',
            'altitude' => 'nullable|numeric',
            'current' => 'nullable|numeric',
            'temperature' => 'nullable|numeric',
        ]);
        $sensor = BacaSensor::create($data);
        return response()->json($sensor, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(BacaSensor $bacaSensor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BacaSensor $bacaSensor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BacaSensor $bacaSensor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BacaSensor $bacaSensor)
    {
        //
    }
}
