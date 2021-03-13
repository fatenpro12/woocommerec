@extends('layouts.admin_layout.master')

@section('content')
    <style>

        .select2{
            width: 100%!important;
            margin-top: 2.5em!important;
        }
       img{
           max-width: 15em;
           height: 10em;
           margin-right: auto;
           margin-left: auto;
           margin-bottom: 1em;
       }
    </style>
    <div class="row">
        <div class="col-md-8 mx-auto">

            <!-- Tabs with icons on Card -->
            <div class="card card-nav-tabs">
                <div class="card-header card-header-primary">
                    <!-- colors: "header-primary", "header-info", "header-success", "header-warning", "header-danger" -->
                    <div class="nav-tabs-navigation">
                        <div class="nav-tabs-wrapper" id="demoTabs">
                            <ul class="nav nav-tabs" data-tabs="tabs">
                                <li class="nav-item info">
                                    <a class="nav-link active" id="info1" href="#info" data-toggle="tab">
                                        <i class="material-icons">info</i>
                                        Main Data
                                    </a>
                                </li>
                                <li class="nav-item " >
                                    <a class="nav-link address" id="address1" href="#address" data-toggle="tab">
                                        <i class="material-icons"></i>
                                        Addresses
                                    </a>
                                </li>
                                <li class="nav-item option" >
                                    <a class="nav-link" id="option1" href="#option" data-toggle="tab">
                                        <i class="material-icons"></i>
                                        More Detailes
                                    </a>
                                </li>
                                <li class="nav-item image">
                                    <a class="nav-link" id="image1" href="#image" data-toggle="tab">
                                        <i class="material-icons">image</i>
                                        Images
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div><div class="card-body">
                    <div class="tab-content text-center">

                        <div class="tab-pane active" id="info">
                            <form method="Post" action="" class="info">
                                @csrf
                                @method('put')
                                <input type="hidden" name="product_id" value="{{$product->id}}" id="product_id">
                                <div class="row">
                                    <div class="col-md-6" style="text-align: start!important;">
                                        <div class="form-group">
                                            <label for="nameAr" class="bmd-label-floating">{{ __('admin.products.title.ar') }}</label>
                                            <input id="nameAr" type="text" class="form-control" name="title.ar" value="{{$product->title!=''?$product->title->ar:''}}" required autocomplete="title" autofocus>
                                        </div>
                                        @error('title.ar')
                                        <span class="danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6" style="text-align: start!important;">
                                        <div class="form-group">
                                            <label for="nameEn" class="bmd-label-floating">{{ __('admin.products.title.en') }}</label>

                                            <input id="titleEn" type="text" class="form-control" name="title.en" value="{{$product->title!=''?$product->title->en:''}}" required autocomplete="title" autofocus>
                                            @error('title.en')
                                            <span class="danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class=" row">
                                    <div class="col-md-6" style="text-align: start!important;">
                                        <div class="form-group">
                                            <label for="nameEn" class="bmd-label-floating">{{ __('admin.products.description.ar') }}</label>
                                            <textarea id="descriptionAr" class="form-control" name="description.ar">{{$product->description!=''?$product->description->ar:''}}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6" style="text-align: start!important;">
                                        <div class="form-group">
                                            <label for="v" class="bmd-label-floating">{{ __('admin.products.description.en') }}</label>
                                            <textarea id="descriptionen" class="form-control" name="description.en">{{$product->description!=''?$product->description->en:''}}</textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6" style="text-align: start!important;">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">{{ __('admin.products.price') }}</label>
                                            <input name="price" value="{{$product->price}}" type="number" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6" style="text-align: start!important;">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">{{ __('admin.products.discount') }}</label>
                                            <input name="discount" value="{{$product->discount}}" type="number" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12" style="text-align: start!important;">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">{{ __('admin.products.stock') }}</label>
                                            <input name="stock" value="{{$product->stock}}" type="number" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12" style="text-align: start!important;">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">{{ __('admin.products.unit') }}</label>
                                            <select name="unit_id" type="number" class="form-control sel">
                                                @foreach($units as $unit)
                                                    <option value="{{$unit->id}}" {{$product->unit_id==$unit->id?'selected':''}}>{{$unit->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary pull-right btn-submit">Save Product</button>
                            </form>
                        </div>
                        <div class="tab-pane" id="address">
                            <form method="Post" action="" class="address">
                                @csrf
                                <input type="hidden" name="product_id" value="{{$product->id}}" id="product_id">
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
                                                <input type="text" name="street" style="text-transform: capitalize;"  value="{{$address!=null?$address->street:''}}" class="form-control street" id="exampleInputName1">
                                            </div>
                                        </div>
                                        <div class=" row">
                                            <div class="col-md-6 form-group" style="text-align: start!important;">
                                                <label for="nameAr" class="bmd-label-floating" style="text-align: start">{{ __('admin.house') }}</label>

                                                <input type="text" name="house_number"  value="{{$address!=null?$address->house_number:''}}" class="form-control house" id="exampleInputName1">
                                            </div>
                                            <div class="col-md-6 form-group" style="text-align: start!important;">
                                                <label for="nameAr" class="bmd-label-floating" style="text-align: start">{{ __('admin.post_code') }}</label>

                                                <input type="text" name="post_code" style="text-transform:uppercase"  value="{{$address!=null?$address->post_code:''}}" class="form-control post_code" id="exampleInputName1">
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                                <button type="submit" class="btn btn-primary pull-right address-submit">Save Address</button>
                            </form>
                        </div>
                        <div class="tab-pane" id="option">
                            <div class="form-group row">

                                <div class="col-md-12">
                                    <form method="Post" action="" class="option">
                                        @csrf
                                        <input type="hidden" name="product_id" value="{{$product->id}}" id="product_id">
                                        <fieldset id="buildyourform" class="input_fields_wrap">
                                            @foreach($product->options as $option)
                                            <div style="border: 1px solid lightgray;padding: 1em;border-radius: 1em;margin-bottom: 1em">
                                                <div class=" row">
                                                    <div class="col-md-6 form-group" style="text-align: start!important;">
                                                        <label for="nameAr" class="bmd-label-floating" style="text-align: start">{{ __('admin.name') }}</label>

                                                        <input type="text" name="key[]" required value="{{$option['key']}}" class="form-control house" id="exampleInputName1">
                                                    </div>
                                                    <div class="col-md-6 form-group" style="text-align: start!important;">
                                                        <label for="nameAr" class="bmd-label-floating" style="text-align: start">{{ __('admin.value') }}</label>

                                                        <input type="text" name="value[]" required value="{{$option['value']}}" style="text-transform:uppercase" class="form-control post_code" id="exampleInputName1">
                                                    </div>
                                                </div>
                                            </div>
                                           @endforeach
                                        </fieldset>
                                        <input type="button" value="Add New Option" class="btn btn-primary  add add_option_button" id="preview" />

                                        <input type="button" value="Save" class="btn btn-primary btn-option" id="preview" />

                                        <br>
                                    </form>
                                </div>

                            </div>
                        </div>


                        <div class="tab-pane" id="image">
                            {{$product->main_image}}
                            <div class="form-group row">

                                <label for="exampleInputName1" class="col-md-2 col-form-label text-md-right"> الصورة الرئيسية<span style="color: red">*</span></label>
                                <div class="col-md-10">
                                    <div class="dropzone" id="main_photo"></div>
                                </div>
                                <input type="hidden" value="" name="main_image" id="main">

                                <input type="hidden" id="main_image_id" name="main_image" value="{{ old('main_image') }}">
                                @error('main_image')
                                <div class="alert alert-danger mx-auto laravel_validate" style="width: fit-content;"role="alert">
                                    <strong>الصورة الرئيسية مطلوية</strong>
                                </div>
                                @enderror
                                <div class="alert alert-danger mx-auto main" style="display:none"></div>
                            </div>
                            @foreach($product->photos as $photo)
                                {{$photo}}
                            @endforeach
                            @if(old('other_files') && count(old('other_files'))>0)
                                @foreach(old('other_files') as $file)
                                    <input type="hidden" id="" name="other_files[]" value="{{ $file }}">
                                @endforeach
                            @else
                                <input type="hidden" id="other_files_input" name="other_files[]" value="">
                            @endif
                            <div class="form-group row">
                                <label for="exampleInputName1" class="col-md-2 col-form-label text-md-right">الصور الاخرى</label>
                                <div class="col-md-10">

                                    <div class="dropzone" id="dropzonefileupload"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Tabs with icons on Card -->

        </div>

    </div>


@endsection

@push('js')

    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var product_id='';


        $(".btn-submit").click(function(e){

            e.preventDefault();

            var data = $('.info').serialize();

            var url = '{{ route('product.update') }}';

            $.ajax({
                url:url,
                method:'PUT',
                data:data,
                success:function(response){
                    $('#product_id').val(response.id)
                    product_id=response.id

                    /* $('#option1').show()
                     $('#image1').show()
                     $('.info').removeClass('active')
                     $('#info1').removeClass('active show')

                     $('.option').addClass('active')
                     $('#option1').addClass('active show')*/


                },
                error:function(error){
                    console.log(error)
                }
            });
        });

        $(".address-submit").click(function(e){

            e.preventDefault();

            var data = $('.address').serialize();

            var url = '{{$address!=null? route('address.update',$address):route('address.store') }}';

            $.ajax({
                url:url,
                method:'post',
                data:data,
                success:function(response){

                },
                error:function(error){
                    console.log(error)
                }
            });
        });
        $(".btn-option").click(function(e){
            e.preventDefault();
            var data = $('.option').serialize();
            var url = '{{ route('product.update') }}';

            $.ajax({
                url:url,
                method:'PUT',
                data:data,
                success:function(response){
                    //  $('#product_id').val(response.id)
                },
                error:function(error){
                    console.log(error)
                }
            });
        });

        $('#main_photo').dropzone({
            url:"{{asset('admin/products/upload_image/'.$product->id)}}",
            paramName:'file',
            autoDiscover:false,
            uploadMultiple:false,
            maxFiles:1,
            maxFilessize:15, // MB
            timeout: 50000000000,
            acceptedFiles:'image/*',
            dictDefaultMessage:'<i class="fa fa-plus fa-fw fa-5x add-photo" style="color:#d0cece!important"></i>',
            dictRemoveFile:'Delete',
            params:{
                _token:'{{ csrf_token() }}'
            },
            addRemoveLinks:true,
            removedfile:function(file)
            {
                $.ajax({
                    dataType:'json',
                    type:'get',
                    url: '{{ asset('admin/products/deleteImage') }}/'+file.fid,
                    // data:{_token:'{{ csrf_token() }}',id:file.fid}
                });
                var fmock;
                return (fmock = file.previewElement) != null ? fmock.parentNode.removeChild(file.previewElement):void 0;



            },
            init:function(){

                let main_image = $('#main_image_id').val();
                if(main_image){
                    var mockFile = { name: main_image.split('/ ').pop(), size: 12345, type: 'image/'+main_image.split('.').pop()};
                    console.log(mockFile);
                    this.emit('addedfile',mockFile);
                    this.options.thumbnail.call(this,mockFile,'/public'+main_image );
                    $('.dz-progress').remove();
                    var existingFileCount = 1; // The number of files already uploaded
                    this.options.maxFiles = this.options.maxFiles - existingFileCount;
                }

                this.on("addedfile", function (file) {

                    if (this.files.length > 1) {
                        console.log(this.files)
                        alert("You can Select upto 1 Pictures for Venue Profile.", "error");
                        this.removeFile(this.files[0]);
                    }

                });


                this.on('sending',function(file,xhr,formData){
                    formData.append('fid','');
                    file.fid = '';
                });

                this.on('success',function(file,response){
                    file.fid = response.id;
                    console.log(file.dataURL)
                    $('#main').val(file.dataURL);
                    $("#main_image_id").val(response);
                });


            }
        });
        $('#dropzonefileupload').dropzone({
            url:"{{asset('admin/products/upload_others/'.$product->id)}}",
            paramName:'files',
            autoDiscover:false,
            uploadMultiple:false,
            maxFiles:5,
            maxFilessize:40, // MB
            timeout: 5000000,
            acceptedFiles:'image/*',
            dictDefaultMessage:'<i class="fa fa-plus fa-fw fa-5x add-photo" style="color:#d0cece!important"></i>',
            dictRemoveFile:'حذف',
            addRemoveLinks: true,
            params:{
                _token:'{{ csrf_token() }}'
            },
            removedfile:function(file)
            {
                //file.fid
                $.ajax({
                    dataType:'json',
                    type:'post',
                    url:'',
                    data:{_token:'{{ csrf_token() }}'}
                });
                var fmock;
                return (fmock = file.previewElement) != null ? fmock.parentNode.removeChild(file.previewElement):void 0;


            },
            init:function(){
                let other_images = $( "input[name='other_files[]']" ).val();
                if(other_images){
                    let images = other_images.split(',');
                    images.forEach((image)=>{

                        let mockFile = { name: image.split('/ ').pop(), size: 12345, type: 'image/'+image.split('.').pop()};
                    this.emit('addedfile',mockFile);
                    this.options.thumbnail.call(this,mockFile,'/public'+image );
                    $('.dz-progress').remove();
                    var existingFileCount = 1; // The number of files already uploaded
                    this.options.maxFiles = this.options.maxFiles - existingFileCount;


                });
                }
                this.on('sending',function(file,xhr,formData){
                    formData.append('fid','');
                    file.fid = '';
                });

                this.on('success',function(file,response){
                    file.fid = response.id;
                    let input = document.getElementById('other_files_input');
                    let old = input.value;
                    if(old){
                        input.value = old + ','+ response;
                    }
                    else {
                        input.value = old +  response;
                    }
                });


            }
        });


        var address = 1; //initlal text box count
        var option = 1; //initlal text box count
        $(document).ready(function() {

            var max_fields      = 7; //maximum input boxes allowed
            var wrapper   		= $(".input_fields_wrap"); //Fields wrapper
            var add_button      = $(".add_field_button"); //Add button ID
            var add_option      = $(".add_option_button"); //Add button ID

            {{--   $(add_button).click(function(e){
                e.preventDefault();

                $(wrapper).append(
                    @include('admin.products.components.city_address')
                );
                address++;
            });--}}
            $(add_option).click(function(e){
                e.preventDefault();

                $(wrapper).append(
                    @include('admin.products.components.options')
                );
                option++;
            });
            $(".sel").select2({
                tags: true
            });
            $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
                e.preventDefault(); $(this).parent('div').remove(); address--;
            });

        });


    </script>
@endpush
