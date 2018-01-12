@extends('layouts.admin')

@section('content')
<div class="card-block">
    <h4 class="card-title">Baza dostępnych modeli</h4>
      <?php
         echo Form::open(array('url' => '/admin/baza-dostepnych-modeli/upload','files'=>'true'));
         echo 'Wybierz plik do zaimportowania';
         echo Form::file('importFile');
         echo Form::submit('Importuj plik');
         echo Form::close();
      ?>  

    <a href="{{ route('dostepneModele.import') }}" class="btn btn-primary">Importuj</a>
    <a href="{{ route('dostepneModele.new') }}" class="btn btn-success">Dodaj nowy</a>
</div>

<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th>Komisja</th>
            <th>Model</th>
            <th>Rok modelowy</th>
            <th>Kolor lakieru</th>
            <th>Kolor tapicerki</th>
            <th>Opcje wyposażenia</th>
            <th>Cena dla klienta</th>
            <th>Edytuj</th>
            <th>Usuń</th>
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
        <td>{{ $row->opcja_wyposazenia_decoded }} </td>
        <td>{{ $row->cena_dla_klienta }} </td>
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