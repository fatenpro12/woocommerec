' <div style="border: 1px solid lightgray;padding: 1em;border-radius: 1em">\n' +
    '                                                    <div class="row">\n' +
    '                                                         <div class="col-md-6 form-group" style="text-align: start!important;margin-bottom: 1em">\n' +
    '\n' +
    '                                                             <label for="nameAr" class="bmd-label-floating">{{ __('admin.city') }}</label>\n' +
    '                                                             <select  name="city[]" class="js-example-tags form-control sel city" >\n' +
    '                                                                    @foreach($cities as $city)\n' +
    '                                                                       <option value="{{$city->id}}">{{$city->name}}</option>\n' +
    '                                                                    @endforeach\n' +
    '                                                                </select>\n' +
    '                                                            </div>\n' +
    '\n' +
    '                                                <div class="col-md-6 form-group" style="text-align: start!important;">\n' +
    '                                                    <label for="nameAr" class="bmd-label-floating" style="text-align: start">{{ __('admin.street') }}</label>\n' +
    '                                                    <input type="text" name="street[]" style="text-transform: capitalize;"  value="" class="form-control street" id="exampleInputName1">\n' +
    '                                                </div>\n' +
    '                                                    </div>\n' +
    '                                                    <div class=" row">\n' +
    '                                                         <div class="col-md-6 form-group" style="text-align: start!important;">\n' +
    '                                                             <label for="nameAr" class="bmd-label-floating" style="text-align: start">{{ __('admin.house') }}</label>\n' +
    '\n' +
    '                                                             <input type="text" name="house_number[]"  value="" class="form-control house" id="exampleInputName1">\n' +
    '                                                            </div>\n' +
    '                                                        <div class="col-md-6 form-group" style="text-align: start!important;">\n' +
    '                                                            <label for="nameAr" class="bmd-label-floating" style="text-align: start">{{ __('admin.post_code') }}</label>\n' +
    '\n' +
    '                                                            <input type="text" name="post_code[]" style="text-transform:uppercase"  value="" class="form-control post_code" id="exampleInputName1">\n' +
    '                                                        </div>\n' +
    '                                                    </div>\n' +
    '                                                </div>'
