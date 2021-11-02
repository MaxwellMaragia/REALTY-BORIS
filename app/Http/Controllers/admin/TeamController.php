<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\team_member;
use Illuminate\Support\Facades\Auth;

class TeamController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        //
        $members = team_member::all();
        return view('admin.team.show',compact('members'));
    }

    public function create()
    {
        //
        if(Auth::user()->can('members.update')) {
            return view('admin.team.create');
        }

        $message = "add team members";
        return view('admin.unauthorised',compact('message'));

    }


    public function store(Request $request)
    {
        $this->validate($request,[
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5048',
            'short_description' => 'required',
            'role' => 'required',
            'name'=>'required|unique:team_members',
        ]);

        $members = new team_member();
        $members->name = $request->name;
        $members->role = $request->role;
        $members->short_description = $request->short_description;
        $members->facebook = $request->facebook;
        $members->website = $request->website;
        $members->linkedin = $request->linkedin;
        $members->status = $request->status;

        if($request->hasFile('image'))
        {

            $members->image = $request->image->store('public/files/members');
        }

        $members->save();
        return redirect()->back()->with('success','Member created successfully');
    }

    public function edit($id)
    {
        if(Auth::user()->can('members.update')) {

            $member = team_member::where('id',$id)->first();
            return view('admin.team.edit',compact('member'));
        }

        $message = "edit team member details";
        return view('admin.unauthorised',compact('message'));



    }


    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:5048',
            'short_description' => 'required',
            'role' => 'required',
            'name'=>'required',
        ]);

        $members = team_member::find($id);
        $members->name = $request->name;
        $members->role = $request->role;
        $members->short_description = $request->short_description;
        $members->facebook = $request->facebook;
        $members->website = $request->website;
        $members->linkedin = $request->linkedin;
        $members->status = $request->status;

        if($request->hasFile('image'))
        {
            $current_image = 'storage/files/members/'.substr($members->image,21);

            //delete old members first
            if(file_exists($current_image))
            {
                unlink($current_image);
            }
            $members->image = $request->image->store('public/files/members');
        }

        $members->save();
        return redirect()->back()->with('success','Member updated successfully');
    }


    public function destroy($id)
    {
        //
        if(Auth::user()->can('members.update')) {
            $members = team_member::find($id);
            $current_image = 'storage/files/members/'.substr($members->image,21);

            //delete old members first
            if(file_exists($current_image))
            {
                unlink($current_image);
            }
            team_member::where('id',$id)->delete();
            return redirect()->back()->with('success','Member deleted successfully');
        }

        $message = "delete this member";
        return view('admin.unauthorised',compact('message'));

    }
}
