<header class="flex flex-row absolute top-0 left-0 w-100 z-999">

  <div class="logo-wrap flex items-center w-60 w-30-ns">
    <a class="logo-link dib pv2 ph3-ns" href="{{route('pakistan.index')}}">
      <img src="{{asset('images/school/americanlycesum.png')}}">
    </a>
  </div>
  <nav class="flex flex-wrap flex-nav items-center w-40 w-70-ns pr3 justify-end">
    <div class="utility nav flex justify-end items-center w-100-l">
      <div class="dn dib-l">
       <ul>
         <li>
           <a href="{{route('pakistan.news')}}" class="text_fonts">News</a>
         </li>
         <li>
          <a href="{{route('pakistan.contactus')}}">Contact Us</a>
        </li>
        <li>
          <a href="http://eschoolforall.com/">Lyceum Technologies</a>
        </li>
        <li id="cpn-apply-now">
          <a href="{{route('admin.login')}}">Portal</a>
        </li>
      </ul>
    </div>
  </div>
  <div class="dn dib-l w-100">
    <div id="ctl00_cphMainMenu_swMainMenu_pnlMainMenu">
      <ul id="mainnav">
        <li class="sw-menucode-item" id="mn-home">
          <a href="{{route('pakistan.index')}}"  class="current  sw-menucode-item__link">Home</a>
          <ul class="sw-menucode-list">
            <li class="sw-menucode-list__item" id="mn-traditions">
              <a href="traditions.html"  class="current first last sw-menucode-item__link">Traditions</a>
            </li>
          </ul>
        </li>
        <li class="sw-menucode-item" id="mn-about">
          <a href="{{route('pakistan.about')}}"  class=" sw-menucode-item__link">About</a>
          <ul class="sw-menucode-list">
            <li class="sw-menucode-list__item" id="mn-lausanne-at-a-glance">
              <a href="{{route('pakistan.coreValue')}}"  class="first  sw-menucode-item__link">Core Values</a>
            </li>
            <li class="sw-menucode-list__item" id="mn-leadership">
              <a href="{{route('pakistan.mision')}}"  class=" sw-menucode-item__link">Mision</a>
            </li>
            <li class="sw-menucode-list__item" id="mn-leadership">
              <a href="{{route('pakistan.vision')}}"  class=" sw-menucode-item__link">Vision</a>
            </li>
            <li class="sw-menucode-list__item" id="mn-leadership">
              <a href="{{route('pakistan.history')}}"  class=" sw-menucode-item__link">History</a>
            </li>
            <li class="sw-menucode-list__item" id="mn-leadership">
              <a href="{{route('pakistan.leadership')}}"  class=" sw-menucode-item__link">Leadership</a>
            </li>
          </ul>
        </li>
        
        <li class="sw-menucode-item" id="mn-admissions">
          <a href="" class=" sw-menucode-item__link">Admission</a>
          <ul class="sw-menucode-list">
            <li class="sw-menucode-list__item" id="mn-admission-at-">
              <a href="{{route('pakistan.Information')}}" class="first  sw-menucode-item__link">Information</a>
            </li>
            <li class="sw-menucode-list__item" id="mn-how-to-apply">
              <a href="{{route('pakistan.Apply')}}" class=" sw-menucode-item__link">Apply
              </a>
            </li>
          </ul>
        </li>
        <li class="sw-menucode-item" id="mn-admissions">
          <a href="{{route('pakistan.life')}}" class=" sw-menucode-item__link">Life</a>
          <ul class="sw-menucode-list">
            <li class="sw-menucode-list__item" id="mn-admission-at-">
              <a href="{{route('pakistan.explore')}}" class="first  sw-menucode-item__link">Explore</a>
            </li>
            <li class="sw-menucode-list__item" id="mn-how-to-apply">
              <a href="{{route('pakistan.clubs')}}" class=" sw-menucode-item__link">Clubs</a>
            </li>

          </ul>
        </li>
        <li class="sw-menucode-item" id="mn-admissions">
          <a href="{{route('pakistan.life')}}" class=" sw-menucode-item__link">Exam</a>
          <ul class="sw-menucode-list">

            <li class="sw-menucode-list__item" id="mn-how-to-apply">
              <a href="{{route('pakistan.date_sheet')}}" class=" sw-menucode-item__link">Date Sheet</a>
            </li>
          </ul>
        </li>
        <li class="sw-menucode-item" id="mn-academics">
          <a href="{{route('pakistan.Jobs_now')}}" class=" sw-menucode-item__link">Jobs</a>
        </li>
        <li class="sw-menucode-item" id="mn-alumni">
          <a href="javascript:;" class=" sw-menucode-item__link">Franchise</a>
          <ul class="sw-menucode-list">
            <li class="sw-menucode-list__item" id="mn-core-values">
              <a href="{{route('pakistan.why_Us')}}" class="first  sw-menucode-item__link">Why Us</a>
            </li><li class="sw-menucode-list__item" id="mn-core-values">
              <a href="{{route('pakistan.Apply_now')}}" class="first  sw-menucode-item__link">Apply</a>
            </li>
            <li class="sw-menucode-list__item" id="mn-core-values">
            </li>
          </ul>
        </li>
        <li class="sw-menucode-item" id="mn-arts">
          <a href="{{route('pakistan.branch')}}" class=" sw-menucode-item__link">Branches</a>

        </li>
        <li class="sw-menucode-item" id="mn-summer">
          <a href="{{route('pakistan.Summer')}}" class=" sw-menucode-item__link">camps</a>

        </li>
        <li class="sw-menucode-item" id="mn-athletics">
          <a href="{{route('pakistan.Summer_fee')}}" class=" sw-menucode-item__link">Prospectus </a>
          <ul class="sw-menucode-list">

            <li class="sw-menucode-list__item" id="mn-how-to-">
              <a href="franchisbooklet.pdf" class="sw-menucode-item__link">View</a>
            </li>
            <li class="sw-menucode-list__item" id="mn-tuition-financial-">
              <a href="franchisbooklet.pdf" download="franchisbooklet.pdf" class=" sw-menucode-item__link">Download</a>
            </li>
          </ul>
        </li>
      </ul>

    </div>

  </div>
  <button type="button" id="drawer-toggle" class="pull-right">
    <span></span>
  </button>
</nav>
</header>
