
<table id="categories" class="table table-striped table-hover">
    <thead class="text-primary">
    <th>
        Payment Status
    </th>
    <th>
        Shipment Date
    </th>
    <th>
        Start Date
    </th>
    <th>
        End Date
    </th>
    <th>
        User Name
    </th>
    <th>
        Product Name
    </th>
    <th>
        Quantitiy
    </th>
    <th>
        Shippment Name
    </th>
    <th>
        Created At
    </th>
    </thead>
    <tbody>
    @foreach ($data as $item)
        <tr id="{{$item->id}}">
            <td>{{$item->payment_status}}</td>
            <td>{{$item->shipment_date}}</td>
            <td>{{$item->start_date}}</td>
            <td>{{$item->end_date}}</td>
            <td>{{$item->user->name}}</td>
            <td>{{$item->product->title['ar']}}</td>
            <td>{{$item->quantity}}</td>
            <td>{{$item->ship->name}}</td>
            <td>{{date('d-m-Y', strtotime($item->created_at))}}</td>

        </tr>
    @endforeach
    </tbody>
</table>

