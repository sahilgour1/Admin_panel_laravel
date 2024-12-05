<?php

namespace App\Http\Controllers;

use App\Models\Register; // Correct import for the model
use Illuminate\Http\Request;
use App\Models\blog;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
    public function register_user(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'First_Name' => 'required',
            'last_Name' => 'required',
            'email' => 'required|email',
            'number' => 'required|numeric',
            'password' => 'required|min:6', // Add a minimum length for better security
            'dob' => 'required|date',
            'gender' => 'required'
        ]);

        // Create a new instance of the Register model
        $register = new Register();

        // Set the fields based on the request data
        $register->first_name = $request->input('First_Name');
        $register->last_name = $request->input('last_Name');
        $register->email = $request->input('email');
        $register->number = $request->input('number');
        $register->password = $request->input('password'); // Hash the password
        $register->dob = $request->input('dob');
        $register->gender = $request->input('gender');

        // Save the data to the database
        $register->save();

        // Return response based on success
        if ($register) {
            return redirect('/dashboard');

            // return response()->json(['message' => 'Data inserted successfully!'], 201);
        } else {
            return response()->json(['message' => 'Failed to insert data.'], 500);
        }
    }

    function login(Request $request){

        $request->validate([

            "password"=>'required',
            "email"=>'required',

        ]);
        $user = register::where('email', $request->email)->first();

        if ($user && $user->password === $request->password) {
            session(['user' => $user]); 
            // 
            return redirect('/dashboard');
        }

        // Authentication failed
        return back()->withErrors(['email' => 'Invalid '])->withInput();
    }

    function dashboard(){
            // echo "cdc";die;
        return view("dashboard");
    }

    function insertblog(Request $request){
        $request->validate([
            'title' => 'required',
            'date' => 'required',
            'email' => 'required|email',
            'number' => 'required|numeric',
            'authorname' => 'required', // Add a minimum length for better security
            'category_for' => 'required',
            'gender' => 'required',
            'description' => 'required'
        ]);
        $blog = new blog();
        // Set the fields based on the request data
        $blog->title = $request->input('title');
        $blog->date = $request->input('date');
        $blog->email = $request->input('email');
        $blog->number = $request->input('number');
        $blog->authorname = $request->input('authorname'); // Hash the password
        $blog->category_for = $request->input('category_for');
        $blog->gender = $request->input('gender');
        $blog->description = $request->input('description');
        $blog->save();
        // Return response based on success
        if ($blog) {
            return redirect('/dashboard');

            // return response()->json(['message' => 'Data inserted successfully!'], 201);
        } else {
            return response()->json(['message' => 'Failed to insert data.'], 500);
        }
    }

    public function editblog($id)
    {
        $blog = Blog::find($id);
        if ($blog) {
            return view('editblog', compact('blog'));
        } else {
            return redirect()->route('bloglist')->with('error', 'Blog not found');
        }
    }
    
    public function userdatatable(Request $request)
    {
        try {
            $query = blog::select('id', 'authorname', 'title', 'date', 'category_for');
            // dd($query->get());
            return DataTables::of($query)
                ->addColumn('edit', function ($row) {
                    return '<a href="' . route('editblog', $row->id) . '" class="btn btn-sm delete-btn">Edit</a>';

                })
                ->addColumn('delete', function ($row) {
                    // return '<a href="/Deleteuser/' . $row->id . '" class="btn btn-sm edit-btn">Delete</a>';
                    return '<a href="' . route('deleteblog', $row->id) . '" class="btn btn-sm delete-btn" onclick="return confirm(\'Are you sure you want to delete this blog?\')">Delete</a>';
                })
                ->rawColumns(['edit', 'delete'])
                ->make(true);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
    }
    
    public function deleteblog($id)
    {
        $blog = Blog::find($id);
        if ($blog) {
            $blog->delete();
            return redirect()->route('bloglist')->with('success', 'Blog deleted successfully!');
        } else {
            return redirect()->route('bloglist')->with('error', 'Blog not found.');
        }
    }
    
    public function updateblog(Request $request){
        $blog = blog::find($request->id);
        if ($blog) {
            // Update the blog fields
            $blog->title = $request->input('title');
            $blog->date = $request->input('date');
            $blog->email = $request->input('email');
            $blog->number = $request->input('number');
            $blog->authorname = $request->input('authorname');
            $blog->category_for = $request->input('category_for');
            $blog->gender = $request->input('gender');
            $blog->description = $request->input('description');

            // Save the updated blog to the database
            if ($blog->save()) {
                return redirect()->route('bloglist')->with('success', 'Blog updated successfully!');
            } else {
                return redirect()->back()->with('error', 'Failed to update the blog.');
            }
        } else {
            return redirect()->route('bloglist')->with('error', 'Blog not found.');
        }
    }
   
    public function healthlist(){
        try {
            $query = blog::select('id', 'authorname', 'title', 'date', 'category_for')
            ->where('category_for', 'Health'); 
            return DataTables::of($query)
                ->addColumn('edit', function ($row) {
                    return '<a href="' . route('editblog', $row->id) . '" class="btn btn-sm delete-btn">Edit</a>';

                })
                ->addColumn('delete', function ($row) {
                    return '<a href="' . route('deleteblog', $row->id) . '" class="btn btn-sm delete-btn" onclick="return confirm(\'Are you sure you want to delete this blog?\')">Delete</a>';
                })
                ->rawColumns(['edit', 'delete'])
                ->make(true);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
    }

    public function blogeducationlist(){
        try {
            $query = blog::select('id', 'authorname', 'title', 'date', 'category_for')
            ->where('category_for', 'Education'); 
            return DataTables::of($query)
                ->addColumn('edit', function ($row) {
                    return '<a href="' . route('editblog', $row->id) . '" class="btn btn-sm delete-btn">Edit</a>';

                })
                ->addColumn('delete', function ($row) {
                    // return '<a href="/Deleteuser/' . $row->id . '" class="btn btn-sm edit-btn">Delete</a>';
                    return '<a href="' . route('deleteblog', $row->id) . '" class="btn btn-sm delete-btn" onclick="return confirm(\'Are you sure you want to delete this blog?\')">Delete</a>';
                })
                ->rawColumns(['edit', 'delete'])
                ->make(true);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
    }
}


