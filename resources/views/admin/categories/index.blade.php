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
                    @include('admin.categories.partials.categories-table',['data' => $categories])
                </div>
                <div class="card-footer">
                    <div class="row pl-3 pr-3 pl-md-0">
                        <a href="{{ route('category.create') }}" class="btn btn-primary ">
                            Add Category
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>


@push('js')
    <script type="text/javascript">


      //  $('#categories').DataTable();


    </script>
@endpush
@endsection
