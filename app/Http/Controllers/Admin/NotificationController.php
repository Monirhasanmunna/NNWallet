<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Notification;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class NotificationController extends Controller
{

    /**
     * @return Factory|View
     */
    public function list(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
    {
        $notifications = Notification::orderByDesc('id')->paginate(20);
        $notificationTypes = notificationType();

        return view('admin.notification.list', compact('notifications', 'notificationTypes'));
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        try {
            $request->validate([
                'title' => 'required',
                'type' => 'required',
                'message' => 'required',
            ]);

            Notification::create([
                'title' => $request->title,
                'type' => $request->type,
                'message' => $request->message,
            ]);

            return redirect()->back()->with('success', 'Notification created successfully.');
        }
        catch (\Exception $exception){
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }

    /**
     * @param string $id
     * @return RedirectResponse
     */
    public function destroy(string $id): RedirectResponse
    {
        try {
            $notification = Notification::find($id);
            $notification->delete();
            return redirect()->back()->with('success', 'Notification deleted successfully.');
        }
        catch (\Exception $exception){
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }
}
