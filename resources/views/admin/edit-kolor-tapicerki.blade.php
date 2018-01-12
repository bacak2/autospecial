@extends('layouts.admin')

@section('content')

{!! Form::model($item, ['route' => ['koloryTapicerki.update', $item], 'method' => 'PUT']) !!}
<div class="form-group">
    
    {!! Form::label('kolor_tapicerki_code', 'Kod') !!}
    {!! Form::text('kolor_tapicerki_code', $item->kolor_tapicerki_code, ['class'=>'form-control']) !!}

    @if ($errors->any())
        @foreach($errors->all() as $error)
            {{ $error }}
        @endforeach
    @endif
    
</div>

<div class="form-group">
    {!! Form::label('kolor_tapicerki_decoded', 'Nazwa') !!}
    {!! Form::textarea('kolor_tapicerki_decoded', $item->kolor_tapicerki_decoded, ['class'=>'form-control']) !!}
</div>    

{!! Form::submit('Zapisz', ['class'=>'btn btn-primary']) !!}
{!! link_to(URL::previous(), 'Anuluj', ['class'=>'btn btn-default']) !!}

{!! Form::close() !!}
@endsection