@extends('layouts.admin_layout.master')

@section('content')
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title">Edit Address</h4>
                    <p class="card-category">Edit Address</p>
                </div>
                <div class="card-body">
                    <form method="Post" action="{{ route('address.update',$address) }}">
                        @csrf
                        @method('put')
                        <div class="form-group row">
                            <div class="col-md-12">

                                <fieldset id="buildyourform" class="input_fields_wrap">
                                    <div style="border: 1px solid lightgray;padding: 1em;border-radius: 1em;margin-bottom: 1em">
                                        <div class="row">
                                            <div class="col-md-6 form-group" style="text-align: start!important;">


                                                <select  name="city" class="js-example-tags form-control sel city" >
                                                    @foreach($cities as $city)
                                                        <option value="{{$city->id}}" {{$address->city_id==$city->id}}>{{$city->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="col-md-6 form-group" style="text-align: start!important;">
                                                <label for="nameAr" class="bmd-label-floating" style="text-align: start">{{ __('admin.street') }}</label>
                                                <input type="text" name="street" style="text-transform: capitalize;"  value="{{$addrss->street}}" class="form-control street" id="exampleInputName1">
                                            </div>
                                        </div>
                                        <div class=" row">
                                            <div class="col-md-6 form-group" style="text-align: start!important;">
                                                <label for="nameAr" class="bmd-label-floating" style="text-align: start">{{ __('admin.house') }}</label>

                                                <input type="text" name="house_number"  value="{{$addrss->house_number}}" class="form-control house" id="exampleInputName1">
                                            </div>
                                            <div class="col-md-6 form-group" style="text-align: start!important;">
                                                <label for="nameAr" class="bmd-label-floating" style="text-align: start">{{ __('admin.post_code') }}</label>

                                                <input type="text" name="post_code" style="text-transform:uppercase"  value="{{$addrss->post_code}}" class="form-control post_code" id="exampleInputName1">
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                                <br>
                                <input type="button" value="Add New Address" class="btn btn-primary  add add_field_button" id="preview" />
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
