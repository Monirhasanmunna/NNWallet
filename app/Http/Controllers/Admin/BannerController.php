<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Category;
use App\Traits\FileSaver;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    use FileSaver;
    /**
     * @return Factory|View
     */
    public function list(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
    {
        $banners = Banner::orderByDesc('id')->paginate(10);
        return view('admin.banner.list', compact('banners'));
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        try {
            $request->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
                'link' => 'nullable|string|url',
            ]);

            $imageName = $this->uploadImageDefaultRatio( $request->image, 'banner',null, 'webp');

            Banner::create([
                'link' => $request->link,
                'image' => $imageName,
            ]);

            return redirect()->back()->with('success', 'Banner created successfully.');
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
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
                'link' => 'nullable|string|url',
            ]);

            $banner = Banner::find($request->id);

            $imageName = null;
            if($request->hasFile('image')){
                $imageName = $this->uploadImageDefaultRatio( $request->image, 'banner',$banner->image, 'webp');
            }

           $banner->update([
                'link' => $request->link,
                'image' => $imageName,
            ]);

            return redirect()->back()->with('success', 'Banner updated successfully.');
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
            $banner = Banner::find($id);
            if(file_exists(public_path($banner->image))){
                unlink(public_path($banner->image));
            }
            $banner->delete();
            return redirect()->back()->with('success', 'Banner deleted successfully.');
        }
        catch (\Exception $exception){
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }
}
