<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Banner;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $banners = Banner::orderBy('id', 'desc')->paginate(10);

        return response()->json([
            'status' => true,
            'message' => 'Data fetched successfully',
            'data' => $banners
        ]);
    }
}
