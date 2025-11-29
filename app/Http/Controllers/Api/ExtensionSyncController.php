<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ExtensionSync;

class ExtensionSyncController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = ExtensionSync::orderBy('id', 'desc')->paginate(10);

        return response()->json([
            'status' => true,
            'message' => 'Data fetched successfully',
            'data' => $items
        ]);
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
        $validated = $request->validate([
            'session_id'  => 'required|string|max:255',
            'platform'    => 'required|string|max:30',
            'device_name' => 'required|string|max:255',
            'app_version' => 'required|string|max:30',
        ]);

        // Insert or update
        $record = ExtensionSync::updateOrCreate(
            ['session_id' => $validated['session_id']],
            [
                'platform'    => $validated['platform'],
                'device_name' => $validated['device_name'],
                'app_version' => $validated['app_version'],
            ]
        );

        return response()->json([
            'status'  => true,
            'message' => 'Data saved successfully',
            'data'    => $record,
        ], 201);
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
