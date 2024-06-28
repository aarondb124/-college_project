@extends('layouts.admin')
@section('title', 'Sub Subcategory Create')
@push('admin-css')
   
@endpush
@section('admin-content')
    <main class="mb-5">
        <div class="container">
            <div class="heading-title p-2 my-2">
                <span class="my-3 heading "><i class="fas fa-home"></i> <a class="" href="">Home</a> > Create
                    Sub Subcategory</span>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header py-1"><span style="font-size: 14px;
                                font-weight: 600;
                                color: #0e2c96;">Create Sub Subcategory</span> </div>
                        <div class="card-body table-card-body my-table">
                            <form action="{{ route('subsubcategory.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('post')
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="row">

                                            <div class="col-md-4">
                                                <strong><label>Name</label><span class="color-red">*</span> <span
                                                        class="my-label">:</span> </strong>
                                            </div>
                                            <div class="col-md-8">
                                                <input type="text" name="name" value="{{ old('name') }}"
                                                    placeholder="Product Name"
                                                    class="form-control my-form-control @error('name') is-invalid @enderror">
                                                @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="col-md-12 mb-2 vertical-file">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                     <label for="image vertical-file"> Image</label>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <input type="file" class="form-control " id="image" type="file" name="image" onchange="readURL(this);">
                                                        @error('image')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                      @enderror
                                                      <div class="form-group mb-0 mt-2">
                                                        <img class="form-controlo img-thumbnail" src="#" id="previewImage" style="width: 100px;height: 80px; background: #3f4a49;">
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
                                                                {{ old('category_id') == $item->id ? 'selected' : '' }}>
                                                                {{ $item->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    <div class="input-group-append">
                                                        <a class="border rounded my-select my-form-control py-0 px-2"
                                                            href="{{ route('category.index') }}" target="_blank"><i
                                                                class="fas fa-plus"></i></a>
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
                                                        <option data-tokens="ketchup mustard" value="">Select Sub Category
                                                        </option>
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
                                        <button type="submit" class="btn btn-primary btn-sm float-right mt-2">Save</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    {{-- product list --}}
                    <div class="card mt-3">
                        <div class="card-header">
                            <div class="table-head text-left"><i class="fas fa-table me-1"></i>Sub Subcategory List <a href=""
                                    class="float-right"><i class="fas fa-print" onclick="printable()"></i></a></div>

                        </div>
                        <div class="card-body table-card-body p-3">
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="pending" role="tabpanel"
                                    aria-labelledby="home-tab">
                                    <table id="first_table">
                                        <thead class="text-center bg-light">
                                            <tr>
                                                <th>SL</th>
                                                <th>Name</th>
                                                <th>Sub Subcategory</th>
                                                <th>Category</th>
                                                <th>Image</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($subSubcategory as $key => $item)
                                                <tr class="text-center">
                                                    <td class="text-center">{{ $key + 1 }}</td>
                                                    <td>{{ $item->name }}</td>
                                                    <td>{{ optional($item->subcategory)->name }}</td>
                                                    <td>{{ optional($item->category)->name }}</td>
                                                    <td><img src="{{ asset($item->image) }}" class="tbl-image" alt=""></td>
                                                    <td class="text-center">
                                                        <a href="{{ route('subsubcategory.edit', $item->id) }}"
                                                            class="btn btn-edit"><i class="fas fa-pencil-alt"></i></a>
                                                        <button type="submit" class="btn btn-delete"
                                                            onclick="deleteUser({{ $item->id }})"><i
                                                                class="far fa-trash-alt"></i></button>
                                                        <form id="delete-form-{{ $item->id }}"
                                                            action="{{ route('subsubcategory.delete', $item->id) }}"
                                                            method="POST" style="display: none;">
                                                            @csrf
                                                            @method('DELETE')
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </main>

@endsection
@push('admin-js')
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> --}}
    <script src="{{ asset('admin/js/ckeditor.js') }}"></script>
    <script src="{{ asset('admin/js/sweetalert2.all.js') }}"></script>
    <script>

function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload=function(e) {
                $('#previewImage')
                    .attr('src', e.target.result)
                    .width(100)
                    .height(80);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }

        function deleteUser(id) {
            swal({
                title: 'Are you sure?',
                text: "You want to Delete this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!',
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                buttonsStyling: false,
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                    event.preventDefault();
                    document.getElementById('delete-form-' + id).submit();
                } else if (
                    // Read more about handling dismissals
                    result.dismiss === swal.DismissReason.cancel
                ) {
                    swal(
                        'Cancelled',
                        'Your data is safe :)',
                        'error'
                    )
                }
            })
        }
    </script>
    <script>
        $(document).ready(function() {
            $("select[name='category_id']").on('change', function() {
                var category_id = $(this).val();
                $.ajax({
                    url: "{{ url('product/subcategory/list') }}/" + category_id,
                    dataType: "json",
                    method: "GET",
                    success: function(data) {
                        $('#sub_category_id').empty();
                        $.each(data, function(key, value) {
                            $('#sub_category_id').append('<option value="' + value.id +
                                '">' + value.name + '</option>');
                        });
                    }
                });

            });
        });
    </script>

   
@endpush
