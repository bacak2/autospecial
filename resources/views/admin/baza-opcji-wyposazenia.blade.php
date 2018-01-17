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
            <th>Dla</th>
            <th>Nazwa</th>
            <th>Edytuj</th>
            <th>Usuń</th>
        </tr>
    </thead>
    <tbody>
    @foreach ($rows as $row)
    <tr>
        <td>{{ $row->equipment_id }} </td>
        <td>{{ $row->model_id }}</td>
        <td>{{ $row->equipment_decoded }} </td>
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

    {{ $rows->links() }}
@endsection