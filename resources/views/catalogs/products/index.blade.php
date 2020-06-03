@extends('layouts.app')


@section('content')
   


    <div>
        <h2>Products</h2>
        <div class="float-right">
        <a href="{{ route('products.create') }}" class="btn btn-circle btn-primary"><i class="fas fa-plus"></i></a>
        </div>
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
                            <a href="{{ "products/".$product->productsID."/edit" }}" class="btn btn-circle btn-success"><i class="fas fa-pencil-alt"></i></a>
                            <form action="{{ "products/".$product->productsID }}" method="post">
                                <input type="hidden" name="_method" value="DELETE">
                                @csrf
                                <button type="submit" class="btn btn-circle btn-danger"><i class="fas fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>        
                    @empty
                        <p>No users</p>
                    @endforelse
            
        </tbody>
        </table>

    </div>

@endsection