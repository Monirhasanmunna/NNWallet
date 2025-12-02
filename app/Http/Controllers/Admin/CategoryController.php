<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Services\Notification\FcmService;
use App\Models\Category;
use App\Models\FcmToken;
use App\Models\Notification;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * @return Factory|View
     */
    public function list(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
    {
        $categories = Category::orderByDesc('id')->paginate(20);
        return view('admin.category.list', compact('categories'));
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
            ]);

             Category::create([
                'title' => $request->title,
            ]);

            return redirect()->back()->with('success', 'Category created successfully.');
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
                'id' => 'required|exists:categories,id',
                'title' => 'required',
            ]);

            Category::find($request->id)->update([
                'title' => $request->title,
            ]);

            return redirect()->back()->with('success', 'Category updated successfully.');
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
            $category = Category::find($id);
            $category->delete();
            return redirect()->back()->with('success', 'Category deleted successfully.');
        }
        catch (\Exception $exception){
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }
}
