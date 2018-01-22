@extends('layouts.admin')

@section('content')
{!! Form::open(['method' => 'GET', 'route' => ['opcjeWyposazenia.insert']]) !!}
{!! Form::hidden('model_code3', $item->model_code3, ['class'=>'form-control']) !!}
<div class="form-group">
    
    {!! Form::label('opcja_wyposazenia_code', 'Kod') !!}
    {!! Form::text('opcja_wyposazenia_code', null, ['class'=>'form-control']) !!}

    @if ($errors->any())
        @foreach($errors->all() as $error)
            {{ $error }}
        @endforeach
    @endif
    
</div>

<div class="form-group">
    {!! Form::label('opcja_wyposazenia_decoded', 'Nazwa') !!}
    {!! Form::textarea('opcja_wyposazenia_decoded', null, ['class'=>'form-control']) !!}
</div>    

{!! Form::submit('Zapisz', ['class'=>'btn btn-primary']) !!}
{!! link_to(URL::previous(), 'Anuluj', ['class'=>'btn btn-default']) !!}

{!! Form::close() !!}
@endsection