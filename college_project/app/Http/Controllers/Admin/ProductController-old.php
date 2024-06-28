<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Support\Str;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductStoreRequest;
use App\Http\Requests\ProductUpdateRequest;
use App\Models\Brand;
use App\Models\CameraFormat;
use App\Models\EffectivePixel;
use App\Models\Inventory;
use App\Models\MonitorSize;
use App\Models\Pixel;
use App\Models\ProductFeature;
use App\Models\RecordingMode;
use App\Models\Sensor;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Session;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $product = Product::with('inventory')->latest()->get();
        return view('admin.product.index', compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        $data['brand'] = Brand::all();
        $data['category'] = Category::all();
        $data['camera_format'] = CameraFormat::all();
        $data['pixel'] = Pixel::all();
        $data['recording_mode'] = RecordingMode::all();
        $data['sensor'] = Sensor::all();
        $data['monitor_size'] = MonitorSize::all();
        $data['effective_pixel'] = EffectivePixel::all();
        $data['product'] = Product::latest()->take('10')->get();
        return view('admin.product.create', $data);
    }

    public function getSubcategory($id)
    {
        $subCategory = SubCategory::where('category_id', $id)->get();
        return response()->json($subCategory);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductStoreRequest $request)
    {

        // dd($request->all());
       
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
            DB::beginTransaction();
            $productCode = $this->generateCode('Product', 'P');
            $product = new Product();
            $product->name = $request->name;
            $product->model = $request->model;
            $product->slug = $slug;
            $product->code = $productCode;
            $product->category_id = $request->category_id;
            $product->sub_category_id = $request->sub_category_id;
            $product->brand_id = $request->brand_id;
            $product->pixel_id = $request->pixel_id;
            $product->recording_mode_id = $request->recording_mode_id;
            $product->camera_format_id = $request->camera_format_id;
            $product->sensor_id = $request->sensor_id;
            $product->effective_pixel_id = $request->sensor_id;
            $product->monitor_size_id = $request->monitor_size_id;
            $product->price = $request->price;
            $product->discount = $request->discount;
            $product->buy = $request->buy;
            $product->rent = $request->rent;
            $product->is_feature = $request->is_feature ?? 0;
            $product->is_offer = $request->is_offer ?? 0;
            $product->new_status = $request->new_status ?? 0;
            $product->short_details = $request->short_details;
            $product->deal_start = $request->deal_start;
            $product->deal_end = $request->deal_end;
            $product->description = $request->description;
            $product->image = $this->imageUpload($request, 'image', 'uploads/product') ?? '';
            $product->save_by = 1;
            $product->ip_address = $request->ip();
            $product->save();

            $productImages = $this->imageUpload($request, 'otherImage', 'uploads/otherImage');
            if (is_array($productImages) && count($productImages)) {
                foreach ($productImages as $image) {
                    $imagePath = new ProductImage();
                    $imagePath->product_id = $product->id;
                    $imagePath->otherImage = $image;
                    $imagePath->save();
                }
            }

            $f_count = count($request->features);

            for ($i = 0; $i < $f_count; $i++) {
                $feature = new ProductFeature();
                $feature->name = $request->features[$i];
                $feature->product_id = $product->id;
                $feature->save();
            }

            $purchage = new Inventory();
            $purchage->product_id = $product->id;
            $purchage->purchage = $request->purchage;
            $purchage->save();
            DB::commit();
            if ($product) {
                Session::flash('success', 'Product Added Successfully');
                return back();
            } else {
                Session::flash('error', 'Product can not be added');
                return back();
            }
        } catch (Exception $e) {
            DB::rollBack();
            Session::flash('faild', 'Product create faild');
            return back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    public function removeImage($id)
    {
        try {
            $removeImage = ProductImage::find($id);
            if (!empty($removeImage->otherImage) && file_exists($removeImage->otherImage)) {
                unlink($removeImage->otherImage);
            }
            $removeImage->delete();
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $data['brand'] = Brand::all();
        $data['category'] = Category::all();
        $data['camera_format'] = CameraFormat::all();
        $data['pixel'] = Pixel::all();
        $data['recording_mode'] = RecordingMode::all();
        $data['sensor'] = Sensor::all();
        $data['monitor_size'] = MonitorSize::all();
        $data['effective_pixel'] = EffectivePixel::all();
        $data['product'] = Product::with('inventory', 'features')->where('slug', $slug)->first();
        return view('admin.product.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductUpdateRequest $request, $id)
    {
      
        // dd($request->all());
        
        try {
             $product = Product::find($id);
            $duplicate = Product::where('id', '!=', $id)->where('code', $request->code)->get();
                if (count($duplicate) > 0) {
                    Session::flash('error', ' Product Code duplicate found ');
                    return back();
                } else {
                    $product_image = '';
                    if ($request->hasFile('image')) {
                        if (!empty($product->image) && file_exists($product->image)) {
                            unlink($product->image);
                        }
                        $product_image = $this->imageUpload($request, 'image', 'uploads/product');
                    } else {
                        $product_image = $product->image;
                    }
                    $slug                        = Str::slug($request->name . '-' . time());
                    $product->name               = $request->name;
                    $product->model              = $request->model;
                    $product->slug               = $slug;
                    $product->category_id        = $request->category_id;
                    $product->sub_category_id    = $request->sub_category_id;
                    $product->brand_id           = $request->brand_id;
                    $product->pixel_id           = $request->pixel_id;
                    $product->recording_mode_id  = $request->recording_mode_id;
                    $product->camera_format_id   = $request->camera_format_id;
                    $product->sensor_id          = $request->sensor_id;
                    $product->effective_pixel_id = $request->sensor_id;
                    $product->price              = $request->price;
                    $product->discount           = $request->discount;
                    $product->buy                = $request->buy;
                    $product->rent               = $request->rent;
                    $product->is_feature         = $request->is_feature ?? 0;
                    $product->is_offer           = $request->is_offer ?? 0;
                    $product->new_status         = $request->new_status ?? 0;
                    $product->short_details      = $request->short_details;
                    $product->deal_start         = $request->deal_start;
                    $product->deal_end           = $request->deal_end;
                    $product->description        = $request->description;
                    $product->image              = $product_image;
                    $product->save_by            = Auth::user()->id;
                    $product->ip_address         = $request->ip();
                    $product->save();
        
                    // multiple image
                    $productImages = $this->imageUpload($request, 'otherImage', 'uploads/otherImage');
                    if (is_array($productImages) && count($productImages)) {
                        foreach ($productImages as $image) {
                            $imagePath = new ProductImage();
                            $imagePath->product_id = $product->id;
                            $imagePath->otherImage = $image;
                            $imagePath->save();
                        }
                    }
                    if($request->features){
                        $exist_feature = ProductFeature::where('product_id',$id)->get();
                        foreach($exist_feature as $item){
                            $item->delete();
                            continue;
                        }
                    }
                    $f_count = count($request->features);
        
                    for ($i = 0; $i < $f_count; $i++) {
                        $feature = new ProductFeature();
                        $feature->name = $request->features[$i];
                        $feature->product_id = $product->id;
                        $feature->save();
                    }
        
                    if ($request->purchage) {
                        $inventory = Inventory::where('product_id', $product->id)->first();
                        $inventory->purchage = $request->purchage;
                        $inventory->save();
                    }
                    return redirect()->route('product.index')->with('success','Product updated successfully');
                
                }
            } catch (\Throwable $th) {
                Session::flash('errors', 'something went wrong');
                    return redirect()->back();
        }
        
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $product = Product::with('productImage')->where('id',$id)->first();

        if (file_exists($product->image)) {
            @unlink($product->image);
        }
       
        Inventory::where('product_id', $id)->delete();
        if($product->productImage == true){
            foreach($product->productImage as $item){
                @unlink($item->otherImage);
                $item->delete();
            }
        }
        $product->delete();
        
        return back()->with('success', 'product deleted successfully');
    }

    public function featureRemove($id){
        ProductFeature::where('id',$id)->delete();
        return response()->json('data deleted successfully');
    }
}
