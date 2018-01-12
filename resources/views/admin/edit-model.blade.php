@extends('layouts.admin')

@section('content')

{!! Form::model($item, ['route' => ['modele.update', $item], 'method' => 'PUT']) !!}
<div class="form-group">
    
    {!! Form::label('model_code', 'Kod') !!}
    {!! Form::text('model_code', $item->model_code, ['class'=>'form-control']) !!}

    @if ($errors->any())
        @foreach($errors->all() as $error)
            {{ $error }}
        @endforeach
    @endif
    
</div>

<div class="form-group">
    {!! Form::label('model_decoded', 'Nazwa') !!}
    {!! Form::textarea('model_decoded', $item->model_decoded, ['class'=>'form-control']) !!}
</div>    

{!! Form::submit('Zapisz', ['class'=>'btn btn-primary']) !!}
{!! link_to(URL::previous(), 'Anuluj', ['class'=>'btn btn-default']) !!}

{!! Form::close() !!}
@endsection