@extends('layouts.admin')
@section('title', 'Sub Subcategory Edit')
@section('admin-content')
<main class="mb-5">
    <div class="container">
     <div class="heading-title p-2 my-2">
         <span class="my-3 heading "><i class="fas fa-home"></i> <a class="" href="">Home</a> > Update Sub Subcategory</span>
     </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header py-1"><span style="font-size: 14px;
                        font-weight: 600;
                        color: #0e2c96;">Update Sub Subcategory</span> </div>
                        <div class="card-body table-card-body my-table">
                          <form action="{{ route('subsubcategory.update',$subSubcategory->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="row">

                                        <div class="col-md-4">
                                            <strong><label>Name</label><span class="color-red">*</span> <span
                                                    class="my-label">:</span> </strong>
                                        </div>
                                        <div class="col-md-8">
                                            <input type="text" name="name" value="{{$subSubcategory->name }}"
                                                placeholder="Product Name" 
                                                class="form-control my-form-control @error('name') is-invalid @enderror">
                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label>Image </label>
                                                </div>
                                                <div class="col-md-8">
                                                    <input type="file" class="form-control" id="image" name="image" onchange="readURL(this);">
                                                    <div class="  mt-2">
                                                        <img class="form-controlo img-thumbnail" src="#" id="previewImage" style="height:70px;width:100px; background: #3f4a49;">
                                                    </div>
                                                </div>
                                            </div>
                                    </div>
                              
                             
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <strong><label>Category</label><span class="color-red">*</span> <span
                                                    class="my-label">:</span> </strong>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="input-group input-group-sm">
                                                <select name="category_id" id="category_id"
                                                    class="custom-select js-example-basic-multiple form-control my-select my-form-control @error('category_id') is-invalid @enderror"
                                                    data-live-search="true">
                                                    <option value="">Select Category</option>
                                                    @foreach ($category as $item)
                                                        <option value="{{ $item->id }}"
                                                            {{ $subSubcategory->category_id == $item->id ? 'selected' : '' }}>
                                                            {{ $item->name }}</option>
                                                    @endforeach
                                                </select>
                                                <div class="input-group-append">
                                                    <a class="border rounded my-select my-form-control py-0 px-2"
                                                        href="{{ route('category.index') }}" target="_blank"><i class="fas fa-plus"></i></a>
                                                </div>
                                            </div>
                                            @error('category_id')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="col-md-4">
                                            <strong><label>Sub Category</label><span class="my-label">:</span>
                                            </strong>
                                        </div>
                                        <div class="col-md-8 mt-1">
                                            <div class="input-group input-group-sm">
                                                <select name="sub_category_id" id="sub_category_id"
                                                    class="js-example-basic-multiple form-control my-form-control @error('sub_category_id') is-invalid @enderror "
                                                    data-live-search="true">
                                                    <option data-tokens="ketchup mustard" value="">Select Sub Category</option>
                                                    @foreach($subcategory as $item)
                                                    <option  value="{{ $item->id }}" {{ $subSubcategory->sub_category_id == $item->id ? 'selected' : '' }}>{{ $item->name }}</option>
                                                    @endforeach
                                                </select>
                                                <div class="input-group-append">
                                                    <a class="border rounded my-select my-form-control py-0 px-2"
                                                        href="{{ route('subcategory.index') }}" target="_blank"><i
                                                            class="fas fa-plus"></i></a>
                                                </div>
                                            </div>
                                            @error('sub_category_id')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>


                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary btn-sm float-right mt-2">Update</button>
                                </div>
                            </div>
                        </form>
                     </div>
                </div>
        </div>
    </div>
</main>
@endsection
@push('admin-js')
<script>
    $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });
</script>

<script>
    $(document).ready(function(){
           $("select[name='category_id']").on('change', function(){
               var category_id =$(this).val();
               subSubcategory(category_id)
           });
       });
    
       function subSubcategory(id) {
           var subcategoryId = id;
           if(subcategoryId != 0 && subcategoryId != undefined) {
               $.ajax({
                   url:"{{ url('product/subcategory/list')}}/"+ subcategoryId,
                   type :"GET",
                   dataType:"json",
                   success:function(data){
                   $('#sub_category_id').empty();
                       $.each(data, function(key,value){
                       $("#sub_category_id").append('<option value="'+value.id+'" >'+value.name+'</option>');
                       });
                   }
               });
           }
       }
   </script>
   <script> 
    function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload=function(e) {
                    $('#previewImage')
                        .attr('src', e.target.result)     
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
        document.getElementById("previewImage").src="{{ asset($subSubcategory->image) }}";
</script> 
  
@endpush