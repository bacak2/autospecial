@extends('layouts.admin')

@section('content')
<div class="card-block">
    <h2> Kod: {{ $item[0]->model_code3 }} </h2>
    <a href="{{ route('opcjeWyposazenia.new', $item[0]) }}" class="btn btn-success pull-left">Dodaj nowy</a>
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
    @foreach ($item as $row)
    <tr>
        <td><span class="pull-left">{{ $row->opcja_wyposazenia_code }}</span></td>
        <td><span class="pull-left">{{ $row->opcja_wyposazenia_decoded }}</span></td>
        <td><a href="{{ route('opcjeWyposazenia.edit', $row) }}" class="btn btn-info pull-left">Edytuj</a></td>
        <td>
            {!! Form::model($row, ['route' => ['opcjeWyposazenia.delete', $row], 'method' => 'DELETE']) !!}
            <button class="btn btn-danger pull-left">Usuń</button>
            {!! Form::close() !!}
        </td>
    </tr>    
    @endforeach
    </tbody>
</table>

    {{ $item->links() }} 
@endsection