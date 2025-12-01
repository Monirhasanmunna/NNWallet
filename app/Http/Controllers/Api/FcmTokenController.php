<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\FcmToken;
use Illuminate\Http\Request;
use App\Models\ExtensionSync;

class FcmTokenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tokens = FcmToken::orderBy('id', 'desc')->select('device_type', 'token')->get();

        return response()->json([
            'status' => true,
            'message' => 'Data fetched successfully',
            'data' => $tokens
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
            'device_type'  => 'required',
            'token'    => 'required',
        ]);

        // Insert or update
        $token = FcmToken::updateOrCreate(
            ['token' => $validated['token']],
            [
                'device_type'    => $validated['device_type'],
            ]
        );

        return response()->json([
            'status'  => true,
            'message' => 'Data saved successfully',
            'data'    => $token,
        ], 201);
    }
}
