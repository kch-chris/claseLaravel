@extends('layouts.app')

@section('css')
<link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" rel="stylesheet">
{{-- <link href="{{ asset('assets/libs/datatables/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet"> --}}

@endsection

@section('content')
@include('alerts.confirm')

<div class="card">
    <div>
        @can('create products')
        <div class="float-right" style="margin-right:10px; margin-top:10px;">
        <a href="{{ route('products.create') }}" class="btn btn-circle btn-primary"><i class="fas fa-plus"></i></a>
        </div>
        @endcan
    </div>
    <div class="col-12" class="table-responsive">
        <table class="table table-striped table-bordered no-wrap" id="productsTable" width="100%">
            <thead>
                <tr>
                    <th >Name</th>
                    <th >Description</th>
                    <th >Price</th>
                    <th >Cost</th>
                    <th> Actions</th>
                </tr>
            </thead>
            <tbody>
                
                @forelse ($products as $product)
                <tr>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->description }}</td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->cost }}</td>
                    <td>

                    @can('edit products')
                    <a href="{{ "products/".$product->productsID."/edit" }}" class="btn btn-circle btn-success">
                        <i class="fas fa-pencil-alt"></i>
                    </a>
                    @endcan
                    @can('delete products')
                    <form action="{{ "products/".$product->productsID }}" method="post" id="delete{{ $product->productsID }}">   
                        <input type="hidden" name="_method" value="DELETE">
                        @csrf
                        <button type="submit" onclick="checkDelete(event,'delete{{ $product->productsID }}')" class="btn btn-circle btn-danger">
                            <i class="fas fa-trash"></i>
                        </button>
                    </form>
                    @endcan
                    </td>
                </tr>        
                @empty
                    
                @endforelse
        
            </tbody>
           
    </div>
</div>
@endsection

@section('js')
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="{{ url('/js/catalogs/products.js') }}"></script>
@endsection