@extends('_layouts.web.pakistan.default')
@section('content')


<div id="search-container" class="bg-dark-blue invert">
  <a id="search-close" class="close-location pull-right no-style f7">CLOSE <span class="icon icon-x f5 ml1 relative white dib bg-gold"></span></a>
  <div class="pv3">
    
    


    <script type="text/javascript">
// <![CDATA[
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
//  ]]>
</script>
<div class="searchPanel">
    
    <label style="position: absolute;width: 1px;height: 1px;padding: 0;margin: -1px;overflow: hidden;clip: rect(0,0,0,0);border: 0;" class="sw-site-search-label sr-only" for="searchField">Search</label>
    <input type="text" id="searchField" class="searchField" value="Search" title="Search the Site" />
    <input type="button" id="searchButton" class="searchButton" value="Go" />
</div>

<span class="light-gray pt2 ph3 dib f6">Enter your search term and press enter. Press Esc or X to close.</span>
</div>
</div>
<div id="siteWrapper" class="slide-right" style="overflow:hidden;">
    <div class="body-overlay"></div>

        </div>
    </section>
@endsection