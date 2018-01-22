@extends('layouts.admin')

@section('content')

{!! Form::model($item, ['route' => ['opcjeWyposazenia.update', $item], 'method' => 'PUT']) !!}
{!! Form::hidden('model_code3', $item->model_code3, ['class'=>'form-control']) !!}
<div class="form-group">
    
    {!! Form::label('opcja_wyposazenia_code', 'Kod') !!}
    {!! Form::text('opcja_wyposazenia_code', $item->opcja_wyposazenia_code, ['class'=>'form-control']) !!}

    @if ($errors->any())
        @foreach($errors->all() as $error)
            {{ $error }}
        @endforeach
    @endif
    
</div>

<div class="form-group">
    {!! Form::label('opcja_wyposazenia_decoded', 'Nazwa') !!}
    {!! Form::textarea('opcja_wyposazenia_decoded', $item->opcja_wyposazenia_decoded, ['class'=>'form-control']) !!}
</div>    

{!! Form::submit('Zapisz', ['class'=>'btn btn-primary']) !!}
{!! link_to(URL::previous(), 'Anuluj', ['class'=>'btn btn-default']) !!}

{!! Form::close() !!}
@endsection