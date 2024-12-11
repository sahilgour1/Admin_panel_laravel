<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session; 
use App\Models\Register;
use App\Models\blog;
use App\Models\menu;
use App\Models\page;
use App\Models\newspost;
use App\Models\contact;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;


class UiController extends Controller
{
    //
    public function ui(){
        $blog = blog::all(); 
        $news = newspost::all(); 

        // dd($news);
        if ($blog) {
            return view('ui', compact('blog','news'));
        } else {
            return redirect()->route('bloglist')->with('error', 'No categories found');
        }
    }

    public function contactus(Request $request)
    {
      

        // Save data to the database
        $contact = new Contact();
        $contact->name = $request->input('name');
        $contact->email =  $request->input('email');
        $contact->number =  $request->input('number');
        $contact->comment =  $request->input('comment');
        $contact->save();

        // Return a JSON response
        return response()->json(['status' => 'success', 'message' => 'Data saved successfully!'], 201);
    }
}
