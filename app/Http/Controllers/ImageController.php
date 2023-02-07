<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class ImageController extends Controller
{
    public function store(Request $request): JsonResponse
    {
        $request->validate([
            'file' => ['required', 'image']
        ]);

        $file = $request->file('file');
        $fileName = Str::uuid() . "." . $file->extension();

        $imageServer = Image::make($file);
        $imageServer->fit(1000, 1000);
        $imageServer->save(public_path('uploads/' . $fileName));

        return response()->json(['file' => $fileName]);
    }
}
