<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FeatureList;

class FeatureListController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $features = FeatureList::with('category')->orderByDesc('id')->paginate(10);
        
        return response()->json([
            'status' => true,
            'message' => 'Data fetched successfully',
            'data' => $features
        ]);
    }
}
