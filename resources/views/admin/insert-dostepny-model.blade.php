@extends('layouts.admin')

@section('content')

{!! Form::open(['method' => 'GET', 'route' => ['dostepneModele.insert']]) !!}
<div class='row'>

    <div class='col-sm-12'>
        <div class="form-group">

            {!! Form::label('model_code', 'Model') !!}
            {!! Form::select('model_code', $models, null ) !!}

        </div>
    </div>
</div>

<div class='row'>

    <div class='col-sm-12'>
        <div class="form-group">

            {!! Form::label('kolor_lakieru_code', 'Kolor lakieru') !!}
            {!! Form::select('kolor_lakieru_code', $lcolors, null ) !!}

        </div>
    </div>
</div>

<div class='row'>

    <div class='col-sm-12'>
        <div class="form-group">

            {!! Form::label('kolor_tapicerki_code', 'Kolor tapicerki') !!}
            {!! Form::select('kolor_tapicerki_code', $tcolors, null ) !!}

        </div>
    </div>
</div>

<div class='row'>

    <div class='col-sm-12'>
        <div class="form-group">

            {!! Form::label('opcja_wyposazenia_code', 'Opcje wyposażenia') !!}
            {!! Form::select('opcja_wyposazenia_code', $equipments, null ) !!}

        </div>
    </div>
</div>

{!! Form::submit('Zapisz', ['class'=>'btn btn-primary']) !!}
{!! link_to(URL::previous(), 'Anuluj', ['class'=>'btn btn-default']) !!}

{!! Form::close() !!}

@endsection

