<div class="col-md-12">
<div class="card-body" id="address{{$address->id}}del" style="border: 1px lightgray">
    <input type="hidden" name="addr_id[]" value="{{$address->id}}">
    <div class="form-group row">
        <div class="col-md-6">
        <label for="exampleInputName1">المدينة</label>

        <select  name="city[]" class=" js-example-tags form-control sel" id="sel{{$address->id}}" >
                @foreach($cities as $city)
                   <option value="{{$city->id}}" {{$city->id==$address->city_id?'selected':''}}>{{$city->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-6">
           <label for="exampleInputName1">الشارع</label>

          <input type="text" name="street[]" style="text-transform: capitalize;"  value="{{$address->street}}" class="form-control" id="exampleInputName1" placeholder="الشارع">
        </div>
    </div>
    <div class="form-group row">
        <div class="col-md-6">
            <label for="exampleInputName1">رقم البيت</label>

           <input type="text" name="house_number[]"  value="{{$address->house_number}}" class="form-control" id="exampleInputName1" placeholder="رقم البيت">
        </div>
        <div class="col-md-6">
           <label for="exampleInputName1">الرمز البريدي</label>

           <input type="text" name="post_code[]" style="text-transform:uppercase"  value="{{$address->post_code}}" class="form-control" id="exampleInputName1" placeholder="الرمز البريدي">
        </div>
    </div>
    <a href="#" class="btn btn-danger"  onclick="delaccount(event,{{$address->id}})">-</a>
    </div>
</div>
