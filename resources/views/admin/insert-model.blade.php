@extends('layouts.admin')

@section('content')

{!! Form::open(['method' => 'GET', 'route' => ['modele.insert']]) !!}
<div class="form-group">
    
    {!! Form::label('model_code', 'Kod') !!}
    {!! Form::text('model_code', null, ['class'=>'form-control']) !!}
    
    @if ($errors->any())
        @foreach($errors->all() as $error)
            {{ $error }}
        @endforeach
    @endif
 
</div>

<div class="form-group">
    {!! Form::label('model_decoded', 'Nazwa') !!}
    {!! Form::textarea('model_decoded', null, ['class'=>'form-control']) !!}
</div>    

{!! Form::submit('Zapisz', ['class'=>'btn btn-primary']) !!}
{!! link_to(URL::previous(), 'Anuluj', ['class'=>'btn btn-default']) !!}

{!! Form::close() !!}
@endsection