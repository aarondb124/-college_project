<?php

namespace App\Http\Controllers;

use DB;
use App\Models\Quote;
use App\Models\Product;
use App\Models\Category;
use App\Models\QuoteDetails;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class QuoteController extends Controller
{
    public function quoteAdd($id){

        $product = Product::findOrFail($id);
        $category = Category::where('id', $product->category_id)->first();
        $required = Category::where('quote', 1)->get();
        $quote = session()->get('quote', []);

        if(isset($quote[$id])) {
            $quote[$id]['quantity']++;
        } else {
            $quote[$id] = [
                "id" => $product->id,
                "name" => $product->name,
                "quantity" => 1,
                "price" => $product->price,
                "image" => $product->image,
                "category_id" => $product->category_id,
                "category" => $category->name
            ];
        }

        $total = 0;
        session()->put('quote', $quote);
        if(!empty(session('quote'))){
            foreach(session('quote') as $idd => $item){
                $total += $item['quantity']*$item['price'];
            }
        }
        else{
            $total = $product->price;
        }
        $status = 0 ;
        $total_item = count(session('quote'));
        $q = session('quote');
        $count = count($required);
        foreach($required as $item){

            foreach($q as $itemtwo){
                if($itemtwo['category_id'] == $item->id){
                    $status++;
                    break;               
                }

            }
        }
        // return response()->json([
        //     'total_item' => $total_item,
        //     'quote'      => $q,
        //     'total_price' => $total,
        //     'status' => $status == $count ? 1 : 0
        // ]);
        return redirect()->route('build-quote')->with('success','Successfully Added to Quote');
    }

    public function getQuote(){

        if(Auth::guard('customer')->user()){

            if(!empty(session('quote'))){

                try{
                    DB::beginTransaction();
                    $qutes = new Quote();
                    $qutes->customer_id = Auth::guard('customer')->user()->id;
                    $total = 0;
                    foreach(session('quote') as $id => $item){
                        $total += $item['price'];
                    }
                    $qutes->total = $total;
                    $qutes->save();

                    foreach(session('quote') as $id => $item){

                        $quote = new QuoteDetails();
                        $quote->product_id = $item['id'];
                        $quote->quote_id =  $qutes->id;
                        $quote->quantity = $item['quantity'];
                        $quote->price = $item['price'];
                        $quote->sub_total = $item['quantity']*$item['price'];
                        $quote->save();
                    }
                    DB::commit();
                    Session::forget('quote');
                    return redirect()->back()->with('success','Successfully Sent your Quatation');
                }
                catch(\Exception $e){
                    DB::rollBack();
                    return $e->getMessage();
                    return redirect()->back()->with('success','Something went wrong');
                }
                
            }

            else{
                return redirect()->back()->with('error','Your Quote Cart is empty');
            }
        }
        
        else{
            return view('website.customer.login');
        }
    }


    public function removeQuate($id){

        $cart = session()->get('quote');
        if(isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('quote', $cart);
        }


        $total = 0;
        if(!empty(session('quote'))){
            foreach(session('quote') as $id => $item){
                $total += $item['quantity']*$item['price'];
            }
            $tot = count(session('quote'));
        }
        else{
            $total = 0;
            $tot = 0;
            $quote = session()->get('quote', []);
        }

        $required = Category::where('quote', 1)->get();
        $q = session('quote');
        $status = 0;
        $count = count($required);
        foreach($required as $item){

            foreach($q as $itemtwo){
                if($itemtwo['category_id'] == $item->id){
                    $status++;
                    break;                  
                }
            }
        }

        $total_item = $tot;
        return response()->json([
            'total_item' => $total_item,
            'quote'      => $q,
            'total_price' => $total,
            'status'       => $status == $count ? 1 : 0
        ]);

    }
}
