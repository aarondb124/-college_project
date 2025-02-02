@extends('layouts.admin')
@section('title', 'Product Create')
@push('admin-css')
    <style>
        header {
            font-size: 9px;
            color: #f00;
            text-align: center;
        }

        @page {
            size: A4;
            margin: 11mm 17mm 17mm 17mm;
        }

        @media print {
            header {
                position: fixed;
                bottom: 0;
            }

            .content-block,
            p {
                page-break-inside: avoid;
            }

            html,
            body {
                width: 210mm;
                height: 297mm;
            }
        }

    </style>
@endpush
@section('admin-content')
    <main class="mb-5">
        <div class="container">
            <div class="heading-title p-2 my-2">
                <span class="my-3 heading "><i class="fas fa-home"></i> <a class="" href="">Home</a> > Create
                    Product</span>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header py-1"><span style="font-size: 14px;
                                font-weight: 600;
                                color: #0e2c96;">Create Product</span> </div>
                        <div class="card-body table-card-body my-table">
                            <form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">
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
                                            <div class="col-md-4">
                                                <strong><label>Model</label><span class="color-red">*</span> <span
                                                        class="my-label">:</span> </strong>
                                            </div>
                                            <div class="col-md-8">
                                                <input type="text" name="model" value="{{ old('model') }}"
                                                    placeholder="Product Model"
                                                    class="form-control my-form-control @error('model') is-invalid @enderror">
                                                @error('model')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="col-md-4">
                                                <strong><label>Price</label><span class="color-red">*</span> <span
                                                        class="my-label">:</span> </strong>
                                            </div>

                                            <div class="col-md-8">
                                                <input type="text" name="price" value="{{ old('price') }}"
                                                    placeholder="Price"
                                                    class="form-control my-form-control @error('price') is-invalid @enderror">
                                                @error('price')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="col-md-4">
                                                <strong><label>Discount</label> <span class="my-label">:</span>
                                                </strong>
                                            </div>

                                            <div class="col-md-8">
                                                <input type="number" name="discount" id="offer"
                                                    value="{{ old('discount') }}" disabled placeholder="0%" max="99"
                                                    class="form-control my-form-control @error('discount') is-invalid @enderror">
                                                @error('discount')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="col-md-4">
                                                <strong><label>Deal Start</label> <span class="my-label">:</span>
                                                </strong>
                                            </div>

                                            <div class="col-md-8">
                                                <input type="date" name="deal_start" id="deal_start"
                                                    value="{{ old('deal_start') }}" disabled
                                                    class="form-control my-form-control @error('discount') is-invalid @enderror">
                                                @error('deal_start')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="col-md-4">
                                                <strong><label>Deal End</label> <span class="my-label">:</span>
                                                </strong>
                                            </div>

                                            <div class="col-md-8">
                                                <input type="date" name="deal_end" id="deal_end"
                                                    value="{{ old('deal_end') }}" disabled
                                                    class="form-control my-form-control @error('discount') is-invalid @enderror">
                                                @error('deal_end')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="col-md-4">
                                                <strong><label>Stock<span class="color-red">*</span> </label> <span
                                                        class="my-label">:</span> </strong>
                                            </div>

                                            <div class="col-md-8">
                                                <input type="number" name="purchage" id="purchage"
                                                    value="{{ old('purchage') }}"
                                                    class="form-control my-form-control @error('purchage') is-invalid @enderror">
                                                @error('stock')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="col-md-4">
                                                <strong><label>Product Features<span class="color-red">*</span>
                                                    </label> <span class="my-label">:</span> </strong>
                                                    <span class="color-red">Max 200 Character</span>
                                            </div>
                                            <div class="col-md-8" id="add-remove-section">
                                                <div class="feature-group d-flex">
                                                    <div class="feature-input">
                                                        <div class="col-md-">
                                                            <textarea name="features[]"
                                                                class="feature-input-field form-control" maxlength="200" id="" cols="30"
                                                                rows="2"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="add-part" onclick="add()">
                                                        <a href="javascript:void(0);"
                                                            class="border text-success add btn rounded my-form-control py-0 px-2 add-area"><i class="fas fa-plus"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <strong><label>Short Description</label> <span
                                                        class="my-label">:</span> </strong>
                                            </div>
                                            <div class="col-md-8">
                                                <textarea name="short_details"
                                                    class="form-control short_description @error('short_details') is-invalid @enderror"
                                                    id="editor" cols="30" rows="3"></textarea>
                                                @error('short_details')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="col-md-4">
                                                <strong><label>Image</label> <span class="my-label">:</span>
                                                </strong>
                                                <small>Image (500*500 px)</small>
                                            </div>
                                            <div class="col-md-5 mt-1">
                                                <input name="image" type="file"
                                                    class="form-control form-control-sm @error('image') is-invalid @enderror"
                                                    id="image" type="file" onchange="readURL(this);">
                                                @error('image')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="col-md-3 mt-1">
                                                <img class="form-controlo img-thumbnail" src="#" id="previewImage"
                                                    style="width: 100px;height: 80px; background: #3f4a49;">
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row">
                                           
                                            <div class="col-md-4">
                                                <strong><label>Camera Format</label><span class="my-label">:</span>
                                                </strong>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="input-group input-group-sm">
                                                    <select name="camera_format_id" id="camera_format_id"
                                                        class="custom-select form-control my-select my-form-control @error('category_id') is-invalid @enderror"
                                                        data-live-search="true">
                                                        <option value="">Select Camera Format</option>
                                                        @foreach ($camera_format as $item)
                                                            <option value="{{ $item->id }}"
                                                                {{ old('camera_format_id') == $item->id ? 'selected' : '' }}>
                                                                {{ $item->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    <div class="input-group-append">
                                                        <a class="border rounded my-select my-form-control py-0 px-2"
                                                            href="{{ route('camera_format.index') }}" target="_blank"><i
                                                                class="fas fa-plus"></i></a>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <strong><label>Camera Pixel</label><span class="my-label">:</span>
                                                </strong>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="input-group input-group-sm">
                                                    <select name="pixel_id" id="pixel_id"
                                                        class="custom-select form-control my-select my-form-control @error('category_id') is-invalid @enderror"
                                                        data-live-search="true">
                                                        <option value="">Select Pixel</option>
                                                        @foreach ($pixel as $item)
                                                            <option value="{{ $item->id }}"
                                                                {{ old('pixel_id') == $item->id ? 'selected' : '' }}>
                                                                {{ $item->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    <div class="input-group-append">
                                                        <a class="border rounded my-select my-form-control py-0 px-2"
                                                            href="{{ route('pixel.index') }}" target="_blank"><i
                                                                class="fas fa-plus"></i></a>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <strong><label>Recording Mode</label><span class="my-label">:</span>
                                                </strong>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="input-group input-group-sm">
                                                    <select name="recording_mode_id" id="recording_mode_id"
                                                        class="custom-select form-control my-select my-form-control @error('category_id') is-invalid @enderror"
                                                        data-live-search="true">
                                                        <option value="">Select Recording Mode</option>
                                                        @foreach ($recording_mode as $item)
                                                            <option value="{{ $item->id }}"
                                                                {{ old('recording_mode_id') == $item->id ? 'selected' : '' }}>
                                                                {{ $item->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    <div class="input-group-append">
                                                        <a class="border rounded my-select my-form-control py-0 px-2"
                                                            href="{{ route('recording_mode.index') }}" target="_blank"><i
                                                                class="fas fa-plus"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <strong><label>Sensor</label><span class="my-label">:</span> </strong>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="input-group input-group-sm">
                                                    <select name="sensor_id" id="sensor_id"
                                                        class="custom-select form-control my-select my-form-control @error('category_id') is-invalid @enderror"
                                                        data-live-search="true">
                                                        <option value="">Select Sensor</option>
                                                        @foreach ($sensor as $item)
                                                            <option value="{{ $item->id }}"
                                                                {{ old('sensor_id') == $item->id ? 'selected' : '' }}>
                                                                {{ $item->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    <div class="input-group-append">
                                                        <a class="border rounded my-select my-form-control py-0 px-2"
                                                            href="{{ route('sensor.index') }}" target="_blank"><i
                                                                class="fas fa-plus"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <strong><label>Monitor Size</label><span class="my-label">:</span>
                                                </strong>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="input-group input-group-sm">
                                                    <select name="monitor_size_id" id="monitor_size_id"
                                                        class="custom-select form-control my-select my-form-control @error('category_id') is-invalid @enderror"
                                                        data-live-search="true">
                                                        <option value="">Select Monitor Size</option>
                                                        @foreach ($monitor_size as $item)
                                                            <option value="{{ $item->id }}"
                                                                {{ old('monitor_size_id') == $item->id ? 'selected' : '' }}>
                                                                {{ $item->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    <div class="input-group-append">
                                                        <a class="border rounded my-select my-form-control py-0 px-2"
                                                            href="{{ route('monitor_size.index') }}" target="_blank"><i
                                                                class="fas fa-plus"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <strong><label>Effective Pixel</label><span class="my-label">:</span>
                                                </strong>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="input-group input-group-sm">
                                                    <select name="effective_pixel_id" id="effective_pixel_id"
                                                        class="custom-select form-control my-select my-form-control @error('category_id') is-invalid @enderror"
                                                        data-live-search="true">
                                                        <option value="">Select Effective Pixel</option>
                                                        @foreach ($effective_pixel as $item)
                                                            <option value="{{ $item->id }}"
                                                                {{ old('effective_pixel_id') == $item->id ? 'selected' : '' }}>
                                                                {{ $item->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    <div class="input-group-append">
                                                        <a class="border rounded my-select my-form-control py-0 px-2"
                                                            href="{{ route('effective_pixel.index') }}" target="_blank"><i
                                                                class="fas fa-plus"></i></a>
                                                    </div>
                                                </div>
                                            </div>

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
                                            <div class="col-md-4">
                                                <strong><label>Sub Subcategory</label><span class="my-label">:</span>
                                                </strong>
                                            </div>
                                            <div class="col-md-8 mt-1">
                                                <div class="input-group input-group-sm">
                                                    <select name="subsubcategory_id" id="subsubcategory_id"
                                                        class="js-example-basic-multiple form-control my-form-control @error('subsubcategory_id') is-invalid @enderror "
                                                        data-live-search="true">
                                                        <option data-tokens="ketchup mustard" value="">Select Sub Subcategory
                                                        </option>
                                                    </select>
                                                    <div class="input-group-append">
                                                        <a class="border rounded my-select my-form-control py-0 px-2"
                                                            href="{{ route('subsubcategory.index') }}" target="_blank"><i
                                                                class="fas fa-plus"></i></a>
                                                    </div>
                                                </div>
                                                @error('subsubcategory_id')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="col-md-4">
                                                <strong><label>Brand</label><span class="my-label">:</span>
                                                </strong>
                                            </div>

                                            <div class="col-md-8 mt-1">
                                                <div class="input-group input-group-sm">
                                                    <select name="brand_id" id="brand_id"
                                                        class="js-example-basic-multiple form-control my-form-control @error('sub_category_id') is-invalid @enderror "
                                                        data-live-search="true">
                                                        <option value="">Select brand</option>
                                                        @foreach ($brand as $item)
                                                            <option value="{{ $item->id }}"
                                                                {{ old('brand_id') == $item->id ? 'selected' : '' }}>
                                                                {{ $item->name }}</option>
                                                        @endforeach
                                                        </option>
                                                    </select>
                                                    <div class="input-group-append">
                                                        <a class="border rounded my-select my-form-control py-0 px-2"
                                                            href="{{ route('brand.index') }}" target="_blank"><i
                                                                class="fas fa-plus"></i></a>
                                                    </div>
                                                </div>
                                                @error('brand_id')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            
                                            <div class="col-md-4">
                                                <strong><label> Product Is</label> <span class="my-label">:</span>
                                                </strong>
                                            </div>
                                            
                                            <div class="col-md-4 mt-1">
                                                <input type="checkbox" value="1"
                                                    onclick="toggleEnable('offer','deal_start','deal_end')"
                                                    {{ old('is_offer') == '1' ? 'checked' : '' }} name="is_offer"
                                                    class="@error('is_offer') is-invalid @enderror" id="">
                                                @error('is_offer')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                                <label for="">Best Deal</label>
                                            </div>
                                            <div class="col-md-4 mt-1">
                                                <input type="checkbox" name="is_feature" value="1"
                                                    {{ old('is_feature') == '1' ? 'checked' : '' }}
                                                    class="@error('is_featured') is-invalid @enderror" id="">
                                                @error('is_offer')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                                <label for="">New Arrival</label>
                                            </div>
                                            <div class="col-md-4">
                                                <strong><label> Description</label> <span class="my-label">:</span>
                                                </strong>
                                            </div>
                                            <div class="col-md-8 mt-1">
                                                <textarea name="description" class="form-control" id="description"
                                                    cols="30" rows="3"></textarea>
                                                @error('description')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                          
                                            <div class="col-md-4">
                                                <strong><label>Other Image</label> <span class="my-label">:</span>
                                                </strong>
                                                <small>Image (500*500 px)</small>
                                            </div>
                                            <div class="col-md-8 mt-1">
                                                <input type="file" class=" form-control form-control-sm" maxlength="5"
                                                    id="otherImage" name="otherImage[]" multiple />
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
                            <div class="table-head text-left"><i class="fas fa-table me-1"></i>Product List <a href=""
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
                                                <th>Entry Date</th>
                                                <th>Product ID</th>
                                                <th>Name</th>
                                                <th>Price</th>
                                                <th>Discount</th>
                                                <th>Image</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($product as $key => $item)
                                                <tr>
                                                    <td class="text-center">{{ $key + 1 }}</td>
                                                    <td class="text-center">
                                                        {{ $item->created_at->format('d/m/Y') }}</td>
                                                    <td class="text-center">{{ $item->code }}</td>
                                                    <td>{{ $item->name }}</td>
                                                    <td class="text-right">{{ $item->price }}</td>
                                                    <td class="text-right">{{ $item->discount }}</td>
                                                    <td class="text-center"><img
                                                            src="{{ asset( $item->image) }}"
                                                            class="tbl-image" alt=""></td>
                                                    <td class="text-center">
                                                        <a href="{{ route('product.edit', $item->slug) }}"
                                                            class="btn btn-edit"><i class="fas fa-pencil-alt"></i></a>
                                                        <button type="submit" class="btn btn-delete"
                                                            onclick="deleteUser({{ $item->id }})"><i
                                                                class="far fa-trash-alt"></i></button>
                                                        <form id="delete-form-{{ $item->id }}"
                                                            action="{{ route('product.delete', $item->id) }}"
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
        function toggleEnable(id, id2, id3) {
            var textbox = document.getElementById(id);
            var start = document.getElementById(id2);
            var end = document.getElementById(id3);
            if (textbox.disabled) {
                document.getElementById(id).disabled = false;
                document.getElementById(id2).disabled = false;
                document.getElementById(id3).disabled = false;
            } else {
                document.getElementById(id).disabled = true;
                document.getElementById(id2).disabled = true;
                document.getElementById(id3).disabled = true;
            }
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

            $("select[name='sub_category_id']").on('change', function() {
                var sub_category_id = $(this).val();
                // console.log(sub_category_id);
                $.ajax({
                    url: "{{ url('product/subsubcategory-list') }}/" + sub_category_id,
                    dataType: "json",
                    method: "GET",
                    success: function(data){
                        console.log(data);
                        $('#subsubcategory_id').empty();
                        $.each(data, function(key, value) {
                            $('#subsubcategory_id').append('<option value="' + value.id +
                                '">' + value.name + '</option>');
                        });
                    }
                });

            });
        });
   
           
    </script>
    <script>
        ClassicEditor
            .create(document.querySelector('#editor'))
            .catch(error => {
                console.error(error);
            });
    </script>
    <script>
        ClassicEditor
            .create(document.querySelector('#description'))
            .catch(error => {
                console.error(error);
            });
    </script>
    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#previewImage')
                        .attr('src', e.target.result)
                        .width(100)
                        .height(80);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
        document.getElementById("previewImage").src = "/noimage.png";
    </script>
    <script>
        // multiple image
        $(document).ready(function() {
            if (window.File && window.FileList && window.FileReader) {
                $("#otherImage").on("change", function(e) {
                    var files = e.target.files,
                        filesLength = files.length;
                    for (var i = 0; i < filesLength; i++) {
                        var f = files[i]
                        var fileReader = new FileReader();
                        fileReader.onload = (function(e) {
                            var file = e.target;
                            $("<span class=\"pip\">" +
                                "<img class=\"imageThumb\" src=\"" + e.target.result +
                                "\" title=\"" + file.name + "\"/>" +
                                "<br/><span class=\"remove\">Remove</span>" +
                                "</span>").insertAfter("#otherImage");
                            $(".remove").click(function() {
                                $(this).parent(".pip").remove();
                            });
                        });
                        fileReader.readAsDataURL(f);
                    }
                });
            } else {
                alert("Your browser doesn't support to File API")
            }
        });
    </script>

    <script>
        var data = "";
        data = data + '<div class="feature-group d-flex">';
        data = data + ' <div class="feature-input">';
        data = data + '<div class="">';
        data = data +
            '<textarea name="features[]" maxlength="200"  class="feature-input-field form-control" id="" cols="30" rows="2"></textarea>';
        data = data + '</div>';
        data = data + '</div>';
        data = data + '<div class="add-delete-section">';
        data = data + '<div class="add-part" onclick="add()">';
        data = data +
            '<a href="javascript:void(0);" class="border add text-success btn rounded my-form-control py-0 px-2 add-area" ><i class="fas fa-plus" ></i></a>';
        data = data + '</div>';
        data = data + '<div class="remove-part" >';
        data = data +
            '<a href="javascript:void(0);" class="border minus text-danger btn rounded my-form-control py-0 px-2 my-1" ><i class="fas fa-minus" ></i></a>';
        data = data + '</div>';
        data = data + '</div>';
        data = data + '</div>';
        data = data + '<div class="feature-group d-flex">';
        data = data + ' <div class="feature-input">';
        data = data + '<div class="">';
        data = data +
            '<textarea name="features[]" maxlength="200"  class="feature-input-field form-control" id="" cols="30" rows="2"></textarea>';
        data = data + '</div>';
        data = data + '</div>';
        data = data + '<div class="add-delete-section">';
        data = data + '<div class="add-part" onclick="add()">';
        data = data +
            '<a href="javascript:void(0);" class="border add text-success btn rounded my-form-control py-0 px-2 add-area" ><i class="fas fa-plus" ></i></a>';
        data = data + '</div>';
        data = data + '<div class="remove-part" >';
        data = data +
            '<a href="javascript:void(0);" class="border minus text-danger btn rounded my-form-control py-0 px-2 my-1" ><i class="fas fa-minus" ></i></a>';
        data = data + '</div>';
        data = data + '</div>';
        data = data + '</div>';

        function add() {
            $("#add-remove-section").append(data);
        }

        $(document).on('click', '.remove-part', function() {
            $(this).parents('.feature-group').remove();
        })
    </script>
@endpush
