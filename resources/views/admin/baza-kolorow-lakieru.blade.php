@extends('layouts.admin')

@section('content')
<div class="card-block">
    <h4 class="card-title">Lista kolorów lakieru</h4>
  
    <a href="{{ route('import.importVarnishColors') }}" class="btn btn-primary">Importuj</a>
    <a href="{{ route('new.VarnishColors') }}" class="btn btn-success">Dodaj nowy</a>
</div>

<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th>Kod</th>
            <th>Nazwa</th>
            <th>Edytuj</th>
            <th>Usuń</th>
        </tr>
    </thead>
    <tbody>
    @foreach ($rows as $row)
    <tr>
        <td>{{ $row->kolor_lakieru_code }}</td>
        <td>{{ $row->kolor_lakieru_decoded }} </td>
        <td><a href="{{ route('edit.VarnishColors', $row) }}" class="btn btn-info">Edytuj</a></td>
        <td>
            {!! Form::model($row, ['route' => ['delete.VarnishColors', $row], 'method' => 'DELETE']) !!}
            <button class="btn btn-danger">Usuń</button>
            {!! Form::close() !!}
        </td>
    </tr>    
    @endforeach
    </tbody>
</table>

    {{ $rows->links() }}
@endsection