@extends('layouts.app')

@section('content')
    
    <div class="col-12">
        Crea un nuevo Producto
    </div>
    @php
    echo Form::open(['route' => 'products.store','method' => 'post']);

        echo Form::label('Descripcion', null, ['class' => 'control-label']);
        echo Form::text('description', null, array_merge(['class' => 'form-control'], []));
        echo "<span style='font-color:#F00;' id='errors_name'> ".($errors->first('description')!=null)?$errors->first('description'):""."</span>";
        echo "<br>";
        echo Form::label('Name', null, ['class' => 'control-label']);
        echo Form::text('name', null, array_merge(['class' => 'form-control'], []));
        echo "<span style='font-color:#F00;' id='errors_name'> ".($errors->first('name')!=null)?$errors->first('name'):""."</span>";
        echo "<br>";
        echo Form::label('Price', null, ['class' => 'control-label']);
        echo Form::number('price',  null, array_merge(['class' => 'form-control','step' => '0.1'], []));
        echo "<span style='font-color:#F00;' id='errors_name'> ".($errors->first('price')!=null)?$errors->first('price'):""."</span>";
        echo "<br>";
        echo Form::label('Cost', null, ['class' => 'control-label']);
        echo Form::number('cost',  null, array_merge(['class' => 'form-control','step' => '0.1'], []));
        echo "<span style='font-color:#F00;' id='errors_name'> ".($errors->first('cost')!=null)?$errors->first('cost'):""."</span>";
        echo "<br>";
        echo Form::submit('Save',['class'=>'btn btn-primary']);

    echo Form::close();
      if(isset($errors)) print_r($errors->first('name'));
    @endphp
    
@endsection()