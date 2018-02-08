@extends('layouts.admin')

@section('content')
<div class="card-block">
    <h2> Kod modelu samochodu: {{ $item->model }} </h2>
</div>
<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th>Kod</th>
            <th>Nazwa</th>
        </tr>
    </thead>
    <tbody>

    <tr>
@foreach ($wyposazenieArray as $key => $value)        
        <td>
            <span class="pull-left">
                @if ($value === NULL) <span style="color:red"> {{ $key }} </span>
                @else {{ $key}}
                @endif
            </span>
        </td> 
        <td><span class="pull-left">{{ $value }}</span></td>  
    </tr>    
@endforeach    
    </tbody>
</table>    

{!! link_to(URL::previous(), 'Powrót', ['class'=>'btn btn-default']) !!}

{!! Form::close() !!}

@endsection

