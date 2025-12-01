<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Services\Notification\FcmService;
use App\Models\FcmToken;
use App\Models\Notification;
use Illuminate\Http\Request;
use App\Models\ExtensionSync;

class NotificationController extends Controller
{
    public function __construct( private readonly FcmService $fcmService){}

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $notifications = Notification::orderBy('id', 'desc')->paginate(10);

        return response()->json([
            'status' => true,
            'message' => 'Data fetched successfully',
            'data' => $notifications
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'title'  => 'required',
                'type'    => 'required',
                'message' => 'required',
            ]);

            $notification = Notification::create([
                'title' => $request->title,
                'type' => $request->type,
                'message' => $request->message,
            ]);

            $tokens = FcmToken::select('token')->get();
            $tokens = array_column($tokens->toArray(), 'token');
            $this->fcmService->sendToMany($tokens, $notification->title, $notification->message, [$notification->type]);

            return response()->json([
                'status'  => true,
                'message' => 'Data saved successfully',
                'data'    => $notification,
            ], 201);
        }
        catch (\Exception $e) {
            return response()->json([])->setStatusCode(400);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $notification = Notification::where('id', $id)->firstOrFail();

            return response()->json([
                'status' => true,
                'message' => 'Data fetched successfully',
                'data' => $notification
            ]);
        }
        catch (\Exception $e) {
            return response()->json([])->setStatusCode(400);
        }
    }

}
