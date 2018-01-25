@extends('layouts.admin')

@section('content')
<div class="card-block">
    <h4 class="card-title">Lista opcji wyposażenia</h4>
        {!! Form::open(['method' => 'POST', 'route' => ['opcjeWyposazenia.upload'], 'files'=>'true', 'class'=>'pull-left']) !!}
        {!! Form::label('importFile', 'Wybierz plik do importu') !!}
        {!! Form::file('importFile') !!}
        <button class="btn btn-primary pull-left">Zapisz</button>
        {!! Form::close() !!}        
</div>

<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th>Kod modelu samochodu (pierwsze trzy znaki)</th>
            <th class="col-lg-6"></th>
        </tr>
    </thead>
    <tbody>
    @foreach ($rows as $row)
    <tr>
        <td style="text-align: left">{{ $row->model_code3}} </td>
        <td class="col-lg-6"><a href="{{ route('opcjeWyposazenia.details', $row->model_code3) }}" class="btn btn-info pull-right">Szczegóły</a></td>
    </tr>    
    @endforeach
    </tbody>
</table>

@endsection