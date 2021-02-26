@extends('layouts.admin_layout.master')

@section('content')
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title">Edit Country</h4>
                </div>
                <div class="card-body">
                    <form method="Post" action="{{ route('country-update',$country->id) }}">
                        @csrf
                        @method('put')
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Country Name</label>
                                    <input value="{{$country->name}}" name="name" type="text" class="form-control">
                                </div>
                                @error('name')
                                <span class="danger">{{$message}}</span>
                                @enderror
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Country Code</label>
                                    <input value="{{$country->code}}" name="code" type="text" class="form-control">
                                </div>
                                @error('code')
                                <span class="danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Category Currency</label>
                                    <input value="{{$country->currency}}" name="currency" type="text" class="form-control">
                                </div>
                                @error('currency')
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
