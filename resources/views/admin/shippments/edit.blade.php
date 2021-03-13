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
                    <form method="Post" action="{{ route('shippment.update',$shippment) }}">
                        @csrf
                        @method('put')
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Shippment Name</label>
                                    <input name="name" value="{{$shippment->name}}" type="text" class="form-control">
                                </div>
                                @error('name')
                                <span class="danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Shippment Description</label>
                                    <textarea name="description" type="text" class="form-control">{{$shippment->description}}</textarea>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Shippment Phone</label>
                                    <input name="phone" value="{{$shippment->phone}}" type="text" class="form-control">
                                </div>
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
