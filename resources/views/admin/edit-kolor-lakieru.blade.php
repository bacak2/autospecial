@extends('layouts.admin')

@section('content')

{!! Form::model($item, ['route' => ['koloryTapicerki.update', $item], 'method' => 'PUT']) !!}
<div class="form-group">
    
    {!! Form::label('kolor_lakieru_code', 'Kod') !!}
    {!! Form::text('kolor_lakieru_code', $item->kolor_lakieru_code, ['class'=>'form-control']) !!}

    @if ($errors->any())
        @foreach($errors->all() as $error)
            {{ $error }}
        @endforeach
    @endif
    
</div>

<div class="form-group">
    {!! Form::label('kolor_lakieru_decoded', 'Nazwa') !!}
    {!! Form::textarea('kolor_lakieru_decoded', $item->kolor_lakieru_decoded, ['class'=>'form-control']) !!}
</div>    

{!! Form::submit('Zapisz', ['class'=>'btn btn-primary']) !!}
{!! link_to(URL::previous(), 'Anuluj', ['class'=>'btn btn-default']) !!}

{!! Form::close() !!}
@endsection