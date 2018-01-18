@extends('layouts.admin')

@section('content')
<div class="card-block">
    <h4 class="card-title">Lista opcji wyposażenia</h4>
        {!! Form::open(['method' => 'POST', 'route' => ['opcjeWyposazenia.upload'], 'files'=>'true', 'class'=>'pull-right']) !!}
        {!! Form::label('importFile', 'Wybierz plik do importu') !!}
        {!! Form::file('importFile') !!}
        <button class="btn btn-primary pull-left">Zapisz</button>
        {!! Form::close() !!}        
    
    <a href="{{ route('opcjeWyposazenia.new') }}" class="btn btn-success pull-left">Dodaj nowy</a>
</div>

<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th>Kod</th>
            <th>Edytuj</th>
            <th>Usuń</th>
        </tr>
    </thead>
    <tbody>
    @foreach ($rows as $row)
    <tr>
        <td>{{ $row->model_code3}} </td>
        <td><a href="{{ route('opcjeWyposazenia.edit', $row->model_code3) }}" class="btn btn-info pull-left">Edytuj</a></td>
        <td>
            {!! Form::model($row, ['route' => ['opcjeWyposazenia.delete', $row->model_code3], 'method' => 'DELETE']) !!}
            <button class="btn btn-danger pull-left">Usuń</button>
            {!! Form::close() !!}
        </td>
    </tr>    
    @endforeach
    </tbody>
</table>

    {{ $rows->links() }}
@endsection