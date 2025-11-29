<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::orderByDesc("id")->paginate(10);

        return response()->json([
            'status' => true,
            'message' => 'Data fetched successfully',
            'data' => $categories
        ]);
    }
}
