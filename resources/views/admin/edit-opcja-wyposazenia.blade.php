@extends('layouts.admin')

@section('content')

{!! Form::model($item, ['route' => ['opcjeWyposazenia.update', $item], 'method' => 'PUT']) !!}
<div class="form-group">
    
    {!! Form::label('code', 'Kod') !!}
    {!! Form::text('code', $item->code, ['class'=>'form-control']) !!}

    @if ($errors->any())
        @foreach($errors->all() as $error)
            {{ $error }}
        @endforeach
    @endif
    
</div>

<div class="form-group">
    {!! Form::label('decoded', 'Nazwa') !!}
    {!! Form::textarea('decoded', $item->decoded, ['class'=>'form-control']) !!}
</div>    

{!! Form::submit('Zapisz', ['class'=>'btn btn-primary']) !!}
{!! link_to(URL::previous(), 'Anuluj', ['class'=>'btn btn-default']) !!}

{!! Form::close() !!}
@endsection