@extends('layouts.admin_layout.master')

@section('content')
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title">Add Country</h4>
                </div>
                <div class="card-body">
                    <form method="Post" action="{{ route('new-country') }}">
                        @csrf
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Country Name</label>
                                    <input name="name" type="text" class="form-control">
                                </div>
                                @error('name')
                                <span class="danger">{{$message}}</span>
                                @enderror
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Code</label>
                                    <input name="code" type="text" class="form-control">
                                </div>
                                @error('code')
                                <span class="danger">{{$message}}</span>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Currency</label>
                                    <input name="currency" type="text" class="form-control">
                                </div>
                                @error('currency')
                                <span class="danger">{{$message}}</span>
                                @enderror
                            </div>

                        </div>
                       

                        <button type="submit" class="btn btn-primary pull-right">Save</button>
                        <div class="clearfix"></div>
                    </form>
                </div>
            </div>
        </div>

    </div>


@endsection
