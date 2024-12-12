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

class PageController extends Controller
{
    //
    public function insertpages(Request $request){
        $request->validate([
            'title' => 'required',
            'date' => 'required',
            'number' => 'required',
            'gender' => 'required',
            'description' => 'required'
        ]);
        $pages = new page();
        $pages->title = $request->input('title');
        $pages->date = $request->input('date');
        $pages->number = $request->input('number');
        $pages->gender = $request->input('gender');
        $pages->description = $request->input('description');
        $pages->save();
        // Return response based on success
        if ($pages) {
            return redirect('pagesection');

            // return response()->json(['message' => 'Data inserted successfully!'], 201);
        } else {
            return response()->json(['message' => 'Failed to insert data.'], 500);
        }
    }

    public function pagesdatatable(Request $request){
        try {
            $query = page::select('id', 'title', 'date', 'number', 'gender','description');
            // dd($query->get());
            if ($request->has('startDate') && $request->has('endDate')) {
                $startDate = $request->input('startDate');
                $endDate = $request->input('endDate');      
    
                if ($startDate && $endDate) {
                    $query->whereBetween('date', [$startDate, $endDate]);
                }
            }
            return DataTables::of($query)
                ->addColumn('edit', function ($row) {
                    return '<a href="' . route('editpages', $row->id) . '" class="btn btn-sm delete-btn">
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

    public function editpages($id){
        $page = page::find($id);
        if ($page) {
            return view('editpages', compact('page'));
        } else {
            return redirect()->route('bloglist')->with('error', 'Blog not found');
        }
    }

    public function updatepages(Request $request){
        
        $page = page::find($request->id);

        if ($page) {
            $page->title = $request->input('title');
            $page->date = $request->input('date');
            $page->number = $request->input('number');
            $page->gender = $request->input('gender');
            $page->description = $request->input('description');
            if ($page->save()) {
                return redirect()->route('pagelist')->with('success', 'Blog updated successfully!');
            } else {
                return redirect()->back()->with('error', 'Failed to update the blog.');
            }
        } else {
            return redirect()->route('bloglist')->with('error', 'Blog not found.');
        }
    }
}
