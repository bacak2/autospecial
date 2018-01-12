@extends('layouts.admin')

@section('content')
<div class="card-block">
    <h4 class="card-title">Lista opcji wyposażenia</h4>
  
    <a href="{{ route('opcjeWyposazenia.import') }}" class="btn btn-primary">Importuj</a>
    <a href="{{ route('opcjeWyposazenia.new') }}" class="btn btn-success">Dodaj nowy</a>
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
        <td>{{ $row->opcja_wyposazenia_code }}</td>
        <td>{{ $row->opcja_wyposazenia_decoded }} </td>
        <td><a href="{{ route('opcjeWyposazenia.edit', $row) }}" class="btn btn-info">Edytuj</a></td>
        <td>
            {!! Form::model($row, ['route' => ['opcjeWyposazenia.delete', $row], 'method' => 'DELETE']) !!}
            <button class="btn btn-danger">Usuń</button>
            {!! Form::close() !!}
        </td>
    </tr>    
    @endforeach
    </tbody>
</table>

    {{ $rows->links() }}
@endsection