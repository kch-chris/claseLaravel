@extends('layouts.app')

@section('content')
    <div class="col-12">
        Crea un nuevo Producto
    </div>

    @php
        echo Form::open(['url' => 'products/'.$product->productsID , 'method' => 'put']);
            echo Form::label('name', 'Name', ['class' => 'awesome']);
            echo Form::text('name', $product->name, array_merge(['class' => 'form-control']));
            echo "<span id='error_name'>".($errors->first('name') != null)?$errors->first('name'):""."</span>";
            echo "<br>";
            
            echo Form::label('description', 'Description', ['class' => 'awesome']);
            echo Form::text('description', $product->description, array_merge(['class' => 'form-control']));
            echo "<span id='error_description'>".($errors->first('description') != null)?$errors->first('description'):""."</span>";
            echo "<br>";
            
            echo Form::label('price', 'Price', ['class' => 'awesome']);
            echo Form::text('price', $product->price, array_merge(['class' => 'form-control']));
            echo "<span id='error_price'>".($errors->first('price') != null)?$errors->first('price'):""."</span>";
            echo "<br>";
            
            echo Form::label('cost', 'Cost', ['class' => 'awesome']);
            echo Form::text('cost', $product->cost, array_merge(['class' => 'form-control']));
            echo "<span id='error_cost'>".($errors->first('cost') != null)?$errors->first('cost'):""."</span>";
            echo "<br>";

            echo Form::submit('Save', ['class'=>'btn btn-primary']);
        echo Form::close();
    @endphp
@endsection()