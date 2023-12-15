<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class PhotoController extends Controller
{
    public function store(Request $request)
    {
        $file = $request->file('image');
        $file->move('storage/gallery', $file->getClientOriginalName());
        return to_route('admin.galeria');
    }

    public function destroy(string $photo)
    {
        Storage::disk('public')->delete($photo);
        return to_route('admin.galeria');
    }
}
