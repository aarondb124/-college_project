<?php

namespace App\Http\Controllers\Admin;

use DB;
use App\Models\Branch;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class BranchController extends Controller
{

    public function index()
    {
        $branch = Branch::latest()->get();
        return view('admin.branch.index', compact('branch'));
    }


    public function store(Request $request)
    {

        //dd($request->all());
        $request->validate([
            'name' => 'required|max:100',
            'phone' => 'required|max:18',
            'city' => 'required',
            'country' => 'required',
            'address' => 'required',
            'ip_address' => 'max:15'
        ]);

        try {

            DB::beginTransaction();
            $branch = new Branch();
            $branch->name = $request->name;
            $branch->image = $this->imageUpload($request, 'image', 'uploads/branch');
            $branch->phone = $request->phone;
            $branch->city = $request->city;
            $branch->postal = $request->postal;
            $branch->province = $request->province;
            $branch->country = $request->country;
            $branch->address = $request->address;
            $branch->description = $request->description;
            $branch->street_address = $request->street_address;
            $branch->street_address2 = $request->street_address2;
            $branch->map = $request->map;
            $branch->save();
            DB::commit();
            return redirect()->back()->with('success', 'Branch Inserted Successfully');
            
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Branch not inserted');
        }
    }



    public function edit($id)
    {
        $branch = Branch::where('id', $id)->first();
        return view('admin.branch.edit', compact('branch'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:100',
            'phone' => 'required|max:18',
            'city' => 'required',
            'country' => 'required',
            'address' => 'required',
            'ip_address' => 'max:15'
        ]);

        try {

            DB::beginTransaction();
            $branch = Branch::find($id);
            $branch->name = $request->name;
            $branchImage = '';
            if($request->hasFile('image')){
                if( $branch->image != null && file_exists($branch->image)){
                    unlink($branch->image);
                }
                $branchImage = $this->imageUpload($request, 'image', 'uploads/branch');
            }
            else{

                $branchImage = $branch->image; 
            }
            $branch->image = $branchImage;
            $branch->phone = $request->phone;
            $branch->city = $request->city;
            $branch->postal = $request->postal;
            $branch->province = $request->province;
            $branch->country = $request->country;
            $branch->address = $request->address;
            $branch->description = $request->description;
            $branch->street_address = $request->street_address;
            $branch->street_address2 = $request->street_address2;
            $branch->map = $request->map;
            $branch->save();
            DB::commit();
            return redirect()->route('branch.index')->with('success', 'Branch Updated Successfully');
            
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Branch not Updated');
        }
    }


    public function destroy($id)
    {

        $branch = Branch::where('id', $id)->first();
        if ($branch->image != null && file_exists($branch->image)) {
            @unlink($branch->image);
        }
        $branch->delete();
        return redirect()->back()->with('success', 'Branch Deleted Successfully');
    }

}
