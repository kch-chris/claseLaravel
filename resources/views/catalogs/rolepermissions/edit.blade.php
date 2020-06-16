@extends('layouts.app')

@section('content')
    <div class="col-12">
        Edit Permission
    </div>

    @php
        echo Form::open(['url' => 'rolepermissions/'.$role->id , 'method' => 'put']);
            echo Form::label('name', 'Name', ['class' => 'awesome']);
            echo Form::text('name', $role->name, array_merge(['class' => 'form-control','readonly'=> true]));
    @endphp
      <!-- -----------------Tab de catalogos --------------------------->
      <div id="permitsCat" class="tab-pane" role="tabpanel" aria-labelledby="info-tab">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nombre Permiso</th>
                    <th>Agregar</th>
                </tr>
            </thead>
            <tbody>
               @foreach($permissions as $permission)
                <tr>
                    <td>{{$permission->NombrePermiso}}</td>
                    <td><input type="checkbox" name="permissions[{{$permission->NombrePermiso}}]" ></td>
                </tr>
                @endforeach
                
            </tbody>
        </table>
    </div>
    @php
            echo Form::submit('Save', ['class'=>'btn btn-primary']);
        echo Form::close();
    @endphp
@endsection()