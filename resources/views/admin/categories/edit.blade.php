@extends('layouts.admin_layout.master')

@section('content')
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title">Edit Category</h4>
                    <p class="card-category">Edit Category</p>
                </div>
                <div class="card-body">
                    <form method="Post" action="{{ route('category.update',$category) }}">
                        @csrf
                        @method('put')
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Category Name</label>
                                    <input value="{{$category->name}}" name="name" type="text" class="form-control">
                                </div>
                                @error('name')
                                <span class="danger">{{$message}}</span>
                                @enderror
                            </div>

                        </div>
                        <button type="submit" class="btn btn-primary pull-right">Save Category</button>
                        <div class="clearfix"></div>
                    </form>
                </div>
            </div>
        </div>

    </div>
@endsection
