@extends('layouts.app')


@section('content')
   


    <div>
        <h2>Role Has Permissions</h2>
        <div class="float-right">
        <a href="{{ route('rolepermissions.create') }}" class="btn btn-circle btn-primary"><i class="fas fa-plus"></i></a>
        </div>
    </div>

    <div class="col-8">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Role</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    
                    @forelse ($roles as $role)
                    <tr>
                        <td>{{ $role->name }}</td>
                        <td>
                            <a href="{{ "rolepermissions/".$role->id."/edit" }}" class="btn btn-circle btn-success"><i class="fas fa-pencil-alt"></i></a>
                            <form action="{{ "rolepermissions/".$role->id }}" method="post">
                                <input type="hidden" name="_method" value="DELETE">
                                @csrf
                                <button type="submit" class="btn btn-circle btn-danger"><i class="fas fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>        
                    @empty
                        <p>No Permissions</p>
                    @endforelse
            
        </tbody>
        </table>

    </div>

@endsection