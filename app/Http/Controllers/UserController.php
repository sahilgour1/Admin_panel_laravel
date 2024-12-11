<?php

namespace App\Http\Controllers;

use App\Models\Register; // Correct import for the model
use Illuminate\Http\Request;
use App\Models\blog;
use App\Models\menu;
use App\Models\page;
use App\Models\newspost;
use App\Models\categoryfor;
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
        $user = new Register();

        // Set the fields based on the request data
        $user->first_name = $request->input('First_Name');
        $user->last_name = $request->input('last_Name');
        $user->email = $request->input('email');
        $user->number = $request->input('number');
        $user->password = $request->input('password'); // Hash the password
        $user->dob = $request->input('dob');
        $user->gender = $request->input('gender');

        // Save the data to the database
        $user->save();

        // Return response based on success
        if ($user) {
            session(['user' => $user]); 

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
    function dashboard()
    {
        $categoryfor = categoryfor::all(); 
        // dd($categoryfor);
        if ($categoryfor) {
            return view('dashboard', compact('categoryfor'));
        } else {
            return redirect()->route('bloglist')->with('error', 'No categories found');
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
    
    public function newseducationlist(){
        try {
            $query = newspost::select('id', 'title', 'date', 'date', 'category_for')
            ->where('category_for', 'Education');
            // dd($query->get());
            return DataTables::of($query)
                ->addColumn('edit', function ($row) {
                    return '<a href="' . route('editnews', $row->id) . '" class="btn btn-sm delete-btn">Edit</a>';

                })
                ->addColumn('delete', function ($row) {
                    // return '<a href="/Deleteuser/' . $row->id . '" class="btn btn-sm edit-btn">Delete</a>';
                    return '<a href="' . route('deletenews', $row->id) . '" class="btn btn-sm delete-btn" onclick="return confirm(\'Are you sure you want to delete this blog?\')">Delete</a>';
                })
                ->rawColumns(['edit', 'delete'])
                ->make(true);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }

    }

    public function companyuserdatatable(){

        try {
            $query = Register::select('id', 'First_Name', 'last_Name', 'email', 'gender');
            // dd($query->get());
            return DataTables::of($query)
                ->addColumn('edit', function ($row) {
                    return '<a href="' . route('editcompanyuser', $row->id) . '" class="btn btn-sm delete-btn">
                     <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="blue" class="bi bi-pencil-square" viewBox="0 0 16 16">
                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                    </svg>
                    </a>';
                })
                ->addColumn('delete', function ($row) {
                    return '<a href="' . route('deleteblog', $row->id) . '" class="btn btn-sm delete-btn" onclick="return confirm(\'Are you sure you want to delete this blog?\')">
                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="red" class="bi bi-trash" viewBox="0 0 16 16">
                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                        <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
                    </svg>
                    </a>';
                })
                ->rawColumns(['edit', 'delete'])
                ->make(true);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
    }

    public function editcompanyuser($id){
        $data = register::find($id);
        if ($data) {
            return view('editcompanyuser', compact('data'));
        } else {
            return redirect()->route('bloglist')->with('error', 'Blog not found');
        }
    }

    public function update_user(Request $request){
        $data = Register::find($request->id);
        if ($data) {
            $data->First_Name = $request->input('First_Name');
            $data->last_Name = $request->input('last_Name');
            $data->email = $request->input('email');
            $data->number = $request->input('number');
            $data->dob = $request->input('dob');
            $data->gender = $request->input('gender');
            if ($data->save()) {
                return redirect()->route('userlist')->with('success', 'Blog updated successfully!');
            } else {
                return redirect()->back()->with('error', 'Failed to update the blog.');
            }
        } else {
            return redirect()->route('newslist')->with('error', 'Blog not found.');
        }
    }


    public function add_user(Request $request)
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
            return redirect()->route('userlist')->with('success', 'Blog updated successfully!');
        } else {
            return response()->json(['message' => 'Failed to insert data.'], 500);
        }
    }

}


