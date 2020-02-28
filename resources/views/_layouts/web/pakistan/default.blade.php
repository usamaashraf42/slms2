{{-- 
/**
 * Project:Pakistan American Lyceum school.
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
  <link rel="stylesheet" type="text/css" href="">
  <title> @yield('title','Pakistan') - American Lyceum Group of School</title>
  <link href="{{asset('web/muscat/fonts/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
  <script type="text/javascript" src="{{asset('web/pakistan/javascripts/swfobject.js')}}"></script>
  <script type="text/javascript" src="{{asset('web/pakistan/sitefiles/global/js/jquery/1.4.2/jquery.min.js')}}"></script>
  <script type="text/javascript">
    jQ142 = $.noConflict(true);
  </script>
  <script type="text/javascript" src="{{asset('web/pakistan/sitefiles/global/js/jquery/1.7.1/jquery.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('web/pakistan/sitefiles/global/js/jqueryui/1.8.19/jquery-ui.min.js')}}"></script>
  <script type="text/javascript">
    jQ171 = $.noConflict(true);
    jQuery = $ = jQ142;
  </script>
  <script type="text/javascript" src="{{asset('web/pakistan/sitefiles/global/js/jqueryui/1.8.18/jquery-ui.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('web/pakistan/javascripts/jquery-extensions.js')}}"></script>
  <script type="text/javascript" src="{{asset('web/pakistan/javascripts/base-minaab2.js?v=022615')}}"></script>
  <script type="text/javascript" src="{{asset('web/pakistan/javascripts/application4576.js?v=20180806')}}"></script>
  <link rel="icon" type="image/png" href="{{asset('web/pakistan/sitefiles/2532/css/images/favicon-16x16.png')}}" sizes="16x16" />
  <link rel="icon" type="image/png" href="{{asset('web/pakistan/sitefiles/2532/css/images/favicon-32x32.png')}}" sizes="32x32" />
  <link rel="icon" type="image/png" href="{{asset('web/pakistan/sitefiles/2532/css/images/favicon-32x32.png')}}" sizes="96x96" />
  <link rel="icon" type="image/png" href="{{asset('web/pakistan/sitefiles/2532/css/images/favicon-32x32.png')}}" sizes="192x192" /> 
  <noscript id="deferred-styles">
    <link href="https://fonts.googleapis.com/css?family=Noto+Serif:400,400i,700|Open+Sans+Condensed:700|Open+Sans:400,700" rel="stylesheet" />
  </noscript>
  <script type="text/javascript">
        var loadDeferredStyles = function() {
          var addStylesNode = document.getElementById("deferred-styles");
          var replacement = document.createElement("div");
          replacement.innerHTML = addStylesNode.textContent;
          document.body.appendChild(replacement)
          addStylesNode.parentElement.removeChild(addStylesNode);
        };
        var raf = window.requestAnimationFrame || window.mozRequestAnimationFrame ||
        window.webkitRequestAnimationFrame || window.msRequestAnimationFrame;
        if (raf) raf(function() { window.setTimeout(loadDeferredStyles, 0); });
        else window.addEventListener('load', loadDeferredStyles);
      </script>
      <link href="{{asset('web/pakistan/sitefiles/2532/css/mastere7c7.css?cache=0015646')}}" rel="stylesheet" type="text/css" />
      <script async src="https://www.googletagmanager.com/gtag/js?id=UA-5190460-1"></script>
      <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-5190460-1');
      </script>
      <script src="{{asset('web/pakistan/sitefiles/2532/js/moderizr.flexbox.min.js')}}">
      </script>
      @show



      @stack('post-styles')
      <script type="text/javascript">
        var BASE_URL = "{{ url('/')}}";
      </script>
    </head>
    <body class="home">
      <div>
      </div>
      <script type="text/javascript">
        var theForm = document.forms['aspnetForm'];
        if (!theForm) {
          theForm = document.aspnetForm;
        }
        function __doPostBack(eventTarget, eventArgument) {
          if (!theForm.onsubmit || (theForm.onsubmit() != false)) {
            theForm.__EVENTTARGET.value = eventTarget;
            theForm.__EVENTARGUMENT.value = eventArgument;
            theForm.submit();
          }
        }
      </script>
      <div>
     </div>
      @section('aside-left')
      @include('_layouts.web.pakistan.partials._aside-left')
      @show
      <div id="siteWrapper" class="slide-left" style="overflow:hidden;">
        <div class="body-overlay"></div>
        @section('header-base')
        @include('_layouts.web.pakistan.partials._header-base')
        @show
        <div id="search-container" class="bg-dark-blue invert">
          <a id="search-close" class="close-location pull-right no-style f7">CLOSE <span class="icon icon-x f5 ml1 relative white dib bg-gold"></span></a>
          <div class="pv3">
            <script type="text/javascript">
              $(document).ready(function() {
                $("#searchButton").click(function() { return send(); });
                $("#searchField").keypress(function(evt) {
                  if (evt.keyCode == 13) {
                    return send();
                  }
                });
                $("#searchField").click(function() { $(this).val(""); });
                function send() {
                  val = $("#searchField").val();
                  if (val != "") window.location = "/searchresults.aspx?s=" + escape(val);
                  return false;
                }
              });
            </script>
            <div class="searchPanel">
              <label style="position: absolute;width: 1px;height: 1px;padding: 0;margin: -1px;overflow: hidden;clip: rect(0,0,0,0);border: 0;" class="sw-site-search-label sr-only" for="searchField">Search</label>
              <input type="text" id="searchField" class="searchField" value="Search" title="Search the Site" />
              <input type="button" id="searchButton" class="searchButton" value="Go" />
            </div>

            <span class="light-gray pt2 ph3 dib f6">Enter your search term and press enter. Press Esc or X to close.</span>
          </div>
        </div>

        @yield('content')


        @section('footer-base')
        @include('_layouts.web.pakistan.partials._footer')
        @show

        @stack('pre-scripts')

        @section('scripts')

        <script src="{{asset('web/muscat/js/jquery.min.js')}}"></script>


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