@extends('layouts.admin_layout.master')

@section('content')
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title">Add Category</h4>
                    <p class="card-category">Add New Category</p>
                </div>
                <div class="card-body">
                    <form method="Post" action="{{ route('category.store') }}">
                        @csrf
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Category Name</label>
                                    <input name="name" type="text" class="form-control">
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
