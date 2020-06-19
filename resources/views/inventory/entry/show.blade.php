@extends('layouts.app',['title'=>'Entradas', 'partLink' =>'Show'])

@section('content')

<div class="row">
    <div class="col-12">
        <div class="card">
           <div class="card-body">
            <h4 class="card-title">Entrada de Inventario</h4>
            <div class="row">
                <div class="col-10">
                    <label for="description"> Descripción</label>
                    <input type="text" value="{{ $entry->description }}" name="description" id="description" class="form-control" readonly/>
                </div>
            </div>
            <br>
            <div class="row">
                <table class="table table-striped" id="detEntry">
                    <thead>
                        <th>Producto</th>
                        <th>Cantidad</th>
                    </thead>
                    <tbody>
                        @foreach($details as $detail)
                        <tr>
                            <td>{{ $detail->products->name }}</td>
                            <td>{{ $detail->quantity }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <br>
            <br>
            <div class='form-actions'>
                <div class="text-right">
                    <a class="btn btn-secondary" href="{{ route('inventoryEntry.index') }}">Regresar</a>
                    
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
