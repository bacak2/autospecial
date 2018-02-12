@extends('layouts.front')

@section('content')

<div class="row">
        <div id="filters" class="col-sm-4 ">
            <div class="list-group-item">
                <h2>Znajdź samochód</h2>
                <form>
                    <div class="form-group" style="float:left">
                        <label for="model">Model</label><br>
                        {!! Form::select('model', $models, null ) !!}
                    </div>
                    <!--div class="form-group">
                        <label for="color">Kolor lakieru</label>
                        {!! Form::select('color', $colors, null ) !!}
                    </div-->
                    <br>
                    <div class="text-center item-margin-bottom">
                        <button type="submit" class="btn ">Filtruj</button>
                    </div> 
                    <br><br>
                    <hr>
                    <div class="contact-in-filters">
                        <b>Salon Volkswagen Kraków</b><br>
                        Auto Special Sp. z o.o. w Krakowie<br>
                        Modlniczka, ul. Prof. Adama Rożańskiego 28-30<br>
                        32-085 Modlnica k/Krakowa
                    </div>

                    <hr>

                    <div class="contact-in-filters">
                        <b>Godziny otwarcia:</b><br>
                        Poniedziałek-piątek 9.00-19.00<br>
                        Sobota 9.00-14.00<br>
                        Tel.: 12 639 20 00,<br>
                        Fax.: 12 639 20 59<br>
                        E-mail: <a href="mailto:vw@autospecial.com.pl">vw@autospecial.com.pl</a>
                    </div>
                    
                    <hr>

                    <div class="contact-in-filters">
                        <b>Ewa Stanecka</b><br>
                        Dział Sprzedaży Samochodów<br>
                        Kierownik<br>
                        Tel. 784 055 961<br>
                        Tel. 12 639 20 12<br>
                        E-mail: <a href="mailto:ewa.stanecka@autospecial.com.pl">ewa.stanecka@autospecial.com.pl</a>
                    </div>
                    
                    <hr>

                    <div class="contact-in-filters">
                        <b> Maciej Tarnawski</b><br>
                        Dział Sprzedaży Samochodów<br>
                        Specjalista<br>
                        Tel. 784 998 473<br>
                        Tel. 12 639 20 25<br>
                        E-mail: <a href="mailto:maciej.tarnawski@autospecial.com.pl">maciej.tarnawski@autospecial.com.pl</a>
                    </div> 
                    
                    <hr>

                    <div class="contact-in-filters">
                        <b>Damian Podobiński</b><br>
                        Dział Sprzedaży Samochodów<br>
                        Specjalista<br>
                        Tel. 668 673 769<br>
                        Tel. 12 639 20 14<br>
                        E-mail: <a href="mailto:damian.podobinski@autospecial.com.pl">damian.podobinski@autospecial.com.pl</a>
                    </div>  
                    
                    <hr>

                    <div class="contact-in-filters">
                        <b>Krzysztof Gaik</b><br>
                        Dział Sprzedaży Samochodów<br>
                        Specjalista<br>
                        Tel. 668 672 868<br>
                        Tel. 12 639 20 18<br>
                        E-mail: <a href="mailto:krzysztof.gaik@autospecial.com.pl">krzysztof.gaik@autospecial.com.pl</a>
                    </div> 
                    
                    <hr>

                    <div class="contact-in-filters">
                        <b>Rafał Figuła</b><br>
                        Dział Sprzedaży Samochodów<br>
                        Specjalista ds. Sprzedaży Flotowej<br>
                        Tel. 668 673 284<br>
                        Tel. 12 639 20 90<br>
                        E-mail: <a href="mailto:rafal.figula@autospecial.com.pl">rafal.figula@autospecial.com.pl</a>
                    </div> 
                    
                    <hr>

                    <div class="contact-in-filters">
                        <b>Paweł Książek</b><br>
                        Tel. 785 850 380<br>
                        E-mail: <a href="mailto:pawel.ksiazek@autospecial.com.pl">pawel.ksiazek@autospecial.com.pl</a>
                    </div> 
                    
                    <hr>

                    <div class="contact-in-filters">
                        <b>Bartłomiej Natkaniec</b><br>
                        Tel. 785 850 378<br>
                        E-mail: <a href="mailto:bartlomiej.natkaniec@autospecial.com.pl">bartlomiej.natkaniec@autospecial.com.pl</a>
                    </div> 
                    
                    <hr>

                    <div class="contact-in-filters">
                        <b>Agata Gacka</b><br>
                        Tel. 785 850 382<br>
                        E-mail: <a href="mailto:agata.gacka@autospecial.com.pl">agata.gacka@autospecial.com.pl</a>
                    </div>                     
            </div>
        </div>

        <div class="col-sm-8">
        @if ($total == 0)
            <h2> Nie znaleziono samochodów </h2>
        @else
            <div class="list-group">
                <div class="list-group-item list-group-item-action flex-column align-items-start item-margin-bottom">
                    <select name="sortuj" class="pull-right" onchange="this.form.submit()">
                        <option value="0">Sortuj według</option>
                        <option value="priceAsc">Cena rosnąco</option>
                        <option value="priceDesc">Cena malejąco</option>
                        <option value="nameAsc">Nazwa A-Z</option>
                        <option value="nameDesc">Nazwa Z-A</option>
                    </select> 
                </form>
                    <h2>Wyniki wyszukiwania</h2>
                </div>
                
                @foreach ($rows as $row)
                <div class="list-group-item list-group-item-action flex-column align-items-start item-margin-bottom">
                    <div class="item-img-div img-wrapper">
                        <a href="{{ route('home.details', $row) }}"><img class="item-min-img" 
                                 @if (file_exists('files/image/'.$row->model_code3.'_'.$row->kolor.'.jpg')) src="{{ asset('files/image/'.$row->model_code3.'_'.$row->kolor.'.jpg') }}" alt="">
                                 @else src="{{ asset('files/image/brak_zdjęcia.jpg') }}" alt="">
                                 @endif
                        </a></div>
                    <div class="item-description">
                        <ul>
                            <li><h3> {{ $row->model_decoded }} </h3></li>
                            <hr>
                            <li><b>Rok produkcji:</b> {{ $row->rok_modelowy }}</li>
                            <li><b>Kolor lakieru:</b> {{ $row->kolor_lakieru_decoded }}</li>
                            <li><b>Kolor tapicerki:</b> {{ $row->kolor_tapicerki_decoded }}</li>
                            <li><b>Komisja:</b> {{ $row->komisja }}</li>
                            <li><b>Cena:</b> {{ number_format($row->cena_dla_klienta,0,","," ") }} zł</li>
                        </ul>
                    </div>
                    <!--div class="col-md-1"></div-->
                    <a href="{{ route('home.details', $row) }}" class="btn btn-default">Więcej...</a>
                </div>
                @endforeach    
                
            </div>
        @endif        
        </div>
        <div class="text-center item-margin-bottom">

            {{ $rows->appends(['model' => $filters->model, 'color' => $filters->color, 'sortuj' => $filters->sortuj])->links() }}

        </div>        
    </div> 
@endsection