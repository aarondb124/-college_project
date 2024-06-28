<?php

namespace App\Http\Controllers\Customer;

use Exception;
use Carbon\Carbon;
use App\Models\Order;
use App\Models\Country;
use App\Models\Upazila;
use App\Models\District;
use Darryldecode\Cart\Cart;
use App\Models\OrderDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CheckoutController extends Controller
{
    public function checkout()
    {
        $data['countries'] = Country::all();
        $data['districts'] = District::all();
        $data['upazilas'] = Upazila::all();
        return view('website.customer.checkout', $data);
    }
    public function checkoutStore(Request $request)
    {
        // return $request->all();
        $request->validate(
            [
                'customer_name'     => 'required|max:150',
                'customer_mobile'   => 'required|max:11',
                'customer_email'    => 'max:50',
                'district_id'       => 'required',
                'upazila_id'        => 'required',
                'shipping_address'  => 'required',
                'billing_address'   => 'required',
                'charge'            => 'required'
            ],
            [
                'district_id.required'       => 'District must be fill-up',
                'upazila_id.required'        => 'Upazila must be fill-up',
                'customer_name.required'     => 'Name must be fill-up',
                'customer_mobile.required'   => 'Phone must be fill-up',
                'customer_mobile.max'        => 'Phone No. maximum 11 Number',
                'shipping_address.required'  => 'Shipping Address must be fill-up',
                'billing_address.required'   => 'Billing Address must be fill-up',
                'customer_email.max'         => 'Email Character maximum 50',
                'charge.required'            => 'Charge Fill Must be fill-up'
            ],
        );

        $last_invoice_no =  Order::whereDate('created_at', today())->latest()->take(1)->pluck('invoice_no');
        if (count($last_invoice_no) > 0) {
            $invoice_no = $last_invoice_no[0] + 1;
        } else {
            $invoice_no = date('ymd') . '000001';
        }

        try {
            DB::beginTransaction();
            $order = new Order();
            $order->invoice_no          = $invoice_no;
            $order->customer_name       = $request->customer_name;
            $order->customer_mobile     = $request->customer_mobile;
            $order->customer_email      = $request->customer_email;
            $order->district_id         = $request->district_id;
            $order->upazila_id          = $request->upazila_id;
            $order->shipping_address    = $request->shipping_address;
            $order->billing_address     = $request->billing_address;
            $order->updated_by          = Auth::guard('customer')->user()->id;
            $order->customer_id         = Auth::guard('customer')->user()->id;
            $order->shipping_cost       = $request->charge ?? 0;
            $order->ip_address          = $request->ip();
            $order->total_amount        = \Cart::getTotal() + $request->charge;
            $order->save();

            foreach (\Cart::getContent() as $value) {
                $price = $value->price * $value->quantity;
                $orderDetails = new OrderDetails();
                $orderDetails->order_id = $order->id;
                $orderDetails->product_id = $value->id;
                $orderDetails->product_name = $value->name;
                $orderDetails->customer_id = Auth::guard('customer')->user()->id;
                $orderDetails->price = $value->price;
                $orderDetails->quantity = $value->quantity;
                $orderDetails->total_price = $price;
                $orderDetails->save();
            }
            DB::commit();
            Session::flash('message', 'order Submit successfully');
            \Cart::clear();
            return redirect()->route('home');
        } catch (\Exception $e) {
            DB::rollback();
            return $e->getMessage();
            Session::flash('error', 'order submitted fail!');
        }
    }
}
