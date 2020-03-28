<?php

namespace App\Http\Controllers;

use App\Image;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

/**
 * Class ImageController
 * @package App\Http\Controllers
 */
class ImageController extends Controller
{
    /**
     * @return string
     */
    public function create()
    {
        return view('images.create');
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function store(Request $request)
    {
        $path = $request->file('image')->store('images', 's3');
//        Storage::disk('s3')->setVisibility($path,'public');

        $image = Image::create([
            'filename' => basename($path),
            'url' => Storage::disk('s3')->url($path)
        ]);
        return $image;
    }

    /**
     * @param Image $image
     * @return mixed
     */
    public function show(Image $image)
    {
        return $image->url;
    }

    /**
     * @param Image $image
     * @return RedirectResponse|Redirector
     */
    public function download(Image $image)
    {
        $url = Image::query()->where('url', $image->url)->first();
        return Storage::disk('s3')->download($url->url);
    }
}
