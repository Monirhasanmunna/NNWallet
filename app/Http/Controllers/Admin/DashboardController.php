<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Category;
use App\Models\FeatureList;
use App\Models\Notification;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __invoke()
    {
        $totalBanner = Banner::count();
        $totalCategory = Category::count();
        $totalFeature = FeatureList::count();
        $totalNotification = Notification::count();

        return view('admin.dashboard', compact('totalBanner', 'totalCategory', 'totalFeature', 'totalNotification'));
    }
}
