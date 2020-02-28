<footer class="bg-near-black invert sans-serif pt6 relative" style="    border-left: 5px solid #8f0625;
border-top: 6px solid #8f0625;
color: black;
border-right: 16px solid #8f0625;">
<div class="mw9 center flex flex-row flex-wrap pt5 nt5">
  <div class="logo-wrap w-25-ns  tl nt2 pb6 dn dib-l relative">
    <a class="logo-link dib ph3" href="{{route('pakistan.index')}}">
     <img src="{{asset('images/school/americanlycesum.png')}}">


     

   </a>
 </div>
 <div class="address w-30-l w-40-m  tl ph4">
  <input name="ctl00$ctl31$hfPagePartId" type="hidden" id="ctl00_ctl31_hfPagePartId" />
  <div class="templatecontent ">
    <p><span class="db pt1 pb2 b">American Lyceum group of School</span> 
      <a href="info@americanlyceum.com" target="_blank" title="Map and Directions"><br>
      info@americanlyceum.com</a><br />
      <a href="tel:9014741000" title="Call us today!">
        <i class="fa fa-phone" aria-hidden="true"></i> +92-3-111-786-092<br>
        
      </a>
      <a href="tel:923111786092" title="Call us today!"> <i class="fa fa-whatsapp" aria-hidden="true"></i>
      +968-90856281</a></p>    

    </div>

  </div>
  <div class="quick-links w-25-l w-40-m  pl5-l ph2-l ph4 ph0-m pb4">
    <ul id="childpagenav-161766">
      <li class="sw-menucode-item" id="cpn-giving">
        <a href="#"  class="first  sw-menucode-item__link">Giving</a>
      </li>
      <li class="sw-menucode-item" id="cpn-site-map">
        <a href="#"  class=" sw-menucode-item__link">Site Map</a>
      </li>
      <li class="sw-menucode-item" id="cpn-the-lausanne-way">
        <a href="#"  class=" sw-menucode-item__link">The Lyceum Way</a>
      </li>
      <li class="sw-menucode-item" id="cpn-tuition">
        <a href="#"  class=" sw-menucode-item__link">Tuition</a>
      </li>
      <li class="sw-menucode-item" id="cpn-apply">
        <a href="#"  class=" sw-menucode-item__link">Apply</a>
      </li>
      <li class="sw-menucode-item" id="cpn-contact-us_1">
        <a href="#"  class="last sw-menucode-item__link">Contact Us</a>
      </li>
    </ul>

  </div>
  <div class="w-20-ns  ph4-l ph0-m ph4 ibo">
    <input name="ctl00$ctl32$hfPagePartId" type="hidden" id="ctl00_ctl32_hfPagePartId" />
    <div class="templatecontent">
      <a class="dib w-40-ns w-60" href="{{route('pakistan.index')}}" target="_blank" title="American Lyceum group of school">
        <img alt="American Lyceum group of school" src="{{asset('images/school/logooo.png')}}" style="width: 100%" />
      </a> 
    </div>
  </div>
</div>
<div class="mw9 center  ttu pa3 credit flex flex-row flex-wrap">
  <div class="social-nav w-50-ns  pa4">
    <ul id="childpagenav-161778">
      <li class="sw-menucode-item" id="cpn-facebook">
        <a href="#" target="_blank" class="first  sw-menucode-item__link">Facebook</a>
      </li>
      <li class="sw-menucode-item" id="cpn-twitter">
        <a href="#" target="_blank" class=" sw-menucode-item__link">Twitter</a>
      </li>
      <li class="sw-menucode-item" id="cpn-instagram">
        <a href="#" target="_blank" class=" sw-menucode-item__link">Instagram</a>
      </li>
      <li class="sw-menucode-item" id="cpn-youtube">
        <a href="#" target="_blank" class="last sw-menucode-item__link">YouTube</a>
      </li>
    </ul>

  </div>
  
</div>
</footer>

</div>
<!-- #siteWrapper End -->

<!-- Shadowbox -->
<!-- ShadowBox Markup -->
<div id="sb-container">
  <div id="sb-overlay"></div>
  <div id="sb-wrapper">
    <a id="sb-nav-close" title="Close" class="fr dark-blue bg-gold db tc br-pill relative right--1 top-1 ma0 z-999 overflow-hidden" onclick="Shadowbox.close()"><span class="icon icon-x"></span></a>
    <div id="sb-wrapper-inner" class="db ">
      <div id="sb-body">
        <div id="sb-body-inner"></div>
        <div id="sb-loading">
          <div id="sb-loading-inner"><span>loading</span></div>
        </div>
      </div>
    </div>
    <div class="custom-cta-wrap tc invert">
      <a class="btn" href="#" title="Contact Us">Contact Us</a>
      <a class="btn" href="#" target="_blank" title="Apply Now">Apply Now</a>
    </div>
  </div>
</div>


<div id="toTop"><a title="Back to Top"><span class="icon icon-chevron-up"></span></a></div>


<div class="student modal fade" id="student-modal" tabindex="-1" role="dialog" aria-labelledby="Student Modal">
  <div class="modal-dialog center" role="document">
    <div class="modal-content">
      <div class="modal-header pa2 flex flex-row justify-between">
        <h4 class="modal-title dark-blue" id="studentLabel"></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" class="icon icon-x"></span></button>
      </div>
      <div class="modal-body tl">

      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
  $(document).ready(function() {
    $.fn.randomize = function(selector){
      (selector ? this.find(selector) : this).parent().each(function(){
        $(this).children(selector).sort(function(){
          return Math.random() - 0.5;
        }).detach().appendTo(this);
      });

      return this;
    };
    $('div.hats-container').randomize('div.hat');

  });
</script>
<script>
  /*! loadCSS. [c]2017 Filament Group, Inc. MIT License */
  !function(t){"use strict";t.loadCSS||(t.loadCSS=function(){});var e=loadCSS.relpreload={};
  if(e.support=function(){var e;try{e=t.document.createElement("link").relList.supports("preload")}catch(t){e=!1}return function(){return e}}(),
    e.bindMediaToggle=function(t){var e=t.media||"all";function a(){t.media=e}t.addEventListener?t.addEventListener("load",a):t.attachEvent&&
    t.attachEvent("onload",a),setTimeout(function(){t.rel="stylesheet",t.media="only x"}),setTimeout(a,3e3)},e.poly=function(){if(!e.support())
      for(var a=t.document.getElementsByTagName("link"),n=0;n<a.length;n++){var o=a[n];"preload"!==o.rel||"style"!==o.getAttribute("as")||
        o.getAttribute("data-loadcss")||(o.setAttribute("data-loadcss",!0),e.bindMediaToggle(o))}},!e.support()){e.poly();
    var a=t.setInterval(e.poly,500);t.addEventListener?t.addEventListener("load",function(){e.poly(),t.clearInterval(a)}):t.attachEvent&&
    t.attachEvent("onload",function(){e.poly(),t.clearInterval(a)})}"undefined"!=typeof exports?exports.loadCSS=loadCSS:t.loadCSS=loadCSS
  }("undefined"!=typeof global?global:this);
</script></form>

<script src="{{asset('web/pakistan/sitefiles/2532/js/helper-minfe78.js?cache=0001')}}"></script>
<script>
  jQ171(document).ready(function($) {
    Shadowbox.init({
      language: 'en', players:
      ['img', 'html', 'iframe', 'qt', 'wmp', 'swf', 'flv']});

  });
</script>
