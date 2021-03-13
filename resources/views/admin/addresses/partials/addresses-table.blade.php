
<table id="categories" class="table table-striped table-hover">
    <thead class="text-primary">
    <th>
        Street
    </th>
    <th>
        Home Number
    </th>
    <th>
       Post Code
    </th>
    <th>
        Created At
    </th>
    </thead>
    <tbody>
    @foreach ($data as $item)
        <tr id="{{$item->id}}">
            <td>{{$item->street}}</td>
            <td>{{$item->house_number}}</td>
            <td>{{$item->post_code}}</td>
            <td>{{date('d-m-Y', strtotime($item->created_at))}}</td>
            <td style="text-align:center">
                <div class="dropdown">
                    <span class="dropdown-toggle no-caret" data-toggle="dropdown"><i class="fa fa-cog"></i></span>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a href="{{route('address',$item->id)}}" class="dropdown-item" id="{{$item->id}}">
                            Products
                        </a>
                        <a href="{{asset('admin/address/edit/'.$item->id)}}" class="dropdown-item" id="{{$item->id}}">
                            Edit
                        </a>

                        <a href="{{asset('admin/category/delete/'.$item->id)}}" class="dropdown-item" id="{{$item->id}}">
                            Delete
                        </a>


                    </div>
                </div>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

