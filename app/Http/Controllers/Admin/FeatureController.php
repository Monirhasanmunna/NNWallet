<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Services\Notification\FcmService;
use App\Models\Category;
use App\Models\FcmToken;
use App\Models\FeatureList;
use App\Models\Notification;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class FeatureController extends Controller
{
    /**
     * @return Factory|View
     */
    public function list(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
    {
        $categories = Category::all();
        $features = FeatureList::orderByDesc('id')->paginate(10);
        return view('admin.feature.list', compact('features', 'categories'));
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        try {
            $request->validate([
                'category_id' => 'required|exists:categories,id',
                'title' => 'required',
            ]);

             FeatureList::create([
                'category_id' => $request->category_id,
                'title' => $request->title,
            ]);

            return redirect()->back()->with('success', 'Feature List created successfully.');
        }
        catch (\Exception $exception){
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function update(Request $request): RedirectResponse
    {
        try {
            $request->validate([
                'id' => 'required|exists:feature_lists,id',
                'category_id' => 'required|exists:categories,id',
                'title' => 'required',
            ]);

            FeatureList::find($request->id)->update([
                'title' => $request->title,
                'category_id' => $request->category_id,
            ]);

            return redirect()->back()->with('success', 'Feature List updated successfully.');
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
            $feature = FeatureList::find($id);
            $feature->delete();
            return redirect()->back()->with('success', 'Feature List deleted successfully.');
        }
        catch (\Exception $exception){
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }
}
