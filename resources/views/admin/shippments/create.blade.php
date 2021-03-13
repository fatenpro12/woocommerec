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
                    <form method="Post" action="{{ route('shippment.store') }}">
                        @csrf
                        <div class="row mx-auto">
                            <div class="col-md-10">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Shippment Name</label>
                                    <input name="name" type="text" class="form-control">
                                </div>
                                @error('name')
                                <span class="danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="col-md-10">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Shippment Description</label>
                                    <input name="description" type="text" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-10">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Shippment Phone</label>
                                    <input name="phone" type="text" class="form-control">
                                </div>
                            </div>

                        </div>
                        <button type="submit" class="btn btn-primary pull-right">Save Shippment</button>
                        <div class="clearfix"></div>
                    </form>
                </div>
            </div>
        </div>

    </div>


@endsection
