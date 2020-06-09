@extends('layouts.app')


@section('content')
   

<div class="panel">
    <div>
        <h2>Products</h2>
        @can('create products')
        <div class="float-right">
        <a href="{{ route('products.create') }}" class="btn btn-circle btn-primary"><i class="fas fa-plus"></i></a>
        </div>
        @endcan
    </div>

    <div class="col-8">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th >Name</th>
                        <th >Description</th>
                        <th >Price</th>
                        <th >Cost</th>
                        <th></th>
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
                        <a href="{{ "products/".$product->productsID."/edit" }}" class="btn btn-circle btn-success"><i class="fas fa-pencil-alt"></i></a>
                        @endcan
                        @can('delete products')
                        <form action="{{ "products/".$product->productsID }}" method="post">   
                            <input type="hidden" name="_method" value="DELETE">
                            @csrf
                            <button type="submit" class="btn btn-circle btn-danger"><i class="fas fa-trash"></i></button>
                        </form>
                        @endcan
                        </td>
                    </tr>        
                    @empty
                        <p>No users</p>
                    @endforelse
            
        </tbody>
        </table>

    </div>
</div>
@endsection