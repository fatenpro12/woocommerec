@extends('layouts.admin_layout.master')

@section('content')
    <div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-primary">
                <h4 class="card-title ">Product Table</h4>
                <p class="card-category"></p>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    @include('admin.products.partials.products-table',['data' => $products])
                </div>
                <div class="card-footer">
                    <div class="row pl-3 pr-3 pl-md-0">
                        <a href="{{ route('product.create',$category_id) }}" class="btn btn-primary ">
                            Add Product
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



    </script>
@endpush
