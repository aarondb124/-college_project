@extends('layouts.admin');
@section('admin-content')   
@push('admin-css')
<style>
  #printable{
    display: none !important;
  }
 @media print
  {
      /* #non-printable { display: none; }
      #printable { display: block !important; } 
      .card-border{
        border:none !important;
      }
      p{
        font-size: 25px;
      }
      th{
        font-size: 30px !important;
        color:#000 !important;
      }
      td{
        font-size: 25px !important;
      } */
  }
</style>
@endpush     
  <div class="breadcrumb-area">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
              <div class="heading-title p-2 my-2">
                <span class="my-3 heading "><i class="fas fa-home"></i> <a class="" href="{{route('admin.index')}}">Home</a> >Inovice Show</span>
              </div>
            </div>
        </div>
    </div>
</div>
<div class="container" >
  <div style=" margin: auto;" >
    <div class="row">
        <div class="col-xs-12">
            <div class="card mb-3 px-2" >
                <div class="card-body " id="printableArea">
                    <div>
                      <div style="display:flex">
                        <div class="logo-img" style="width: 50%">
                          <img src="{{asset($content->logo)}}" alt="logo" style="height: 100px;width:100px">
                        </div>
                        <div style="width: 50%">
                          <h3 style="text-align: right; margin:15px 0px;float:right">Invoice &nbsp;&nbsp;#{{ $order->invoice_no }}</h3>
                        </div>
                      </div>
                      
                      <hr class="mt-1 mb-1">
                    </div>
                    <div style="display: flex;width:100%">
                      <div style="width: 30%;">
                        <p class="mt-2 mb-2"><b>{{ $content->company_name }}</b></p>
                        <p>{{ $content->address }}</p>
                      </div>
                      <div style="width: 70%;">
                        <p style="text-align: right;"><b>Invoice to</b></p>
                        <p style="text-align: right; margin-bottom:0"><strong>Name: </strong>{{ $order->customer_name }}<br><strong>Phone:</strong> {{ $order->customer_mobile }}</p>
                        <!--<p style="text-align: right; margin-bottom:0">-->
                        <!--  <strong> Delivery Date : </strong> -->
                        <!--  @if(isset($order->delivery_date))-->
                        <!--    {{$order->delivery_date}}-->
                          
                        <!--  @endif-->
                         
                        
                        <!--</p>-->
                        <!--<p style="text-align: right; margin-bottom:0">-->
                        <!--  <strong> Delivery Time : </strong> -->
                        <!--  @if(isset($order->deliveryTime->time))-->
                        <!--  {{$order->deliveryTime->time}}-->
                        <!--  @endif-->
                        <!--</p>-->
                        <p style="text-align: right; margin-bottom:0">
                        <strong> Billing Address:</strong> {{ $order->billing_address }}</p>
                        <p style="text-align: right; margin-bottom:0">
                          @if ($order->shipping_address != Null)
                            <strong> Shipping Address:</strong>  {{ $order->shipping_address }}
                          @else
                          @endif
                      </p>
                      </div>
                    </div>
                    <div style="justify-content: space-between;">
                      <div class="col-xs-5 pl-0">
                        <p style="margin-bottom:5px">Invoice Date : {{ $order->created_at }}</p>
                      </div>
                    </div>
                    <div class="">
                          <table style="border-collapse: collapse;width: 100%;">
                            <thead style=" padding:10px;">
                              <tr >
                                  <th style="padding:10px;">#</th>
                                  <th style="padding:10px;text-align:left">Product Name</th>
                                  <th style="padding:10px; text-align:center">Quantity</th>
                                  <th style="text-align: right; padding:10px;">Unit cost</th>
                                  <th style="text-align: right; padding:10px;">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                             
                              @foreach ($order->orderDetails as $key=> $item)
                              <tr style="text-align: right; ">
                                <td style="text-align: center; padding:5px; font-size:13px">{{ $key+1 }}</td>
                                <td style="text-align: left; padding:5px; font-size:13px">{{ $item->product_name }}</td>
                                <td  style="text-align:center; padding:5px; font-size:13px">{{ $item->quantity }} </td>
                                <td style="text-align: right; padding:5px; font-size:13px">{{ $item->price }} Tk</td>
                                <td style="text-align: right; padding:5px; font-size:13px">{{ $item->total_price }} Tk</td>
                              </tr>
                              @endforeach
                            </tbody>
                          </table>
                        
                    </div>
                    <div>
                      <span id="word" ></span>
                     
                    {{-- <input id="number" type="hidden" value="{{ $order->total_amount }}" /> --}}
                      {{-- <p id="number"> Number: {{ $order->total_amount }} </p> --}}
                      <p  style="text-align: right;margin-bottom:0; margin-top:10px"><span style="font-weight:600">Sub Total :</span>  {{ $order->orderDetails->sum('total_price') }} Tk</p>
                      <p  style="text-align: right;margin-bottom:15px"><span style="font-weight:600;  ">Shipping :</span>  {{ $order->shipping_cost }} Tk</p>
                      <h4 style="text-align: right; font-weight:700"><span>Total :</span><span id="number"> {{ $order->total_amount }}  </span> Tk</h4>
                      <hr >
                    </div>
                   
                </div>
                <div class="container-fluid w-100 mb-3" >
                  <button href="#"  onclick="printDiv('printableArea')" class="btn btn-primary btn-sm float-right ml-2"><i class="fa fa-print mr-1"></i>Print</button>
                </div>
            </div>
        </div>
    </div>
  </div>
    
@endsection
@push('admin-js')
      <script>
          function printDiv(divName) {
          var printContents = document.getElementById(divName).innerHTML;
          var originalContents = document.body.innerHTML;
          document.body.innerHTML = printContents;
          window.print();
          document.body.innerHTML = originalContents;
      }
      </script>

  @endpush