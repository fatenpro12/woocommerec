@extends('layouts.admin_layout.master')

@section('content')
    <div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-primary">
                <h4 class="card-title ">Category Table</h4>
                <p class="card-category">Category Of Products</p>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    @include('admin.orders.partials.orders-table',['data' => $orders])
                </div>
                <div class="card-footer">
                    <div class="row pl-3 pr-3 pl-md-0">

                    </div>
                </div>
            </div>

        </div>
    </div>
    </div>



@endsection
@push('js')
    <script type="text/javascript">


        //  $('#categories').DataTable();


    </script>
@endpush
