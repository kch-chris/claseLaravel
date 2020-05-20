@extends('layouts.app')


@section('content')
   


    <div>
        <h2>Products</h2>
        <div class="float-right">
        <a href="/products/add" class="btn btn-circle btn-primary"><i class="fas fa-plus"></i></a>
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
                            <button class="btn btn-circle btn-success"><i class="fas fa-pencil-alt"></i></button>
                            <button class="btn btn-circle btn-danger"><i class="fas fa-trash"></i></button>
                        </td>
                    </tr>        
                    @empty
                        <p>No users</p>
                    @endforelse
            
        </tbody>
        </table>

    </div>

@endsection