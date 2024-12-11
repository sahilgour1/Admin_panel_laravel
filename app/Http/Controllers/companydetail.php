<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\blog;
use App\Models\menu;
use App\Models\page;
use App\Models\newspost;
use App\Models\companydetails;
use App\Models\companyaddress;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Log;
class companydetail extends Controller
{
    //

    public function insertcompanydetail(Request $request){
        $request->validate([
            'companyname' => 'required',
            'companytype' => 'required',
            'companyemail' => 'required',
            'companydate' => 'required',
        ]);
        $companydetail = new companydetails();
        // Set the fields based on the request data
        $companydetail->companyname = $request->input('companyname');
        $companydetail->companytype = $request->input('companytype');
        $companydetail->companyemail = $request->input('companyemail');
        $companydetail->companydate = $request->input('companydate');
        $companydetail->save();
        // Return response based on success
        if ($companydetail) {
            return view('companyprofile');

            // return response()->json(['message' => 'Data inserted successfully!'], 201);
        } else {
            return response()->json(['message' => 'Failed to insert data.'], 500);
        }
    }

 
    public function companydetaildatatable(){

        try {
            $query = companydetails::select('id', 'companyname', 'companytype', 'companydate');
            // dd($query->get());
            return DataTables::of($query)
                ->addColumn('edit', function ($row) {
                    return '<a href="' . route('editcompanyaddress', $row->id) . '" class="btn btn-sm delete-btn">Edit</a>';

                })
                ->addColumn('delete', function ($row) {
                    return '<a href="' . route('deletecompanyaddress', $row->id) . '" class="btn btn-sm delete-btn" onclick="return confirm(\'Are you sure you want to delete this blog?\')">Delete</a>';
                })
                ->addColumn('View Address', function ($row) {
                    return '<button data-company-id="' . $row->id . '" 
                                    class="btn btn-sm btn-primary view-address-btn">
                                View Address
                            </button>';
                })
                ->rawColumns(['edit', 'delete','View Address'])
                ->make(true);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
    }

    public function editcompanyaddress($id)
    {
        $companydetail = companydetails::find($id);
        if ($companydetail) {
            return view('editcomapnydetail', compact('companydetail'));
        } else {
            return redirect()->route('bloglist')->with('error', 'Blog not found');
        }
    }

    public function deletecompanyaddress($id){
        $companydetails = companydetails::find($id);
        if ($companydetails) {
            $companydetails->delete();
            return redirect()->route('compayprofilelist')->with('success', 'Blog deleted successfully!');
        } else {
            return redirect()->route('bloglist')->with('error', 'Blog not found.');
        }
    }

    public function updatecompanydetail(Request $request){
        $companydetail = companydetails::find($request->id);
        if ($companydetail) {
            $companydetail->companyname = $request->input('companyname');
            $companydetail->companytype = $request->input('companytype');
            $companydetail->companyemail = $request->input('companyemail');
            $companydetail->companydate = $request->input('companydate');
            // Save the updated blog to the database
            if ($companydetail->save()) {
                return redirect()->route('compayprofilelist')->with('success', 'Blog deleted successfully!');

            } else {
                return redirect()->back()->with('error', 'Failed to update the blog.');
            }
        } else {
            return redirect()->route('bloglist')->with('error', 'Blog not found.');
        }
    }
    public function userAddressData(Request $request)
    {
        // Get the company ID from the request
        $companyId = $request->input('companyid');
    
        // Fetch the data from the database
        $model = new companyaddress();
        $data = $model->getUserCompanyAddressData($companyId);
    
        // Return JSON response based on data availability
        if ($data) {
            return response()->json(['status' => 'success', 'data' => $data]);
        } else {
            return response()->json(['status' => 'error', 'message' => 'No data found for the given ID!']);
        }
    }

    public function saveAnotherCompanyAddress(Request $request)
    {
        Log::info('POST Data: ', $request->all());
        $companyId = $request->input('company_id');
        $ids = $request->input('id');
        $addresses = $request->input('address');
        $latitudes = $request->input('latitude');
        $longitudes = $request->input('longitude');
        $mobiles = $request->input('mobile');
    
        $data = [];
        for ($i = 0; $i < count($addresses); $i++) {
            $data[] = [
                'user_id' => $companyId,
                'id' => $ids[$i] ?? null,
                'address' => $addresses[$i],
                'latitude' => $latitudes[$i],
                'longtude' => $longitudes[$i],
                'mobile' => $mobiles[$i],
            ];
        }
    
        try {
            foreach ($data as $row) {
                Log::info('Processing Row: ', $row);
    
                // Update if ID exists, otherwise create new
                if (isset($row['id']) && $row['id']) {
                    $existingRow = companyaddress::find($row['id']);
                    if ($existingRow) {
                        $existingRow->update($row);
                        Log::info('Row Updated: ', $row);
                    }
                } else {
                    companyaddress::create($row);
                    Log::info('Row Created: ', $row);
                }
            }
            return response()->json(['status' => 'success', 'message' => 'Data saved successfully']);
        } catch (\Exception $e) {
            Log::error('Error saving company address: ' . $e->getMessage());
            return response()->json(['status' => 'error', 'message' => 'Failed to save data.']);
        }
    }
    
  
    public function deleteaddressdata(Request $request)
    {
        $addressId = $request->input('addressId');
        if (!$addressId) {
            return response()->json(['status' => 'error', 'message' => 'Address ID is required!'], 400);
        }
        $model = CompanyAddress::find($addressId);
        if ($model) {
            $model->delete();
            return response()->json(['status' => 'success', 'message' => 'Address deleted successfully!']);
        } else {
            return response()->json(['status' => 'error', 'message' => 'No data found for the given ID!'], 404);
        }
    }
}

