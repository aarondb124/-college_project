@extends('layouts.website');
@section('website-content')   
@push('website-css')
<style>
  #printable{
    display: none !important;
  }
  td{
    border:1px solid #B4B5B6
  }
  thead{
    background-color: red;
    color:#FFFFFF;
  }
  .quote-img{
    height: 60px;
    width: auto;
  }
  .company-name{
    color:red;
    font-size: 40px;
    padding-bottom: 5px;
    border-bottom: 3px solid red;
    margin-bottom: 0px;
  }
  .center{
    display: flex;
    justify-content: center
  }

  .logo-section{
    width: 30%;
  }

  .company-section{
    widows: 70%;
  }
  .main-section{
    width:90%; display:flex;
  }
  @media(max-width:767px){

      .logo-section{
        width: 50%;
      }

      .company-section{
        widows: 50%;
      }

      .main-section{
       width:90%;
       display:unset;
      }
}
</style>
@endpush     
@php $route = url()->current(); @endphp 
<div class="container my-4">
  <div style=" margin: auto;" >
    <div class="row">
        <div class="col-xs-12">
            <div class="card mb-3 px-2" >
                <div class="card-body" id="printableArea">    
                    <div style="display:flex;justify-content:center;">
                      <div style="margin-bottom:25px" class="main-section">
                          <div style="align-self:center" class="logo-section">
                            <div>
                              <img src="{{asset($content->logo)}}" alt="" class="quote-img">
                            </div>
                          </div>
                          <div style="padding-top:0px;margin-top:0px" class="company-section">
                            <h6 class="company-name" style="padding: 2px 0px; margin:0px">{{ $content->company_name }}</h6>
                            <strong style="padding: 5px 0px; font-size:14px">Phone: {{ $content->phone_1 }}, {{  $content->phone_2  }}, Email: {{ $content->email }}</strong>                      
                            <strong style="padding: 5px 0px;" class="href">{{ $route }}</strong>
                          </div>
                      </div>
                   </div>

                    <div class="table-responsive">
                          <table style="border-collapse: collapse;width: 100%;">
                            <thead style=" padding:10px;">
                              <tr>
                                  <th style="padding:10px;">#</th>
                                  <th style="padding:10px;text-align:left">Product Name</th>
                                  <th style="padding:10px; text-align:center">Quantity</th>
                                  <th style="text-align: right; padding:10px;">Unit cost</th>
                                  <th style="text-align: right; padding:10px;">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                             
                             @php $total = 0 @endphp
                              @foreach($quote as $id=>$item)
                              <tr style="text-align: right; ">
                                <td style="text-align: center; padding:5px; font-size:13px">{{ ++$id }}</td>
                                <td style="text-align: left; padding:5px; font-size:13px">{{ $item['name'] }}</td>
                                <td  style="text-align:center; padding:5px; font-size:13px">{{ $item['quantity'] }}</td>
                                <td style="text-align: right; padding:5px; font-size:13px">৳ {{ $item['price'] }}</td>
                                <td style="text-align: right; padding:5px; font-size:13px">৳ {{ $item['price']* $item['quantity']  }}</td>
                              </tr>
                              @php $total += $item['price']* $item['quantity']; @endphp
                              @endforeach

                              <tr>
                                <td colspan="4" style="text-align: right; padding:5px; font-size:13px"><strong>Total</strong></td>
                                <td colspan="4" style="text-align: right; padding:5px; font-size:13px">৳ {{ $total }}</td>
                              </tr>
                              
                            </tbody>
                          </table>                       
                    </div> 
                    <style>
                      @media print{  

                        .main-section{
                            width:90%; display:flex;
                          }

                        .logo-section{
                            width: 30%;
                          }

                          .company-section{
                            widows: 70%;
                          }

                        td{
                            border:1px solid #B4B5B6
                          }
                        thead{
                              background-color: red;
                              color:#FFFFFF;
                          }
                        .quote-img{                        
                            height: 60px;
                            width: auto;
                            align-self: center;
                          }
                          .company-name{
                            color:red;
                            font-size: 25px;
                            padding-bottom:2px;
                            border-bottom: 3px solid red;
                            margin-bottom: 5px
                          }
                          .href{
                            font-size: 14px;
                          }
                      }
                    </style>                 
                </div>
                <div class="container-fluid mb-3">
                  <div class="float-end">
                  <button  onclick="printDiv('printableArea')" class="btn btn-primary btn-sm"><i class="fa fa-print mr-1"></i>&nbsp;Print</button>
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>  
@endsection
@push('website-js')
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