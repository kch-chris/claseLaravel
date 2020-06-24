@extends('layouts.app',['title'=>'Entradas', 'partLink' =>'Show'])

@section('content')

<div class="row">
    <div class="col-12">
        <div class="card">
           <div class="card-body">
                <h2>
                   {{$entry[0]->description}}
                </h2>
                <table class="table table-striped table-bordered no-wrap">
                    <tr>
                        <th>Producto</th>
                        <th>Cantidad</th>
                    </tr>
                    @foreach ($products as $product)
                        <tr>
                            <td>{{ $product->productos->name }}</td>
                            <td>{{ $product->quantity }}</td>
                        </tr>
                    @endforeach
                </table>
           </div>
        </div>
    </div>
</div>

@endsection
