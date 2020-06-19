@extends('layouts.app',['title'=>'Entradas', 'partLink' =>'Create'])

@section('content')
@php
echo Form::open(['route' => 'inventoryEntry.store','method' => 'post']);
@endphp

<div class="row">
    <div class="col-12">
        <div class="card">
           <div class="card-body">
            <h4 class="card-title">Crear Entrada de Inventario</h4>
            <div class="row">
                <div class="col-10">
                    <label for="description"> Descripción</label>
                    <input type="text" name="description" id="description" class="form-control"/>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-5">
                    <label for="productos"> Productos</label>
                    <select name="productsID" id="productsID" class="form-control">
                        @foreach($productos as $product)
                        <option value="{{ $product->productsID }}"> {{ $product->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-5">
                    <label for="cantidad"> Cantidad</label>
                    <input name="quantity" id="quantity" class="form-control"/>
                </div>
                <div class="col-2">
                    <a href="#" onclick="addDetEntry()" class="btn btn-circle btn-primary"><i class="fas fa-plus"></i></a>
                </div>
            </div>
            <br>
            <div class="row">
                <table class="table table-striped" id="detEntry">
                    <thead>
                        <th>Producto</th>
                        <th>Cantidad</th>
                        <th></th>
                    </thead>
                    <tbody>
                        
                    </tbody>
                </table>
            </div>
            <br>
            <br>
            <div class='form-actions'>
                <div class="text-right">
                    <a class="btn btn-secondary" href="{{ route('inventoryEntry.index') }}">Cancelar</a>
                    &nbsp;
                    <button type="submit" class="btn btn-primary" onclick="saveEntry(event)">Guardar</button>
                </div>
            </div>
        </div>
    </div>
</div>

@php
echo Form::close();      
@endphp

@endsection

@section('js')
<script src="{{ url('/js/inventory/entry.js') }}"></script>
@endsection