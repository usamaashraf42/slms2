{{-- 
/**
 * Project:Muscat American Lyceum school.
 * User: SHAFQAT GHAFOOR
 * Phone: 03076110561
 * Date: 6/13/2019
 * Time: 12:30 PM
 */
 --}}
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

  <base href="{{ url('/')}}">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  @section('metas')
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  @show
  @stack('pre-styles')

  @section('styles')

  <link rel="icon" type="image/png" sizes="16x16" href="../../assets/images/favicon.png">
  <title> @yield('title','Muscat') - American Lyceum Group of School</title>
  
  <link href="css/bootstrap.css" rel="stylesheet" type="text/css">
  <link rel="icon" type="image/png" href="{{asset('web/pakistan/sitefiles/2532/css/images/favicon-16x16.png')}}" sizes="16x16" />
  <link rel="icon" type="image/png" href="{{asset('web/pakistan/sitefiles/2532/css/images/favicon-32x32.png')}}" sizes="32x32" />
  <link rel="icon" type="image/png" href="{{asset('web/pakistan/sitefiles/2532/css/images/favicon-96x96.png')}}" sizes="96x96" />
  <link rel="icon" type="image/png" href="{{asset('web/pakistan/sitefiles/2532/css/images/android-chrome-192x192.png')}}" sizes="192x192" /> 
  <!-- Icon fonts -->
  <link href="{{asset('web/muscat/fonts/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
  <link href="{{asset('web/muscat/fonts/flaticons/flaticon.css')}}" rel="stylesheet" type="text/css">
  <link href="{{asset('web/muscat/fonts/glyphicons/bootstrap-glyphicons.css')}}" rel="stylesheet" type="text/css">
  <!-- Google fonts -->
  <link href='https://fonts.googleapis.com/css?family=Lato:400,700,800' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Alegreya+Sans:700,900' rel='stylesheet' type='text/css'>
  <!-- Theme CSS -->
  <link href="{{asset('web/muscat/css/style.css')}}" rel="stylesheet">
  <!-- Color Style CSS -->
  <link href="{{asset('web/muscat/styles/funtime.css')}}" rel="stylesheet">
  <!-- Owl Slider & Prettyphoto -->
  <link rel="stylesheet" href="{{asset('web/muscat/css/owl.carousel.css')}}">
  <link rel="stylesheet" href="{{asset('web/muscat/css/prettyPhoto.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('web/muscat/styles/style_1.css')}}">
  <!-- LayerSlider stylesheet -->
  <link rel="stylesheet" href="{{asset('web/muscat/layerslider/css/layerslider.css')}}">
  <!-- Favicons-->
  <link rel="apple-touch-icon" sizes="72x72" href="{{asset('web/muscat//apple-touch-icon-72x72.png')}}">
  <link rel="apple-touch-icon" sizes="114x114" href="{{asset('web/muscat//apple-touch-icon-114x114.png')}}">
  <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
  <!-- Switcher Only -->
  <link rel="stylesheet" id="switcher-css" type="text/css" href="{{asset('web/muscat/switcher/css/switcher.css')}}" media="all" />
  <!--Alternate CSS -->
  <link rel="alternate stylesheet" type="text/css" href="{{asset('web/muscat/styles/funtime.css')}}" title="funtime" media="all" />
  <link rel="alternate stylesheet" type="text/css" href="{{asset('web/muscat/styles/playground.css')}}" title="playground" media="all" />
  <link rel="alternate stylesheet" type="text/css" href="{{asset('web/muscat/styles/games.css')}}" title="games" media="all" />
  <link rel="alternate stylesheet" type="text/css" href="{{asset('web/muscat/styles/childhood.css')}}" title="childhood" media="all" />
  <link rel="alternate stylesheet" type="text/css" href="{{asset('web/muscat/styles/school.css')}}" title="school" media="all" />
  <link rel="alternate stylesheet" type="text/css" href="{{asset('web/muscat/switcher/css/boxed.css')}}" title="boxed" media="all" />
  <link rel="alternate stylesheet" type="text/css" href="{{asset('web/muscat/switcher/css/full.css')}}" title="full" media="all" />

  @show

  @stack('post-styles')

  <script type="text/javascript">
    var BASE_URL = "{{ url('/')}}";
  </script>

</head>

<body id="page-top" data-spy="scroll" data-target=".navbar-custom">
  <div class="full">
    <div class="demo_changer">
      <div class="form_holder">
        @section('header-base')
        @include('_layouts.web.partials._header-base')
        @show
          @yield('content')
      
   
  @show

  @stack('pre-scripts')

  @section('scripts')

  <script src="{{asset('web/muscat/js/jquery.min.js')}}"></script>

  <script src="{{asset('web/muscat/js/bootstrap.min.js')}}"></script>
  <!-- Google maps -->

  <script src="https://maps.googleapis.com/maps/api/js?v=3"></script>
  <!-- Main Js -->

  <script src="{{asset('web/muscat/js/main.js')}}"></script>
  <!-- Isotope -->    

  <script src="{{asset('web/muscat/js/jquery.isotope.js')}}"></script>
  <!--Mail Chimp validator -->

  <script src="{{asset('web/muscat/js/mc-validate.js')}}"></script>
  <!--Other Plugins -->

  <script src="{{asset('web/muscat/js/plugins.js')}}"></script>
  <!-- Contact -->

  <script src="{{asset('web/muscat/js/contact.js')}}"></script>
  <!-- Prefix free CSS -->

  <script src="{{asset('web/muscat/js/prefixfree.js')}}"></script>        
  <!-- GreenSock -->

  <script src="{{asset('web/muscat/layerslider/js/greensock.js')}}" ></script>
  <!-- LayerSlider script files -->

  <script src="{{asset('web/muscat/layerslider/js/layerslider.transitions.js')}}" ></script>

  <script src="{{asset('web/muscat/layerslider/js/layerslider.kreaturamedia.jquery.js')}}" ></script>
  <!-- Swicther -->

  <script src="{{asset('web/muscat/switcher/js/dmss.js')}}"></script>
  <script type="text/javascript">
    $.ajaxSetup({
      headers: {
       'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
     }
   });



 </script>
 @show
 @stack('post-scripts')

</body>
</html>