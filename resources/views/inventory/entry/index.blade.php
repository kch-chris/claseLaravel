@extends('layouts.app',['title'=>'Entradas', 'partLink' =>'Index'])


@section('css')
<link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" rel="stylesheet">
{{-- <link href="{{ asset('assets/libs/datatables/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet"> --}}

@endsection

@section('content')
@include('alerts.confirm')

<div class="card">
    <div>
        {{-- @can('create products') --}}
        <div class="float-right" style="margin-right:10px; margin-top:10px;">
        <a href="{{ route('inventoryEntry.create') }}" class="btn btn-circle btn-primary"><i class="fas fa-plus"></i></a>
        </div>
        {{-- @endcan --}}
    </div>

    <div class="col-12" class="table-responsive">
        <table class="table table-striped table-bordered no-wrap" id="inventoryEntryTable" width="100%">
            <thead>
                <tr>
                    <th >Description</th>
                    <th> Fecha</th>
                    <th>Estatus </th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                
                @forelse ($entries as $entry)
                <tr>
                    <td>{{ $entry->description }}</td>
                    <td>{{ $entry->created_at }}</td>
                    <td>{{ $entry->estatus }}</td>
                    <td>

                    {{-- @can('edit products') --}}
                    <a href="{{ "inventoryEntry/".$entry->inventoryEntryID."" }}" class="btn btn-circle btn-primary">
                        <i class="fas fa-search"></i>
                    </a>
                    {{-- @endcan
                    @can('delete products') --}}
                    @if($entry->_get('estatus')==1)
                    <form action="{{ "inventoryEntry/".$entry->inventoryEntryID }}" method="post" id="delete{{ $entry->inventoryEntryID }}">   
                            <input type="hidden" name="_method" value="DELETE">
                            @csrf
                            <button type="submit" onclick="checkDelete(event,'delete{{ $entry->inventoryEntryID }}')" class="btn btn-circle btn-danger">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                        {{-- @endcan --}}
                    @endif
                    </td>
                </tr>        
                @empty
                    
                @endforelse
        
            </tbody>
        </table>

    </div>
</div>
@endsection

@section('js')
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="{{ url('/js/inventory/entry.js') }}"></script>
@endsection