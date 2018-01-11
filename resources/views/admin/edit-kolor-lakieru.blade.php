@extends('layouts.admin')

@section('content')

{!! Form::model($item, ['method' => 'PUT', 'route' => ['save.VarnishColors', $item]]) !!}
<div class="form-group">
    
    {!! Form::label('code', 'Kod') !!}
    {!! Form::text('code', $item->code, ['class'=>'form-control']) !!}
 
</div>

<div class="form-group">
    {!! Form::label('decoded', 'Nazwa') !!}
    {!! Form::textarea('decoded', $item->decoded, ['class'=>'form-control']) !!}
</div>    

{!! Form::submit('Zapisz', ['class'=>'btn btn-primary']) !!}
{!! link_to(URL::previous(), 'Anuluj', ['class'=>'btn btn-default']) !!}

{!! Form::close() !!}
@endsection