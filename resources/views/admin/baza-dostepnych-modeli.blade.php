@extends('layouts.admin')

@section('content')
<div class="card-block">
    <h4 class="card-title">Baza dostępnych modeli</h4>
  
    <a href="{{ route('dostepneModele.import') }}" class="btn btn-primary">Importuj</a>
    <a href="{{ route('dostepneModele.new') }}" class="btn btn-success">Dodaj nowy</a>
</div>

<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th>Id</th>
            <th>Model</th>
            <th>Kolor lakieru</th>
            <th>Kolor tapicerki</th>
            <th>Opcje wyposażenia</th>
            <th>Edytuj</th>
            <th>Usuń</th>
        </tr>
    </thead>
    <tbody>
        
    @foreach ($rows as $row)
    <tr>
        <td>{{ $row->id }}</td>
        <td>{{ $row->model_decoded }} </td>
        <td>{{ $row->kolor_lakieru_decoded }} </td>
        <td>{{ $row->kolor_tapicerki_decoded }} </td>
        <td>{{ $row->opcja_wyposazenia_decoded }} </td>
        <td><a href="{{ route('dostepneModele.edit', $row) }}" class="btn btn-info">Edytuj</a></td>
        <td>
            {!! Form::model($row, ['route' => ['dostepneModele.delete', $row], 'method' => 'DELETE']) !!}
            <button class="btn btn-danger">Usuń</button>
            {!! Form::close() !!}
        </td>
    </tr>    
    @endforeach
    </tbody>
</table>

    {{ $rows->links() }}
@endsection