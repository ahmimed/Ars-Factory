<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProjectImage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        return view('admin.dashboard', [
            'images' => ProjectImage::latest()->get(),
            'metaTitle' => __('site.admin.title'),
            'metaDescription' => __('site.admin.description'),
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'image' => ['required', 'image', 'mimes:jpg,jpeg,png,webp', 'max:4096'],
        ]);

        $path = $validated['image']->store('projects', 'public');

        ProjectImage::create([
            'image_path' => $path,
        ]);

        return back()->with('success', __('site.admin.uploaded'));
    }

    public function destroy(string $locale, ProjectImage $image): RedirectResponse
    {
        Storage::disk('public')->delete($image->image_path);
        $image->delete();

        return back()->with('success', __('site.admin.deleted'));
    }
}