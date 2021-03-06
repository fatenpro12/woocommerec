
<table id="categories" class="table table-striped table-hover">
    <thead class="text-primary">
    <th>
        Name
    </th>
    <th>
        Description
    </th>
    <th>
        Phone
    </th>
    <th>
        Created At
    </th>
    </thead>
    <tbody>
    @foreach ($data as $item)
        <tr id="{{$item->id}}">
            <td>{{$item->name}}</td>
            <td>{{$item->description}}</td>
            <td>{{$item->phone}}</td>
            <td>{{date('d-m-Y', strtotime($item->created_at))}}</td>
            <td style="text-align:center">
                <div class="dropdown">
                    <span class="dropdown-toggle no-caret" data-toggle="dropdown"><i class="fa fa-cog"></i></span>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a href="{{asset('admin/shippment/edit/'.$item->id)}}" class="dropdown-item" id="{{$item->id}}">
                            Edit
                        </a>

                        <a href="{{asset('admin/shippment/delete/'.$item->id)}}" class="dropdown-item" id="{{$item->id}}">
                            Delete
                        </a>


                    </div>
                </div>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

