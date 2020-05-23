@extends('layouts.app')

@section('content')
    
    <div class="col-12">
        Crea un nuevo Producto
    </div>
    @php
    echo Form::open(['route' => 'products.store','method' => 'post']);

        echo Form::label('Descripcion', null, ['class' => 'control-label']);
        echo Form::text('description', null, array_merge(['class' => 'form-control'], []));
        echo "<br>";
        echo Form::label('Name', null, ['class' => 'control-label']);
        echo Form::text('name', null, array_merge(['class' => 'form-control'], []));
        echo "<br>";
        echo Form::label('Price', null, ['class' => 'control-label']);
        echo Form::number('price',  null, array_merge(['class' => 'form-control','step' => '0.1'], []));
        echo "<br>";
        echo Form::label('Cost', null, ['class' => 'control-label']);
        echo Form::number('cost',  null, array_merge(['class' => 'form-control','step' => '0.1'], []));
        echo "<br>";
        echo Form::submit('Save',['class'=>'btn btn-primary']);

    echo Form::close();
    @endphp
@endsection()