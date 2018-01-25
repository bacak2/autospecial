@extends('layouts.admin')

@section('content')
<div class="card-block">
    <h4 class="card-title">Baza modeli</h4>
        <!--{!! Form::open(['method' => 'POST', 'route' => ['modele.upload'], 'files'=>'true', 'class'=>'pull-right']) !!}
        {!! Form::label('importFile', 'Wybierz plik do importu') !!}
        {!! Form::file('importFile') !!}
        <button class="btn btn-primary pull-left">Zapisz</button>
        {!! Form::close() !!}  
        -->
    <a href="{{ route('modele.new') }}" class="btn btn-success pull-left">Dodaj nowy</a>
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
        <td><span class="pull-left">{{ $row->model_code }}</span></td>
        <td><span class="pull-left">{{ $row->model_decoded }}</span></td>
        <td><a href="{{ route('modele.edit', $row) }}" class="btn btn-info">Edytuj</a></td>
        <td>
            {!! Form::model($row, ['route' => ['modele.delete', $row], 'method' => 'DELETE']) !!}
            <button class="btn btn-danger">Usuń</button>
            {!! Form::close() !!}
        </td>
    </tr>    
    @endforeach
    </tbody>
</table>

    {{ $rows->links() }}
@endsection