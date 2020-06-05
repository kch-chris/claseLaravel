@extends('layouts.app')


@section('content')
   


    <div>
        <h2>Clients</h2>
        <div class="float-right">
        @can('create clients')
        <a href="{{ route('clients.create') }}" class="btn btn-circle btn-primary"><i class="fas fa-plus"></i></a>
        @endcan
        </div>
    </div>

    <div class="col-8">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th >Name</th>
                        <th >Last Name</th>
                        <th >Email</th>
                        <th >Phone</th>
                        <th >Age</th>
                        <th >Sex</th>
                        <th >Credit</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    
                    @forelse ($clients as $client)
                    <tr>
                        <td>{{ $client->name }}</td>
                        <td>{{ $client->lastname }}</td>
                        <td>{{ $client->email }}</td>
                        <td>{{ $client->phone }}</td>
                        <td>{{ $client->age }}</td>
                        <td>{{ $client->sex }}</td>
                        <td>{{ $client->credit }}</td>
                        <td>
                            @can('edit clients')
                            <a href="{{ "clients/".$client->clientsID."/edit" }}" class="btn btn-circle btn-success"><i class="fas fa-pencil-alt"></i></a>
                            @endcan
                            @can('delete clients')
                            <form action="{{ "clients/".$client->clientsID }}" method="post">
                                <input type="hidden" name="_method" value="DELETE">
                                @csrf
                                <button type="submit" class="btn btn-circle btn-danger"><i class="fas fa-trash"></i></button>
                            </form>
                            @endcan
                        </td>
                    </tr>        
                    @empty
                        <p>No clients</p>
                    @endforelse
            
        </tbody>
        </table>

    </div>

@endsection