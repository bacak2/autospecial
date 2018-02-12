<!doctype html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Auto Special - samochody dostępne od ręki</title>
	<meta name="description" content="">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.css') }}">
	<!--link rel="stylesheet" type="text/css" href="{{ asset('css/font-awesome.css') }}"-->
	<link rel="stylesheet" type="text/css" href="{{ asset('css/slider.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/myStyle.css') }}">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">        
</head>
<body>
<!-- Header -->
<div class="allcontain">
	<!-- Navbar Up -->
	<nav class="topnavbar navbar-default topnav">
		<div class="navbar-collapse" id="upmenu">
			<ul class="nav navbar-nav" id="navbarontop">
                            <li class=""><a href="{{ route('home') }}"><h4><b>Auto Special</b></h4></a></li>
			</ul> 
                        <ul class="nav navbar-nav navbar-to-right navbar-socials" >    
                            <li><a href="https://www.facebook.com/salon.autospecial/" target="_blank"><img src="{{ asset('files/layout/facebook_grey_min.png') }}"></a></li>
                            <li><a href="https://plus.google.com/112716665297207492257" target="_blank"><img src="{{ asset('files/layout/google_grey_min.png') }}"></a></li>
                            <li><a href="https://www.youtube.com/channel/UCNeH4Ss-90X2DR0egrOgdQg" target="_blank"><img src="{{ asset('files/layout/youtube_grey_min2.png') }}"></a></li>
			</ul>                    
			<ul class="nav navbar-nav navbar-to-right" >
                            <li class="active"><a href="http://autospecial.pl">Strona główna</a></li>
                            <li class="active"><a href="http://autospecial.pl/salon-vw-krakow/o-firmie">O nas</a></li>
                            <li class="active"><a href="http://autospecial.pl/salon-vw-krakow/kontakt">Kontakt</a></li>
                        </ul>

		</div>
            




	</nav>
</div>
<!--_______________________________________ Carousel__________________________________ -->
<div class="allcontain item-margin-bottom">
	<div id="carousel-up" class="carousel slide" data-ride="carousel">
		<div class="carousel-inner " role="listbox">
			<div class="item active">
				<img src="{{ asset('files/slajder_strona_glowna/2_slajder_strona_glowna.jpg') }}" alt="">
			</div>
			<!--div class="item">
				<img src="{{ asset('files/slajder_strona_glowna/1_slajder_strona_glowna.jpg') }}" alt="">
			</div>
			<div class="item">
				<img src="{{ asset('files/slajder_strona_glowna/3_slajder_strona_glowna.jpg') }}" alt="">
			</div-->
		</div>
	</div>
</div>

<!-- ____________________Featured Section ______________________________--> 
<div class="allcontain">
    
@yield('content')

<!-- ____________________Bottom Menu ______________________________-->     
        <div class="bottommenu">
            <div class="footer">
				<div class="copyright">
				  &copy; Copyright 2018
				</div>
				<div class="atisda">
					 Utworzone przez ArtPlus
				</div>
            </div>
	</div>
</div>
<script src="{{ asset('js/jquery.js') }}"></script>
<script src="{{ asset('js/isotope.js') }}"></script>
<script src="{{ asset('js/myscript.js') }}"></script>
<script src="{{ asset('js/jquery.1.11.js') }}"></script>
<script src="{{ asset('js/bootstrap.js') }}"></script>
<!-- Piwik -->
<script type="text/javascript">
  var _paq = _paq || [];
  /* tracker methods like "setCustomDimension" should be called before "trackPageView" */
  _paq.push(['trackPageView']);
  _paq.push(['enableLinkTracking']);
  (function() {
    var u="//piwik.autospecial.pl/";
    _paq.push(['setTrackerUrl', u+'piwik.php']);
    _paq.push(['setSiteId', '2']);
    var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0];
    g.type='text/javascript'; g.async=true; g.defer=true; g.src=u+'piwik.js'; s.parentNode.insertBefore(g,s);
  })();
</script>
<!-- End Piwik Code -->
</body>
</html>