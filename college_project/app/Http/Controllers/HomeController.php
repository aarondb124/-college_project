<?php

namespace App\Http\Controllers;

use Cart;
use App\Models\Ad;
use App\Models\Faq;
use App\Models\Area;
use App\Models\Attribute;
use App\Models\Blog;
use App\Models\Team;
use App\Models\Brand;
use App\Models\Thana;
use App\Models\Banner;
use App\Models\Branch;
use App\Models\Contact;
use App\Models\Message;
use App\Models\Partner;
use App\Models\Product;
use App\Models\Service;
use App\Models\Upazila;
use App\Models\Category;
use App\Models\Question;
use App\Models\Management;
use App\Models\Subscriber;
use App\Models\MonitorSize;
use App\Models\SubCategory;
use App\Models\CameraFormat;
use App\Models\Color;
use App\Models\DeliveryTime;
use Illuminate\Http\Request;
use App\Models\RecordingMode;
use GuzzleHttp\Handler\Proxy;
use PharIo\Manifest\Manifest;
use App\Models\CompanyProfile;
use App\Models\Product_Attribute;
use App\Models\Product_color;
use App\Models\Product_style;
use App\Models\Style;
use App\Models\Subsubcategory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use function PHPUnit\Framework\returnSelf;

class HomeController extends Controller
{
    public function index()
    {
        $data['banner'] = Banner::latest()->get();
        $data['categories'] = Category::with('SubCategory')->latest()->get();
        $data['feature_product'] = Product::where('is_feature', '1')->get();
        $data['hot_product'] = Product::where('is_offer', '1')->get();
        $brand_product = Brand::with('product')->where('is_popular', '1')->get();
        $data['blog'] = Blog::latest()->get()->take(8);
        return view('website.index', $data,compact('brand_product'));
    }

    public function hotProduct()
    {
        $hot_product = Product::where('is_offer', '1')->get();
        return response()->json($hot_product);
    }
  
    public function brandProduct($brand_id)
    {
        $brand_product2 = Product::where('brand_id', $brand_id)->get();
        return response()->json($brand_product2);
    }
  
    public function anotherBranch($id)
    {    
        $branch = Branch::get();
        $getbranch = Branch::where('id',$id)->get();
        return view('website.branch',compact('branch','getbranch'));
    }

    public function ProductQuote($id)
    {
        // $category = Category::where('slug', $slug)->first();
        // $product = Product::where('category_id', $category->id)->paginate(10);
        // return view('website.build-quote-product', compact('product', 'category'));

        $category_list = Category::where('id', $id)->first();
        $categories = Category::all();
        
        if($category_list) {
            $category_wise_product = Product::where('category_id', $category_list->id)->get();
        } else {
            $category_wise_product = [];
        }
        return view('website.category', compact('category_list', 'category_wise_product','categories'));    
    }
    public function quotePrint()
    {
        $quote = session('quote');
        return view('website.quote', compact('quote'));
    }

    public function ProductDetails($slug)
    {
        // return $cart = Cart::get($id);
        $cart = '';
        $product = Product::with('category', 'inventory')->where('slug', $slug)->first();
        
        $cart = Cart::get($product->slug);
        
        if (isset($product->sub_category_id)) {
            $subCategory_id = $product->sub_category_id;
            $related = Product::where('sub_category_id', '=', $subCategory_id)->where('id', '!=', $product->id)->get();
        } else {
            $category_id = $product->category_id;
            $related = Product::where('category_id', '=', $product->category->id)->where('id', '!=', $product->id)->limit('12')->get();
        }
        return view('website.productDetails', compact('product', 'related', 'cart'));
    }
    //services and repair
    public function service(){
        $faq = Faq::latest()->get();
        return view('website.service',compact('faq'));
    }


    // product details popup
    public function subcategoryList($id)
    {   
        $data['category'] = Category::get();
        $categoris = Category::find($id);
        $data['subCategories'] = SubCategory::where('category_id', $id)->get();
        return view('website.subcategory_list', $data,compact('categoris'));
    }
    public function getAllsubsubcategory($id){
        // $data['category'] = Category::get();
         $subCategory = SubCategory::find($id);
        $data['subsubCategories'] = Subsubcategory::where('sub_category_id',$id)->get();
        return view('website.subsubcategory',$data ,compact('subCategory'));
       
    }

    public function productList($id)
    {
        $data['camera_format'] = CameraFormat::all();
        $data['recording_mode'] = RecordingMode::all();
        $data['brands'] = Brand::all();
        $data['monitor_size'] = MonitorSize::all();
        $subcategoris = SubCategory::where('id', $id)->first();
        $subsubcategoris = Subsubcategory::where('id', $id)->first();
        $data['product'] = Product::with('features', 'inventory')->where('subsubcategory_id', $subsubcategoris->id)->get()->map(function ($product) {
            $product->setRelation('features', $product->features->take(4));
            return $product;
        });
        $brandArr = [];
        foreach ($data['product'] as $key => $item) {
            array_push($brandArr,$item->brand_id);
        }

        $data['brand_array'] = $brandArr;

        $catArr = [];
        foreach ($data['product'] as $key => $item) {
            array_push($catArr,$item->category_id);
        }

        $data['category_array'] = $catArr;

        return view('website.product',compact('subcategoris'), $data);
    }
    public function subCategorywise($slug)
    {
        $data['camera_format'] = CameraFormat::all();
        $data['recording_mode'] = RecordingMode::all();
        $data['brands'] = Brand::all();
        $data['monitor_size'] = MonitorSize::all();
        $subcategory = SubCategory::where('slug', $slug)->first();
        $data['product'] = Product::with('features', 'inventory')->where('sub_category_id', $subcategory->id)->get()->map(function ($product) {
            $product->setRelation('features', $product->features->take(4));
            return $product;
        });

        return view('website.product', $data);
    }

    public function brandWise($id){
        $data['camera_format'] = CameraFormat::all();
        $data['recording_mode'] = RecordingMode::all();
        $data['brands'] = Brand::all();
        $data['category'] = Category::all();
        $data['monitor_size'] = MonitorSize::all();
        $brands = Brand::where('id',$id)->first();
        $brandName = Brand::find($id);
        $data['product'] = Product::with('features', 'inventory')->where('brand_id', $brands->id)->get()->map(function ($product) {
            $product->setRelation('features', $product->features->take(4));
            return $product;
        });
        $brandArr = [];
        foreach ($data['product'] as $key => $item) {
            array_push($brandArr,$item->brand_id);
        }
        $data['brand_array'] = $brandArr;
        $catArr = [];
        foreach ($data['product'] as $key => $item) {
            array_push($catArr,$item->category_id);
        }
        $data['category_array'] = $catArr;
        return view('website.brandProduct', $data,compact('brands' ,'brandName'));
    }
    public function productCategory($slug)
    {
        $data['camera_format'] = CameraFormat::all();
        $data['recording_mode'] = RecordingMode::all();
        $data['brands'] = Brand::all();
        $data['monitor_size'] = MonitorSize::all();
        $category = Category::where('slug', $slug)->first();
        $subcategory = SubCategory::where('category_id', $category->id)->latest()->get();
        $data['product'] = Product::with('features', 'inventory')->where('category_id', $category->id)->get()->map(function ($product) {
            $product->setRelation('features', $product->features->take(4));
            return $product;
        });

        return view('website.product',compact('subcategory'), $data);
    }

    public function productSortPrice($id, Request $request)
    {
        
        if ($id == '1') {
            $product = Product::orderBy('price', 'desc')->get();
            return response()->json($product);
        } else {
            $product = Product::orderBy('price', 'asc')->get();
            return response()->json($product);
        }
    }

    public function productSort(Request $request)
    {
        // dd($request->all());
        $brand = $request->brand ? $request->brand : '';
        $m_size = $request->m_size ? $request->m_size : '';
        $category = $request->cat ? $request->cat : '';
        $recording_mode = $request->mode ? $request->mode : '';
        $c_format = $request->c_format ? $request->c_format : '';
        $product_sort = $request->sort ? $request->sort : '';
        // return $p = Product::orWhere('category_id',$category)->orWhere('brand_id',$brand)->orWhere('recording_mode_id',$recording_mode)->orWhere('monitor_size_id',$m_size)->get();
        if ($product_sort == '2') {
            $p = Product::with('features')->orderBy('price', 'asc')->get()->map(function ($product) {
                $product->setRelation('features', $product->features->take(2));
                return $product;
            });
        } else {
            $p = Product::with('features')->orderBy('price', 'desc')->get()->map(function ($product) {
                $product->setRelation('features', $product->features->take(2));
                return $product;
            });
        }

        if ($category) {
            $p = $p->filter(function ($q) use ($category) {
                return $q->category_id == $category;
            });
        }
        if ($brand) {
            $p = $p->filter(function ($q) use ($brand) {
                return $q->brand_id == $brand;
            });
        }
        if ($m_size) {
            $p = $p->filter(function ($q) use ($m_size) {
                return $q->monitor_size_id == $m_size;
            });
        }
        if ($recording_mode) {
            $p = $p->filter(function ($q) use ($recording_mode) {
                return $q->recording_mode_id == $recording_mode;
            });
        }
        if ($c_format) {
            $p = $p->filter(function ($q) use ($c_format) {
                return $q->camera_format_id == $c_format;
            });
        }
        
        return $p;
    }

    public function getUpazila(Request $request)
    {
        return $upazila = Upazila::where('district_id', $request->district_id)->get();
    }


    public function cart()
    {
        $cart = Cart::getContent();
        return view('website.cart', compact('cart'));
    }

    // search main
    public function getSearchSuggestions($keyword)
    {
        $product = Product::select('name')
            ->where('name', 'like', "%$keyword%")
            ->get()->toArray();

        // $category = Product::select('category_id')
        //     ->where('name', 'like', "%$keyword%")
        //     ->get()->toArray();

        $category = Category::select('name as name')
            ->where('name', 'like', "%$keyword%")
            ->get()->toArray();

        $subcategory = SubCategory::select('name as name')
            ->where('name', 'like', "%$keyword%")
            ->get()->toArray();

        $mergedArray = array_merge($product, $category, $subcategory);

        $search_results = [];

        foreach ($mergedArray as $sr) {
            $search_results[] = $sr['name'];
        }

        return response()->json($search_results);
    }

    // search build your own
    public function getSearchSuggestionsBuild($keyword, $id)
    {
        $product = Product::select('name')
            ->where('name', 'like', "%$keyword%")
            ->where('category_id', $id)
            ->get()->toArray();

        // $category = Category::select('name as name')
        //     ->where('name', 'like', "%$keyword%")
        //     ->get()->toArray();

        // $subcategory = SubCategory::select('name as name')
        //     ->where('name', 'like', "%$keyword%")
        //     ->get()->toArray();

        // $mergedArray = array_merge($product, $category, $subcategory);

        $search_results = [];

        foreach ($product as $sr) {
            $search_results[] = $sr['name'];
        }

        return response()->json($search_results);
    }

    public function productSearch()
    {
        $data['camera_format'] = CameraFormat::all();
        $data['recording_mode'] = RecordingMode::all();
        $data['brands'] = Brand::all();
        $data['category'] = Category::all();
        $data['monitor_size'] = MonitorSize::all();
        if (request()->query('q')) {
            $keyword = request()->query('q');
            $data['search_result'] = Product::with('features_4')->Where('name', 'like', "%$keyword%")->get()->map(function ($product) {
                $product->setRelation('features', $product->features->take(4));
                return $product;
            });
            $brandArr = [];
            foreach ($data['search_result'] as $key => $item) {
                array_push($brandArr,$item->brand_id);
            }

            $data['brand_array'] = $brandArr;

            $catArr = [];
            foreach ($data['search_result'] as $key => $item) {
                array_push($catArr,$item->category_id);
            }

            $data['category_array'] = $catArr;

            return view('website.search', $data);
        }

        return redirect()->back();
    }
    public function productSearchBuild(Request $request)
    {
        $data['camera_format'] = CameraFormat::all();
        $data['recording_mode'] = RecordingMode::all();
        $data['brands'] = Brand::all();
        $data['monitor_size'] = MonitorSize::all();
        $cat_id = $request->slug;
        if (request()->query('q')) {
            $keyword = request()->query('q');
            $data = Product::with('features_4')->Where('name', 'like', "%$keyword%")->where('category_id',$cat_id)->get()->map(function ($product) {
                $product->setRelation('features', $product->features->take(4));
                return $product;
            });
            return view('website.build-quote-product', compact('data','cat_id'));
        }

        return redirect()->back();
    }

    public function blog()
    {
        $blogs = Blog::latest()->get();
        return view('website.blog', compact('blogs'));
    }


    public function blogDetails($id)
    {
        $blog = Blog::find($id);
        $blogs = Blog::latest()->get()->take(8);
        return view('website.blogDetails', compact('blog', 'blogs'));
    }

    public function questionStore(Request $request)
    {
        $request->validate([
            'question' => 'required'
        ]);
        // dd($request->all());
        $question = new Question();
        $question->question = $request->question;
        $question->product_id = $request->news_id;
        $question->customer_id = Auth::guard('customer')->user()->id;
        $question->save();
        return back()->with('success', 'your question submitted successfully');;
    }

    public function contactUs()
    {
        return view('website.contactUs');
    }

    public function contactStore(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required',
            'phone' => 'required|max:11',
            'email' => 'email|max:50',
            'subject' => 'required|max:100',
            'message' => 'required'
        ]);
        $contact = new Message();
        $contact->sender_name = $request->name;
        $contact->email = $request->email;
        $contact->phone = $request->phone;
        $contact->subject = $request->subject;
        $contact->message = $request->message;
        $contact->ip_address = $request->ip();
        $contact->save();
        return back()->with('success', 'message send successfully');
    }
    public function aboutUs()
    {
        return view('website.aboutUs');
    }

    public function areaChange(Request $request)
    {
        $thana = Area::where('upazila_id', $request->upazila_id)->get();
        return response()->json($thana);
    }

    // area charge

    public function areaCharge(Request $request)
    {

        $area = Area::where('id', $request->area_id)->first();
        $amount = $area->amount;
        return response()->json($amount);
    }


  public function News()
    {
        $news = Service::latest()->get();
        return view('website.news',compact('news'));
    }
    public function newsDetails($id){
        $newss = Service::latest()->get()->take(50);
        $news = Service::where('id', $id)->first();
        return view('website.newsDetails',compact('newss','news'));
    }

    public function brand(){
        $brand = Brand::get();
        return view('website.brand',compact('brand'));
    }

    public function delivery(){
        return view('website.delivery');
    }
    public function return(){
        return view('website.return');
    }
}
