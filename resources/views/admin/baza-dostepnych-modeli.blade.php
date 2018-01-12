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
            <th>Kod</th>
            <th>Kolor</th>
            <th>Edytuj</th>
            <th>Usuń</th>
        </tr>
    </thead>
    <tbody>
        
    @foreach ($rows as $row)
    <tr>
{{ dd($row) }}
        <td>{{ $row->code }}</td>
        <td>{{ $row->decoded }} </td>
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