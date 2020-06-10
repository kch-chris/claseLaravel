@extends('layouts.app')

@section('content')
    <div class="col-12">
        Crea un nuevo Producto
    </div>
<<<<<<< HEAD

    @php
        echo Form::open(['route' => 'products.store', 'method' => 'post']);
            echo Form::label('name', 'Name', ['class' => 'awesome']);
            echo Form::text('name', null, array_merge(['class' => 'form-control']));
            echo "<span id='error_name'>".($errors->first('name') != null)?$errors->first('name'):""."</span>";
            echo "<br>";

            echo Form::label('description', 'Description', ['class' => 'awesome']);
            echo Form::text('description', null, array_merge(['class' => 'form-control']));
            echo "<span id='error_description'>".($errors->first('description') != null)?$errors->first('description'):""."</span>";
            echo "<br>";
            
            echo Form::label('price', 'Price', ['class' => 'awesome']);
            echo Form::text('price', null, array_merge(['class' => 'form-control']));
            echo "<span id='error_price'>".($errors->first('price') != null)?$errors->first('price'):""."</span>";
            echo "<br>";
            
            echo Form::label('cost', 'Cost', ['class' => 'awesome']);
            echo Form::text('cost', null, array_merge(['class' => 'form-control']));
            echo "<span id='error_cost'>".($errors->first('cost') != null)?$errors->first('cost'):""."</span>";
            echo "<br>";

            echo Form::submit('Save', ['class'=>'btn btn-primary']);
        echo Form::close();
        if(isset($errors)) print_r($errors->first('name'));
    @endphp
=======
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
    
>>>>>>> 1ec23a0576b22af7536651301fee05ca18a987f6
@endsection()