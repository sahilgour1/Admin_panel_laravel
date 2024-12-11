<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\blog;
use App\Models\menu;
use App\Models\page;
use App\Models\newspost;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class NewsController extends Controller
{
    //
    public function insertnews(Request $request)
    {
        // Validate the request
        $request->validate([
            'title' => 'required',
            'date' => 'required',
            'email' => 'required|email',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Ensure it's an image
            'authorname' => 'required',
            'category_for' => 'required',
            'gender' => 'required',
            'description' => 'required'
        ]);
        $news = new newspost();
        $news->title = $request->input('title');
        $news->date = $request->input('date');
        $news->email = $request->input('email');
        $news->authorname = $request->input('authorname');
        $news->category_for = $request->input('category_for');
        $news->gender = $request->input('gender');
        $news->description = $request->input('description');
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $imagePath = 'images/' . $imageName;
            $image->move(public_path('images'), $imageName);
            $news->image = $imagePath;
        }
        if ($news->save()) {
            return redirect()->route('newspost')->with('success', 'News post added successfully.');
        } else {
            return response()->json(['message' => 'Failed to insert data.'], 500);
        }
    }

    public function newsdatatable(Request $request){

        try {
            $query = newspost::select('id', 'title', 'date', 'date', 'category_for');
            // dd($query->get());
            return DataTables::of($query)
                ->addColumn('edit', function ($row) {
                    return '<a href="' . route('editnews', $row->id) . '" class="btn btn-sm delete-btn">
                     <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="blue" class="bi bi-pencil-square" viewBox="0 0 16 16">
                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                    </svg>
                    </a>';

                })
                ->addColumn('delete', function ($row) {
                    // return '<a href="/Deleteuser/' . $row->id . '" class="btn btn-sm edit-btn">Delete</a>';
                    return '<a href="' . route('deletenews', $row->id) . '" class="btn btn-sm delete-btn" onclick="return confirm(\'Are you sure you want to delete this blog?\')">
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

    public function editnews($id)
    {
        $news = newspost::find($id);
        if ($news) {
            return view('editnews', compact('news'));
        } else {
            return redirect()->route('bloglist')->with('error', 'Blog not found');
        }
    }

    public function  deletenews($id)
    {
        $news = newspost::find($id);
        if ($news) {
            $news->delete();
            return redirect()->route('newslist')->with('success', 'Blog deleted successfully!');
        } else {
            return redirect()->route('bloglist')->with('error', 'Blog not found.');
        }
    }

    public function updatenews(Request $request){
        $news = newspost::find($request->id);
        if ($news) {
            $news->title = $request->input('title');
            $news->date = $request->input('date');
            $news->email = $request->input('email');
            $news->image = $request->input('image');
            $news->authorname = $request->input('authorname');
            $news->category_for = $request->input('category_for');
            $news->gender = $request->input('gender');
            $news->description = $request->input('description');
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time() . '_' . $image->getClientOriginalName();
                $imagePath = 'images/' . $imageName;
                $image->move(public_path('images'), $imageName);
                $news->image = $imagePath;
            }
            // Save the updated blog to the database
            if ($news->save()) {
                return redirect()->route('newslist')->with('success', 'Blog updated successfully!');
            } else {
                return redirect()->back()->with('error', 'Failed to update the blog.');
            }
        } else {
            return redirect()->route('newslist')->with('error', 'Blog not found.');
        }

    }

    public function healthnewsdatatable(){
        try {
            $query = newspost::select('id', 'title', 'date', 'date', 'category_for')
            ->where('category_for', 'Health');
            // dd($query->get());
            return DataTables::of($query)
                ->addColumn('edit', function ($row) {
                    return '<a href="' . route('editnews', $row->id) . '" class="btn btn-sm delete-btn">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="blue" class="bi bi-pencil-square" viewBox="0 0 16 16">
                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                    </svg>
                    </a>';

                })
                ->addColumn('delete', function ($row) {
                    // return '<a href="/Deleteuser/' . $row->id . '" class="btn btn-sm edit-btn">Delete</a>';
                    return '<a href="' . route('deletenews', $row->id) . '" class="btn btn-sm delete-btn" onclick="return confirm(\'Are you sure you want to delete this blog?\')">
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

    
    public function educationnewsdatatable(){
        try {
            $query = newspost::select('id', 'title', 'date', 'date', 'category_for')
            ->where('category_for', 'Education');
            // dd($query->get());
            return DataTables::of($query)
                ->addColumn('edit', function ($row) {
                    return '<a href="' . route('editnews', $row->id) . '" class="btn btn-sm delete-btn">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="blue" class="bi bi-pencil-square" viewBox="0 0 16 16">
                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                    </svg>
                    </a>';

                })
                ->addColumn('delete', function ($row) {
                    // return '<a href="/Deleteuser/' . $row->id . '" class="btn btn-sm edit-btn">Delete</a>';
                    return '<a href="' . route('deletenews', $row->id) . '" class="btn btn-sm delete-btn" onclick="return confirm(\'Are you sure you want to delete this blog?\')">
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
}
