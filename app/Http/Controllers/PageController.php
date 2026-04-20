<?php

namespace App\Http\Controllers;

use App\Models\ProjectImage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PageController extends Controller
{
    public function home(): View
    {
        $images = ProjectImage::latest()->take(6)->get();

        return view('pages.home', [
            'images' => $images,
            'metaTitle' => __('site.meta.home_title'),
            'metaDescription' => __('site.meta.home_description'),
        ]);
    }

    public function about(): View
    {
        return view('pages.about', [
            'metaTitle' => __('site.meta.about_title'),
            'metaDescription' => __('site.meta.about_description'),
        ]);
    }

    public function services(): View
    {
        return view('pages.services', [
            'metaTitle' => __('site.meta.services_title'),
            'metaDescription' => __('site.meta.services_description'),
        ]);
    }

    public function projects(): View
    {
        return view('pages.projects', [
            'images' => ProjectImage::latest()->get(),
            'metaTitle' => __('site.meta.projects_title'),
            'metaDescription' => __('site.meta.projects_description'),
        ]);
    }

    public function contact(): View
    {
        return view('pages.contact', [
            'metaTitle' => __('site.meta.contact_title'),
            'metaDescription' => __('site.meta.contact_description'),
        ]);
    }

    public function sendContact(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:120'],
            'email' => ['required', 'email', 'max:160'],
            'message' => ['required', 'string', 'max:3000'],
        ]);

        return back()->with('success', __('site.contact.success'));
    }
}