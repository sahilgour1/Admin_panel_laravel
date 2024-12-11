<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session; // Import Session
use App\Models\Register;
use App\Models\blog;
use App\Models\menu;
use App\Models\page;
use App\Models\newspost;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class MyprofileController extends Controller
{
    public function myprofile()
    {
        $session_id = Session::get('user.id');
        $myprofile = Register::find($session_id);
        if ($myprofile) {
            return view('myprofile', compact('myprofile'));
        } else {
            return redirect()->route('bloglist')->with('error', 'Blog not found');
        }
    }

    public function update_user(Request $request){
        $myprofile = Register::find($request->id);
        if ($myprofile) {
            $myprofile->First_Name = $request->input('First_Name');
            $myprofile->last_Name = $request->input('last_Name');
            $myprofile->email = $request->input('email');
            $myprofile->number = $request->input('number');
            $myprofile->password = $request->input('password');
            $myprofile->dob = $request->input('dob');
            $myprofile->gender = $request->input('gender');
            if ($myprofile->save()) {
                return redirect()->route('myprofile')->with('success', 'Blog updated successfully!');
            } else {
                return redirect()->back()->with('error', 'Failed to update the blog.');
            }
        } else {
            return redirect()->route('bloglist')->with('error', 'Blog not found.');
        }
    }

    public function logout(){
        // \Session::flush();
        // \Auth::logout();
        return  view("loginform");

    }
}
