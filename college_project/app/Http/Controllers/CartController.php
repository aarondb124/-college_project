<?php

namespace App\Http\Controllers;

use DateTime;
use App\Models\Product;
use App\Models\Category;
use Darryldecode\Cart\Cart;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;


class CartController extends Controller
{
    public function cartList()
    {
        $cartItems = \Cart::getContent();
        // dd($cartItems);
        return view('website.cart', compact('cartItems'));
    }

  

    public function addToCartAjax($id)
    {
        // \Cart::clear();
       $product = Product::where('id',$id)->first();
       $deal_date = strtotime($product->deal_end);
         $curent_date =  new DateTime();
         $c_date_time = strtotime($curent_date->format("Y-m-d H:i:s.v"));
         $discount = $product->discount;
         $discount_price =$product->price - ($product->price*$discount/100);
         if($deal_date>$c_date_time){
             $price = $discount_price;
         }
         else{
            $price = $product->price;
         }
       
        try {
            \Cart::add([
                'id' => $product->id,
                'name' => $product->name,
                'price' => $price,
                'quantity' => 1,
                'attributes' => array(
                    'image' => $product->image,
                    'slug' => $product->slug,
                )
            ]);
            $cartAll = \Cart::getContent();
            return response()->json([
                'total_item' => \Cart::getContent()->count(),
                'allData' => $cartAll
            ]);
          
        } catch (\Throwable $th) {
            
        }
    }

    public function cartAllData(){
        $cartAll = \Cart::getContent();
        return response()->json($cartAll);
    }


    public function removeCart($id)
    {
        \Cart::remove($id);
        $cart['all_data'] = \Cart::getContent();
        $cart['total_item'] = \Cart::getContent()->count();
        return  response()->json($cart);
    }

    public function decrement($id){
        $product = Product::where('id',$id)->first();
        $cart['total_amount'] = \Cart::getTotal();
        $cart['product'] = \Cart::getContent();
        foreach(\Cart::getContent() as $item){
            if($item->quantity == 1){
                $cart = 'data updated successfully';
            }
            else{
                 if($item->id == $product->id){
                    
                \Cart::update(
                    $item->id,
                    [
                        'quantity' => [
                            'relative' => false,
                            'value' => $item->quantity -1
                        ],
                    ]
                    );
                    return response()->json($cart);
                }
            } 
        }
       
        $cart = 'data updated successfully';
        return response()->json($cart);
    }
     public function increment($id)
     {
         $product = Product::with('inventory')->where('id',$id)->first();
         $stock = $product->inventory->purchage;
         
         
         $cart['item'] = \Cart::getContent();
        foreach(\Cart::getContent() as $item){
            if($item->id == $product->id){
                    if($item->quantity + 1 <= $stock){
                        if($item->id == $product->id){
                            \Cart::update(
                                $item->id,
                                [
                                    'quantity' => [
                                        'relative' => false,
                                        'value' => $item->quantity +1
                                    ],
                                ]
                            ); 
                            $cart['total_amount'] = \Cart::getTotal();
                            return response()->json($cart);
                        }
                    }
                    else{
                        dd("ok");
                        return response()->json(['error' => 'Stock have no available.']);
                    }
                
            }   
        }
            
    }

    public function cartContent(){
        
        $cart['total_amount'] = \Cart::getTotal();
        $cart['total_item'] = \Cart::getContent()->count();
        //quote
         $total = 0;
         $status = 0;
         $q = [];
         $count = 0;
        if(!empty(session('quote'))){
            
          $cart['total_quote_item'] = count(session('quote')); 
          
          foreach(session('quote') as $id => $item){
            $total += $item['quantity']*$item['price'];
            }
            
            $q = session('quote');
            $required = Category::where('quote', 1)->get();
            $count = count($required);
            foreach($required as $item){
    
                foreach($q as $itemtwo){
                    if($itemtwo['category_id'] == $item->id){
                        $status++;
                        break;
                    }
                }
            }
        }
        else{
            $cart['total_quote_item'] = 0;
        }
       
        
        // close quote
        $cart['total_quote_price'] = $total;
        $cart['quote'] = $q;
        $cart['status'] = $status == $count && $status>0 ? 1 : 0;
        return response()->json($cart);
    }
    public function addCart(Request $request)
    {
        // dd($request->all());
         $product = Product::with('inventory')->where('id',$request->id)->first();
         $stock = $product->inventory->purchage;
         $deal_date = strtotime($product->deal_end);
         $curent_date =  new DateTime();
         $c_date_time = strtotime($curent_date->format("Y-m-d H:i:s.v"));
         $discount = $product->discount;
         $discount_price =$product->price - ($product->price*$discount/100);
         if($deal_date>$c_date_time){
             $price = $discount_price;
         }
         else{
            $price = $product->price;
         }
        try {
            if($request->item_number <= $stock){
                \Cart::add([
                    'id' => $product->id,
                    'name' => $product->name,
                    'price' => $price,
                    'quantity' => $request->item_number,
                    'attributes' => array(
                        'image' => $product->image,
                        'slug' => $product->slug,
                    )
                ]);
                return back()->with('success','Cart added successfully');
            }
            else{
                return back()->with('error','Stock have no available');
            }
           
          
        } catch (\Throwable $th) {
            
        }
    }

    
}
