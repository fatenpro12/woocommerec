@extends('layouts.admin_layout.master')

@section('content')
    <div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-primary">
                <h4 class="card-title ">Address Table</h4>
                <p class="card-category">Address Of Products</p>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    @include('admin.addresses.partials.addresses-table',['data' => $addresses])
                </div>
                <div class="card-footer">
                    <div class="row pl-3 pr-3 pl-md-0">
                        <a href="{{ route('address.create') }}" class="btn btn-primary ">
                            Add Address
                        </a>
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
