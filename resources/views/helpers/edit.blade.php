@extends('layouts.admin')

@section('content')

{!! Form::model(['route' => 'import.show'])!!}
<div class="form-group">
    
    {!! Form::label('kod', 'Kod') !!}
    {!! Form::text('kod', null, ['class'=>'form-control']) !!}
 
</div>

<div class="form-group">
    {!! Form::label('nazwa', 'Nazwa') !!}
    {!! Form::textarea('nazwa', null, ['class'=>'form-control']) !!}
</div>    

{!! Form::submit('Zapisz', ['class'=>'btn btn-primary']) !!}
{!! link_to(URL::previous(), 'Anuluj', ['class'=>'btn btn-default']) !!}

{!! Form::close() !!}
@endsection