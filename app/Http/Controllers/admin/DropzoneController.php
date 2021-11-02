<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class DropzoneController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function dropzone()
    {
        return view('admin.image.upload');
    }

    public function dropzoneStore(Request $request)
    {
        $image = $request->file('file');

        $imageName = time() . '.' . $image->extension();
        $image->move(public_path('images'), $imageName);

        return response()->json(['success' => $imageName]);
    }

    public function images()
    {
        $images = \File::allFiles(public_path('images'));
        return view('admin.image.show', compact('images'));
    }

    public function dropzoneDelete(Request $request)
    {
        if (Auth::user()->can('images.delete')) {

            $file = 'images/' . $request->delete;
            if (file_exists($file)) {
                unlink($file);
            }
            return redirect()->back()->with('success', 'Image deleted successfully');

        }

        $message = "delete images";
        return view('admin.unauthorised', compact('message'));

    }

}
