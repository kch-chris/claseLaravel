@extends('layouts.app')

@section('content')
    <div class="col-12">
<<<<<<< HEAD
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
=======
        Edita un Producto
    </div>
    @php
    echo Form::open(['url' => 'products/'.$product->productsID ,'method' => 'put']);
        echo '<div class="row">';
            echo '<div class="col-10">';
                echo '<div class="card">';
                   echo '<div class="card-body">';
                    echo '<h4 class="card-title">Create Product</h4>';
                    echo '<div class="row">';
                            echo '<div class="col-6">';
                            echo Form::label('Name', null, ['class' => 'control-label']);
                            echo Form::text('name', $product->name, array_merge(['class' => 'form-control'], []));
                            echo "<span style='font-color:#F00;' id='errors_name'> ".($errors->first('name')!=null)?$errors->first('name'):""."</span>";
                        echo "</div>";
                    echo "</div>";
                    echo '<div class="row">';
                        echo '<div class="col-6">';
                            echo Form::label('Descripcion', null, ['class' => 'control-label']);
                            echo Form::text('description', $product->description, array_merge(['class' => 'form-control'], []));
                            echo "<span style='font-color:#F00;' id='errors_name'> ".($errors->first('description')!=null)?$errors->first('description'):""."</span>";
                        echo "</div>";
                    echo "</div>";
                    echo '<div class="row">';
                            echo '<div class="col-4">';
                                echo Form::label('Price', null, ['class' => 'control-label']);
                                echo Form::number('price',  $product->price, array_merge(['class' => 'form-control','step' => '0.1'], []));
                                echo "<span style='font-color:#F00;' id='errors_name'> ".($errors->first('price')!=null)?$errors->first('price'):""."</span>";
                        echo "</div>";
                    echo "</div>";

                    echo '<div class="row">';
                            echo '<div class="col-4">';
                            echo Form::label('Cost', null, ['class' => 'control-label']);
                            echo Form::number('cost',  $product->cost, array_merge(['class' => 'form-control','step' => '0.1'], []));
                            echo "<span style='font-color:#F00;' id='errors_name'> ".($errors->first('cost')!=null)?$errors->first('cost'):""."</span>";
                        echo "</div>";
                    echo "</div>";
                    echo "<div class='form-actions'>";
                        echo '<div class="text-right">';
                            echo '<a class="btn btn-secondary" href="'.route('products.index').'">Cancelar</a>'; 
                            echo '&nbsp;';
                            echo Form::submit('Guardar',['class'=>'btn btn-primary']);
                        echo "</div>";
                    echo "</div>";
                    echo '</div>';
                echo '</div>';
            echo '</div>';
        echo '</div>';
    echo Form::close();
>>>>>>> 1ec23a0576b22af7536651301fee05ca18a987f6
    @endphp
@endsection()