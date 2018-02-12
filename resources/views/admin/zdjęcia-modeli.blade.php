@extends('layouts.admin')

@section('content')
<div class="card-block">
    <h4 class="card-title">Dodaj zdjęcie</h4>
        {!! Form::open(['method' => 'POST', 'route' => ['import.uploadPictrue'], 'files'=>'true', 'class'=>'pull-left']) !!}
        {!! Form::label('importFile', 'Wybierz plik do importu') !!}
        {!! Form::file('importFile') !!}
        <button class="btn btn-primary pull-left">Zapisz</button>
        {!! Form::close() !!} 
        
@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif

</div>
@endsection