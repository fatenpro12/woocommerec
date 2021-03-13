
<table id="categories" class="table table-hover">
    <thead class="text-primary">
    <th>
        Ar Title
    </th>
    <th>
        En Title
    </th>
    <th>
        Ar Description
    </th>
    <th>
        En Description
    </th>
    <th>
        Price
    </th>
    <th>
        Discount
    </th>
    <th>
        Stock
    </th>
    <th>
        Created At
    </th>
    </thead>
    <tbody>
    @foreach ($data as $item)
        <tr id="{{$item->id}}">
            <td>{{$item->title!=''?$item->title->ar:''}}</td>
            <td>{{$item->title!=''?$item->title->en:''}}</td>
            <td>{{$item->description!=''?$item->description->ar:''}}</td>
            <td>{{$item->description!=''?$item->description->en:''}}</td>
            <td>{{$item->price}}</td>
            <td>{{$item->discount}}</td>
            <td>{{$item->stock}}</td>
            <td>{{date('d-m-Y', strtotime($item->created_at))}}</td>
            <td style="text-align:center">
                <div class="dropdown">
                    <span class="dropdown-toggle no-caret" data-toggle="dropdown"><i class="fa fa-cog"></i></span>
                    <div class="dropdown-menu dropdown-menu-right">

                        <a href="{{asset('admin/product/edit/'.$item->id)}}" class="dropdown-item" id="{{$item->id}}">
                            Edit
                        </a>

                        <a href="{{asset('admin/product/delete/'.$item->id)}}" class="dropdown-item" id="{{$item->id}}">
                            Delete
                        </a>


                    </div>
                </div>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

