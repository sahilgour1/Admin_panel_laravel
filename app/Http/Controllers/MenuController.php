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

class MenuController extends Controller
{
    //
    public function insertmenu(Request $request){
        $request->validate([
            'category' => 'required',
            'permission' => 'required',
        ]);
        $menu = new menu();

        $menu->category = $request->input('category');
        $menu->permission = $request->input('permission');
        $menu->save();
        // echo "save"; die; 
        // Return response based on success
        if ($menu) {
            return redirect('menubar');

            // return response()->json(['message' => 'Data inserted successfully!'], 201);
        } else {
            return response()->json(['message' => 'Failed to insert data.'], 500);
        }
    }

    public function menudatatable(){
        try {
            $query = menu::select('id', 'category', 'permission');
            // dd($query->get());
            return DataTables::of($query)
                ->addColumn('edit', function ($row) {
                    return '<a href="' . route('editmenu', $row->id) . '" class="btn btn-sm delete-btn">
                       <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="blue" class="bi bi-pencil-square" viewBox="0 0 16 16">
                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                    </svg>
                    </a>';
                })
                ->addColumn('delete', function ($row) {
                    // return '<a href="/Deleteuser/' . $row->id . '" class="btn btn-sm edit-btn">Delete</a>';
                    return '<a href="' . route('deletemenu', $row->id) . '" class="btn btn-sm delete-btn" onclick="return confirm(\'Are you sure you want to delete this blog?\')">
                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="red" class="bi bi-trash" viewBox="0 0 16 16">
                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                        <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
                    </svg>
                    </a>';
                })
                ->addColumn('addmenu', function ($row) {
                    return '<a href="' . route('addmenubar', $row->id) . '" class="btn btn-sm delete-btn">
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
                         <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5"/>
                    </svg>
                    </a>';

                })                
                ->rawColumns(['edit', 'delete', 'addmenu'])
                ->make(true);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
    }

    public function editmenu($id){
        $menu = menu::find($id);
        if ($menu) {
            return view('editmenu', compact('menu'));
        } else {
            return redirect()->route('updatemenu')->with('error', 'Blog not found');
        }
    }
    function deletemenu($id){
        $menu = menu::find($id);
        if ($menu) {
            $menu->delete();
            return redirect()->route('menulist')->with('success', 'Blog deleted successfully!');
        } else {
            return redirect()->route('menulist')->with('error', 'Blog not found.');
        }

    }

    function addmenubar($id){
        $menu = menu::whereid($id)->first();
        $finalmenu_output = json_decode($menu, true);
        if ($finalmenu_output ) {
            return view('addmenubar', compact('finalmenu_output'));
        } else {
            return redirect()->route('updatemenu')->with('error', 'Blog not found');
        }
    }

    public function updatemenu(Request $request){
        $menu = menu::find($request->id);
        if ($menu) {
        $menu->category = $request->input('category');
        $menu->permission = $request->input('permission');
            if ($menu->save()) {
                return redirect()->route('menulist')->with('success', 'menu updated successfully!');
            } else {
                return redirect()->back()->with('error', 'Failed to update the blog.');
            }
        } else {
            return redirect()->route('menulist')->with('error', 'menu not found.');
        }
    }
    function updatejsondata(Request $request){
        $blog = menu::find($request->id);
        if ($blog) {
            $blog->json_output = $request->input('json_output');
          

            // Save the updated blog to the database
            if ($blog->save()) {
                return redirect()->route('menulist')->with('success', 'Blog updated successfully!');
            } else {
                return redirect()->back()->with('error', 'Failed to update the blog.');
            }
        } else {
            return redirect()->route('addmenubar')->with('error', 'Blog not found.');
        }
    }
}
