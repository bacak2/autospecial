@extends('layouts.admin')

@section('content')
<div class="card-block">
    <h4 class="card-title">Baza dostępnych modeli</h4>
        {!! Form::open(['method' => 'POST', 'route' => ['dostepneModele.upload'], 'files'=>'true', 'class'=>'pull-left']) !!}
        {!! Form::label('importFile', 'Wybierz plik do importu') !!}
        {!! Form::file('importFile') !!}
        <button class="btn btn-primary pull-left">Zapisz</button>
        {!! Form::close() !!}
</div>

<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th>Komisja</th>
            <th>Model</th>
            <th>Rok modelowy</th>
            <th>Kolor lakieru</th>
            <th>Kolor tapicerki</th>
            <th>Cena dla klienta</th>
            <!--h>Edytuj</th>
            <th>Usuń</th-->
        </tr>
    </thead>
    <tbody>
        
    @foreach ($rows as $row)
    <tr>
        <td>{{ $row->komisja }}</td>
        <td>{{ $row->model_decoded }} </td>
        <td>{{ $row->rok_modelowy }} </td>
        <td>{{ $row->kolor_lakieru_decoded }} </td>
        <td>{{ $row->kolor_tapicerki_decoded }} </td>
        <td>{{ $row->cena_dla_klienta }} </td>
        <!--td><a href="{{ route('dostepneModele.edit', $row) }}" class="btn btn-info">Edytuj</a></td>
        <td>
            {!! Form::model($row, ['route' => ['dostepneModele.delete', $row], 'method' => 'DELETE']) !!}
            <button class="btn btn-danger">Usuń</button>
            {!! Form::close() !!}
        </td-->
    </tr>    
    @endforeach
    </tbody>
</table>

    {{ $rows->links() }}
@endsection