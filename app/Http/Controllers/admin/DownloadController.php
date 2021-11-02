<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Download;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class DownloadController extends Controller
{

    public function __construct(){ $this->middleware('auth');}

    public function index()
    {
        $downloads = Download::all();
        return view('admin.download.show', compact('downloads'));
    }

    public function create()
    {
        if (Auth::user()->can('downloads.create')) {
            return view('admin.download.create');
        }
        $message = "add download files";
        return view('admin.unauthorised', compact('message'));
    }

    public function store(Request $request)
    {


        $this->validate($request, [
            'file' => 'required',
            'title' => 'required|unique:downloads',
            'description' => 'required',
        ]);

        $download = new Download();
        $download->title = $request->title;
        $download->slug = Str::slug($request->title);
        $download->description = $request->description;
        $download->file_type = $request->file_type;
        $download->status = $request->status;

        if ($request->hasFile('file')) {
            $download->file = $request->file->store('public/files/downloads');
        }
        $download->save();
        return redirect()->back()->with('success', 'Download created successfully');
    }

    public function edit($id)
    {
        if (Auth::user()->can('downloads.update')) {

            $download = Download::where('id', $id)->first();
            return view('admin.download.edit', compact('download'));
        }

        $message = "edit download files";
        return view('admin.unauthorised', compact('message'));


    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
        ]);

        $download = Download::find($id);
        $download->title = $request->title;
        $download->slug = Str::slug($request->title);
        $download->description = $request->description;
        $download->file_type = $request->file_type;
        $download->status = $request->status;

        if ($request->hasFile('file')) {
            $file = 'storage/files/downloads/' . substr($download->file, 23);

            //delete old offer first
            if (file_exists($file)) {
                unlink($file);
            }
            $download->file = $request->file->store('public/files/downloads');

        }

        $download->save();
        return redirect()->back()->with('success', 'Download Updated successfully');
    }

    public function destroy($id)
    {
        if (Auth::user()->can('downloads.update')) {

            $download = Download::find($id);
            $file = 'storage/files/downloads/' . substr($download->file, 23);
            //delete old offer first
            if (file_exists($file)) {
                unlink($file);
            }
            Download::where('id', $id)->delete();
            return redirect()->back()->with('success', 'Download deleted successfully');
        }
        $message = "delete download files";
        return view('admin.unauthorised', compact('message'));
    }
}
