<?php

namespace App\Http\Controllers\Admin;

use App\Models\Size;
use App\Models\Color;
use App\Models\Order;
use App\Models\Quote;
use App\Models\Product;
use App\Models\Customer;
use App\Models\Permission;
use App\Models\OrderDetails;
use App\Models\QuoteDetails;
use Illuminate\Http\Request;
use GuzzleHttp\Handler\Proxy;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{

    // default data pending
    public function index()
    {
        $permissions = Permission::where('user_id', Auth::id())->get();
         $orders = Order::where('status', 'p')->latest()->get();
        return view('admin.order.index', compact('orders'));
    }
    // on Process 
    public function onProcess()
    {
        $permissions = Permission::where('user_id', Auth::id())->get();
        $orders = Order::where('status', 'on')->latest()->get();

        return view('admin.order.onprocess', compact('orders'));
    }
    // on Process 
    public function ontheWay()
    {
        $permissions = Permission::where('user_id', Auth::id())->get();
        $orders = Order::where('status', 'w')->latest()->get();
        return view('admin.order.way', compact('orders'));
    }
  

    // sales report
    public function salesReport(Request $request){
        // $orders = Order::where('status', 'd')->get();
        // dd($request->all());
        
        $request->validate([
            'end_date' =>'date|after_or_equal:start_date'
        ]);

        $type = $request->type;
        $start_date = $request->start_date.' 00:00:00';
        $end_date = $request->end_date.' 23:59:59';
        $search = Order::with('orderDetails')->whereBetween('updated_at', [$start_date, $end_date])->where('status', 'd')->get();
         $total = $search->sum('total_amount');
        return view('admin.order.sales', compact('search','type','total'));
    }

  

    // order pending function
    public function pending($id)
    {
        // Order::where('id', $id)->where('status', 'p')->update([
        //     'status' => 'on',
        // ]);
        $order = Order::where('id',$id)->where('status','p')->first();
        $order->status = 'on';
        $order->updated_by = Auth::user()->id;
        $order->save();

        $customer = Order::where('customer_id',$order->customer_id)->first();
        $customer_phone = $customer->customer_mobile;
        $message = "Your order now Processing . Your Invoice No. $order->invoice_no";
        // $this->send_sms($customer_phone ,$message);
        // $this->send_sms($customer_phone , $message);
        return redirect()->route('order.onProcess')->with('success', 'Order Confirm Successfully');
    }

    // order prodcess function
    public function process($id)
    {
        // Order::where('id', $id)->where('status', 'on')->update([
        //     'status' => 'w',
        // ]);
        $order = Order::where('id',$id)->where('status','on')->first();
        $order->status = 'w';
        $order->updated_by = Auth::user()->id;
        $order->save();

       
        $customer = Order::where('customer_id',$order->customer_id)->first();
        $customer_phone = $customer->customer_mobile;
        $message = "Your order now On the way . Your Invoice No. $order->invoice_no";
        // $this->send_sms($customer_phone , $message);
        return redirect()->route('order.way')->with('success', 'Order On the way');
    }

     // order prodcess function
     public function wayProcess($id)
     {
        //  Order::where('id', $id)->where('status', 'w')->update([
        //      'status' => 'd',
        //  ]);
        $order = Order::where('id',$id)->where('status','w')->first();
        $order->status = 'd';
        $order->updated_by = Auth::user()->id;
        $order->save();
        $customer = Order::where('customer_id',$order->customer_id)->first();
        $customer_phone = $customer->customer_mobile;
        $message = "You have received your order . Your Invoice No. $order->invoice_no";   


        // $this->send_sms($customer_phone , $message);   
         return redirect()->route('order.delivary')->with('success', 'Order Delivery Confirm Successfully');
     }
      // order delete function
     public function destroy($id){
        $order = Order::find($id);
        $orderDetails = OrderDetails::where('order_id',$id)->get();
        foreach($orderDetails as $item){
            $product = Product::with('inventory')->where('id',$item->product_id)->first();
            $product->inventory->purchage = $product->inventory->purchage + $item->quantity;
            $product->inventory->sales = $product->inventory->sales - $item->quantity;
            $product->inventory->save();
        }
        $order->status = 'c';
        $order->updated_by = Auth::user()->id;
        $order->save();
        $customer = Order::where('customer_id',$order->customer_id)->first();
        $customer_phone = $customer->customer_mobile;
        $message = "You order now cancel . Your Invoice No. $order->invoice_no";   
        // $this->send_sms($customer_phone , $message);  

        return back()->with('success', 'Order cancel successfully');
     }
      // on delivery done 
      public function delivered()
      {
          $orders = Order::where('status', 'd')->latest()->get();
          return view('admin.order.delivered', compact('orders'));
      }
    // order details edit function
    public function orderDetails($id)
    {
        $orderDetails = OrderDetails::where('order_id', $id)->get();
        return view('admin.order.details', compact('orderDetails'));
    }

    // order cancel function
    public function cancel($id)
    {
       $order =  Order::where('id', $id)->update([
            'status' => 'p',
        ]);
        $customer = Order::where('customer_id',$order->customer_id)->first();
        $customer_phone = $customer->customer_mobile;
        $message = "You order cancel now. Your order invoice no. $order->invoice_no ";
        // $this->send_sms($customer_phone , $message);
        return redirect()->route('order.index')->with('success', 'Delivery Order Cancel Confirm Successfully');
    }

    // order print function
    public function orderPrint($id)
    {
        $orderDetails = OrderDetails::where('order_id', $id)->get();
        return view('admin.order.print', compact('orderDetails'));
    }

    public function orderEdit(Request $request, $id)
    {
        $order = OrderDetails::where('id', $id)->first();
        $order->quantity = $request->quantity;
        $order->color_id = $request->color_id;
        $order->size_id = $request->size_id;
        $product = Product::where('id', $order->product_id)->first();
        $order->total_price = (int)$request->quantity * (int)$product->price;
        $order->save();

        return back()->with('success', 'Order updated successfully');
    }
    public function prodcutOrderCancel($id)
    {
        OrderDetails::where('id', $id)->delete();
        return back()->with('success', 'Product Order Delete successfully');
    }

    public function orderRecord(){
        $product = Product::all();
        return view('admin.order.productSales',compact('product'));
    }

    public function orderRecordSearch(Request $request){
        
        $start_date = $request->start_date.' 00:00:00';
        $end_date = $request->end_date.' 23:59:59';
        $product_id = $request->product_id;
       
        $product = Product::all();
        $orderDetails = OrderDetails::with('order')->where('product_id',$product_id)->whereBetween('created_at', [$start_date, $end_date])->get();
        
        
        return view('admin.order.productSales',compact('start_date','end_date','orderDetails','product'));
    }

    public function quoteRecordSearch(Request $request){
        
        $start_date = $request->start_date.' 00:00:00';
        $end_date = $request->end_date.' 23:59:59';
        $customer_id = $request->customer_id;
       
        $customer = Quote::with('customer')->orderBy('customer_id')->get();
        $quote   =  Quote::with('customer')->where('customer_id',$customer_id)->whereBetween('created_at', [$start_date, $end_date])->get();  
        return view('admin.quotes.index', compact('quote','customer'));
    }

    public function cancelList(){
        $orders = Order::where('status','c')->latest()->get();
        return view('admin.order.cancel',compact('orders'));
    }

    public function quoteRecord(){
        $customer = Quote::with('customer')->orderBy('customer_id')->get();
        $quote = Quote::with('customer')->get();
        return view('admin.quotes.index', compact('quote','customer'));
    }

    public function quoteDetails($id){
       
        $quote = Quote::with('customer')->where('id', $id)->first();
        //return $quote;
        return view('admin.quotes.quote', compact('quote'));
    }


    public function actionCheck(Request $request){

        // $request->validate([
        //     'actionType' => 'required'
        // ]);

        $actiionType = $request->actionType;

        $quote = new Quote();
        $checked = $request->actionChk;

        if(!$checked == null){

            foreach($checked as $item){
                $quote = Quote::find($item);
                $quote->delete();

                $quotes = QuoteDetails::where('quote_id',$item);
                $quotes->delete();

            }
            return redirect()->back()->with('success', 'Successfully Deleted');
        }
        else{
            return redirect()->back()->with('error', 'Please Select at least one item');
        }
       
           

        
    }
}
