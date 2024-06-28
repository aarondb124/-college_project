@extends('layouts.admin')
@section('title', 'Recording Mode')
@section('admin-content')
<main>
   <div class="container ">
    <div class="heading-title p-2 my-2">
        <span class="my-3 heading "><i class="fas fa-home"></i> <a class="" href="{{route('admin.index')}}">Home</a> > Recording Mode Update</span>
    </div>
    <div class="card mb-3">
        <div class="card-header">
            <i class="fas fa-cogs"></i>
            Update Recording Mode
        </div>
        <div class="card-body table-card-body p-3 mytable-body">
            <form action="{{ route('recording_mode.update', $recording_mode->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-md-3">
                                <label>Brand Name:</label>
                            </div>
                            <div class="col-md-7">
                                <input type="text" name="name" value="{{ $recording_mode->name }}" class="form-control">
                            </div>
                            <div class="col-md-2">
                                <button type="submit" class="btn btn-primary btn-sm  float-right" value="Submit">Update</button>
                            </div>
                        </div>
                    </div>
                </div>
                        
                  
                </div>
            </form>
        </div>
   </div>
      
    </div>
</main>        
@endsection
@push('admin-js')


@endpush