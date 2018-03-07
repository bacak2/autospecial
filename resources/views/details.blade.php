@extends('layouts.front_2')

@section('content')
    <div class="row">
        
        <div class="col-sm-12">
            
            <div class="list-group">
 
                <div class="list-group-item list-group-item-action flex-column align-items-start item-margin-bottom">
                    <div class="item-img-div details-img-wrapper">
                        <img class="item-details-min-img" src="{{ asset('files/image/'.$item->model_code3.'_'.$item->kolor.'.jpg') }}" alt="">
                        @if (file_exists('files/image/'.$item->model_code3.'_'.$item->kolor.'.jpg'))
                            <span>Pojazd prezentowany na zdjęciu może różnić się od opisanego w zakresie wyposażenia.</span>
                        @endif
                    </div>
                    <div class="item-description details-description">
                        <ul>
                            <li><h3> {{ $item->model_decoded }} </h3></li>
                            <hr>
                            <li><b>Rok produkcji:</b> {{ $item->rok_modelowy }}</li>
                            <li><b>Kolor lakieru:</b> {{ $item->kolor_lakieru_decoded }}</li>
                            <li><b>Kolor tapicerki:</b> {{ $item->kolor_tapicerki_decoded }}</li>
                            <li><b>Komisja:</b> {{ $item->komisja }}</li>
                            <li><b>Cena:</b> {{ number_format($item->cena_dla_klienta,0,","," ") }} zł</li>
                        </ul>
                    </div>
                    
                <div class="col-md-1"></div>    
                <h2>Wyposażenie dodatkowe:</h2>               
                <div class="row">
                    <div class="col-md-2"></div> 

                    <ul class="col-md-10">
                        @foreach ($wyposazenieArray as $opcja)
                        <li> {{ $opcja }} </li>
                        @endforeach
                    </ul>
                    </div>  
                </div>
                
              
            </div>
        </div>
        
    </div>

    <div class="text-center item-margin-bottom">

            {!! link_to(URL::previous(), 'Powrót', ['class'=>'btn btn-default']) !!}

    </div>
@endsection

