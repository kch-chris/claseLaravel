@extends('layouts.app')

@section('content')
    <div class="col-12">
        Edit Permission
    </div>

    @php
        echo Form::open(['url' => 'users/'.$user->id.'/updatePermissions', 'method' => 'put']);
            echo Form::label('name', 'Name', ['class' => 'awesome']);
            echo Form::text('name', $user->name, array_merge(['class' => 'form-control','readonly'=> true]));
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
                    <td>{{$permission->name}}</td>
                    <td><input type="checkbox" name="permissions[{{$permission->name}}]" {{ (count($usPermission->where('name',$permission->name))>0) ? 'checked' : '' }} >
                    </td>
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