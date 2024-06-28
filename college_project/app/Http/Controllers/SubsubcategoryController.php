<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Subsubcategory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class SubsubcategoryController extends Controller
{
    public function index(){
        $subSubcategory = Subsubcategory::get();
        return view('admin.subsubcategory.index',compact('subSubcategory'));
    }

    public function getSubcategory($id)
    {
        $subCategory = SubCategory::where('category_id', $id)->get();
        return response()->json($subCategory);
    }
    public function store(Request $request){
        
        $slug = Str::slug($request->name . '-' . time());
        $i = 0;
        while (true) {
            if (Category::where('slug', '=', $slug)->exists()) {
                $i++;
                $slug .= '_' . $i;
                continue;
            }
            break;
        }
        try {
            $subSubcategory = new Subsubcategory();
        
            $subSubcategory->name = $request->name;
            $subSubcategory->category_id = $request->category_id;
            $subSubcategory->sub_category_id = $request->sub_category_id;
            $subSubcategory->image = $this->imageUpload($request, 'image', 'uploads/subSubcategory');
            $subSubcategory->save();
            DB::commit();
            if ($subSubcategory) {
                Session::flash('success', 'sububcategory Added Successfully');
                return back();
            } else {
                Session::flash('error', 'subSubcategory can not be added');
                return back();
            }
        } catch (Exception $e) {
            DB::rollBack();
            Session::flash('faild', 'subSubcategory create faild');
            return back();
        }
    }

    public function edit($id){
        $subSubcategory = Subsubcategory::find($id);
        $category = Category::all();
        $subcategory= SubCategory::all();
        return view('admin.subsubcategory.edit',compact('subSubcategory','category','subcategory'));
    }

    public function update(Request $request , $id)
    {
        $subSubcategory = Subsubcategory::find($id);
        $duplicate = Subsubcategory::where('id', '!=', $id)->where('category_id', $request->category_id)->where('name', $request->name)->get();
        if (count($duplicate) > 0) {
            Session::flash('duplicate', 'duplicate founded');
            return redirect()->back();
        } else {
            $subSubcategoryImage = '';
            if ($request->hasFile('image')) {
                if (!empty($subSubcategory->image) && file_exists($subSubcategory->image)) {
                    unlink($subSubcategory->image);
                }
                $subSubcategoryImage = $this->imageUpload($request, 'image', 'uploads/subSubcategory');
            } else {
                $subSubcategoryImage = $subSubcategory->image;
            }
            $subSubcategory->category_id = $request->category_id;
            $subSubcategory->sub_category_id = $request->sub_category_id;
            $subSubcategory->name = $request->name;
            $subSubcategory->image = $subSubcategoryImage;
            $subSubcategory->save();
            if ($subSubcategory) {
                Session::flash('success', 'subSubcategory Update Successfully');
                return redirect()->route('subsubcategory.index');
            } else {
                Session::flash('error', 'Update Fail');
                return redirect()->bacK();
            }
        }
    }
    public function delete($id){
        $subSubcategory = Subsubcategory::find($id);
        $subSubcategory->delete();
        if ($subSubcategory) {
            Session::flash('warning', 'Sub Subategory Delete Successfully');
            return redirect()->back();
        } else {
            Session::flash('error', 'Delete fail');
            return redirect()->back();
        }
    }
}
