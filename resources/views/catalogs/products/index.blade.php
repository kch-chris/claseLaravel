@extends('layouts.app')


@section('content')
   
        <div class="col-8">
            <h2>
                Products
            <a href="/products/add" class="btn btn-circle btn-primary float-right"><i class="fas fa-plus"></i></a>
            </h2>
        </div>

        <div class="col-8">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Cost</th>
                        <th><i class="fas fa-cog"></i></th>  
                    </tr>                    
                </thead>
                <tbody>
                    @forelse ($products as $product)
                    <tr>
                        <td>{{$product->name}}</td>
                        <td>{{$product->description}}</td>
                        <td>{{$product->price}}</td>
                        <td>{{$product->cost}}</td>
                        <td>
                            <a href="javascript:;" class="btn btn-circle btn-success"><i class="fas fa-pencil-alt"></i></a>
                            <a href="javascript:;" class="btn btn-circle btn-danger"><i class="fas fa-trash"></i></a>
                        </td>
                    </tr>
                        {{-- <li>{{$product->name}}</li> --}}
                    @empty
                        
                    @endforelse
                    
                </tbody>
            </table>
        </div>
    @endsection