@extends('layouts.admin')

@section('content')

{!! Form::open(['method' => 'GET', 'route' => ['dostepneModele.insert']]) !!}
<div class='row'>

    <div class='col-sm-2'>
        <div class="form-group">

            {!! Form::label('model_code', 'Kod') !!}
            {!! Form::text('model_code', null, ['class'=>'form-control']) !!}

        </div>
    </div>
    <div class='col-sm-10'>
        <div class="form-group">
            {!! Form::label('model_decoded', 'Model') !!}
            {!! Form::text('model_decoded', null, ['class'=>'form-control']) !!}
        </div>  
    </div>
    @if ($errors->has('model_code'))
        <div class="error">{{ $errors->first('model_code') }}</div>
    @endif
</div>
<div class='row'>
    <div class='col-sm-2'>
        <div class="form-group">

            {!! Form::label('kolor_lakieru_code', 'Kod') !!}
            {!! Form::text('kolor_lakieru_code', null, ['class'=>'form-control']) !!}

        </div>
    </div>
    <div class='col-sm-10'>
        <div class="form-group">
            {!! Form::label('kolor_lakieru_decoded', 'Kolor lakieru') !!}
            {!! Form::text('kolor_lakieru_decoded', null, ['class'=>'form-control']) !!}
        </div>  
    </div>
    @if ($errors->has('kolor_lakieru_code'))
        <div class="error">{{ $errors->first('kolor_lakieru_code') }}</div>
    @endif    
</div>
<div class='row'>
    <div class='col-sm-2'>
        <div class="form-group">

            {!! Form::label('kolor_tapicerki_code', 'Kod') !!}
            {!! Form::text('kolor_tapicerki_code', null, ['class'=>'form-control']) !!}

        </div>
    </div>
    <div class='col-sm-10'>
        <div class="form-group">
            {!! Form::label('kolor_tapicerki_decoded', 'Kolor tapicerki') !!}
            {!! Form::text('kolor_tapicerki_decoded', null, ['class'=>'form-control']) !!}
        </div>  
    </div>
    @if ($errors->has('kolor_tapicerki_code'))
        <div class="error">{{ $errors->first('kolor_tapicerki_code') }}</div>
    @endif
</div>
<div class='row'>
    <div class='col-sm-2'>
        <div class="form-group">

            {!! Form::label('opcja_wyposazenia_code', 'Kod') !!}
            {!! Form::text('opcja_wyposazenia_code', null, ['class'=>'form-control']) !!}

        </div>
    </div>
    <div class='col-sm-10'>
        <div class="form-group">
            {!! Form::label('opcja_wyposazenia_decoded', 'Opcje wyposażenia') !!}
            {!! Form::text('opcja_wyposazenia_decoded', null, ['class'=>'form-control']) !!}
        </div>  
    </div>
    @if ($errors->has('opcja_wyposazenia_code'))
        <div class="error">{{ $errors->first('opcja_wyposazenia_code') }}</div>
    @endif
</div>
{!! Form::submit('Zapisz', ['class'=>'btn btn-primary']) !!}
{!! link_to(URL::previous(), 'Anuluj', ['class'=>'btn btn-default']) !!}

{!! Form::close() !!}

@endsection

