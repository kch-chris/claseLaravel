@extends('layouts.app')


@section('content')
   


    <div>
        <h2>Roles</h2>
        <div class="float-right">
        <a href="{{ route('users.create') }}" class="btn btn-circle btn-primary"><i class="fas fa-plus"></i></a>
        </div>
    </div>

    <div class="col-8">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th >Nombre</th>
                        <th >Email</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    
                    @forelse ($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            <a href="{{ "users/".$user->id."/edit" }}" class="btn btn-circle btn-success">
                                <i class="fas fa-pencil-alt"></i>
                            </a>
                            <form action="{{ "users/".$user->id }}" method="post">
                                <input type="hidden" name="_method" value="DELETE">
                                @csrf
                                <button type="submit" class="btn btn-circle btn-danger"><i class="fas fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>        
                    @empty
                        <p>No Users</p>
                    @endforelse
            
        </tbody>
        </table>

    </div>

@endsection