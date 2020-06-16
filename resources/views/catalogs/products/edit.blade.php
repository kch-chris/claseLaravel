@extends('layouts.app')

@section('content')
    <div class="col-12">
        Edita un Producto
    </div>
    @php
    echo Form::open(['url' => 'products/'.$product->productsID ,'method' => 'put']);

        echo Form::label('Descripcion', null, ['class' => 'control-label']);
        echo Form::text('description', $product->description, array_merge(['class' => 'form-control'], []));
        echo "<span style='color:#F00!important' id='errors_name'> ".($errors->first('description')!=null)?$errors->first('description'):""."</span>";
        echo "<br>";
        echo Form::label('Name', null, ['class' => 'control-label']);
        echo Form::text('name', $product->name, array_merge(['class' => 'form-control'], []));
        echo "<span style='font-color:#F00;' id='errors_name'> ".($errors->first('name')!=null)?$errors->first('name'):""."</span>";
        echo "<br>";
        echo Form::label('Price', null, ['class' => 'control-label']);
        echo Form::number('price',  $product->price, array_merge(['class' => 'form-control','step' => '0.1'], []));
        echo "<span style='font-color:#F00;' id='errors_name'> ".($errors->first('price')!=null)?$errors->first('price'):""."</span>";
        echo "<br>";
        echo Form::label('Cost', null, ['class' => 'control-label']);
        echo Form::number('cost',  $product->cost, array_merge(['class' => 'form-control','step' => '0.1'], []));
        echo "<span style='font-color:#F00!important' id='errors_name'> ".($errors->first('cost')!=null)?$errors->first('cost'):""."</span>";
        echo "<br>";
        echo Form::submit('Save',['class'=>'btn btn-primary']);

    echo Form::close();
    @endphp
@endsection()