@extends('layouts.app')

@section('content')
    @php
    echo Form::open(['route' => 'products.store','method' => 'post']);
        echo '<div class="row">';
            echo '<div class="col-10">';
                echo '<div class="card">';
                   echo '<div class="card-body">';
                    echo '<h4 class="card-title">Create Product</h4>';
                    echo '<div class="row">';
                            echo '<div class="col-6">';
                            echo Form::label('Name', null, ['class' => 'control-label']);
                            echo Form::text('name', null, array_merge(['class' => 'form-control'], []));
                            echo "<span style='font-color:#F00;' id='errors_name'> ".($errors->first('name')!=null)?$errors->first('name'):""."</span>";
                        echo "</div>";
                    echo "</div>";
                    echo '<div class="row">';
                        echo '<div class="col-6">';
                            echo Form::label('Descripcion', null, ['class' => 'control-label']);
                            echo Form::text('description', null, array_merge(['class' => 'form-control'], []));
                            echo "<span style='font-color:#F00;' id='errors_name'> ".($errors->first('description')!=null)?$errors->first('description'):""."</span>";
                        echo "</div>";
                    echo "</div>";
                    echo '<div class="row">';
                            echo '<div class="col-4">';
                                echo Form::label('Price', null, ['class' => 'control-label']);
                                echo Form::number('price',  null, array_merge(['class' => 'form-control','step' => '0.1'], []));
                                echo "<span style='font-color:#F00;' id='errors_name'> ".($errors->first('price')!=null)?$errors->first('price'):""."</span>";
                        echo "</div>";
                    echo "</div>";
                    echo '<div class="row">';
                            echo '<div class="col-4">';
                            echo Form::label('Cost', null, ['class' => 'control-label']);
                            echo Form::number('cost',  null, array_merge(['class' => 'form-control','step' => '0.1'], []));
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
    @endphp
@endsection()