@extends('_layouts.web.pakistan.default')
@section('content')
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.js"></script>
    <script async src="https://www.youtube.com/iframe_api"></script>

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
<div id="siteWrapper" class="slide-right" style="overflow:hidden;">
    <div class="body-overlay"></div>
    <section class="home-main">

   <div>
  <div id="myCarousel" class="carousel slide" data-ride="carousel" style="max-height: 700px;">
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
      <div class="item active">
        <img src="{{asset('assets/frontend/images/student4.jpg')}}" alt="Los Angeles" style="width:100%;">
      </div>
      <div class="item">
        <img src="{{asset('assets/frontend/images/student2.jpg')}}" alt="Chicago" style="width:100%;">
      </div>
      <div class="item">
        <img src="{{asset('assets/frontend/images/student6.jpg')}}" alt="New york" style="width:100%;">
      </div>
    </div>
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>
<div class="gradient-overlay"></div>
 <div class="section-facts relative w-100 nb6 content-start">
            <input type="hidden" name="ctl00$cphPageBody$hfExistingUrl" id="ctl00_cphPageBody_hfExistingUrl" value="/default.aspx">
            <script type="text/javascript">
            Sys.WebForms.PageRequestManager._initialize('ctl00$cphPageBody$ctl00', 'aspnetForm', [], [], [], 10, 'ctl00');
        </script>

        <div class="sw-public-page-part ">

            <div id="ctl00_cphPageBody_public_partctrl_cphPageBody_1_matrixContent" class="matrix-content"><div class="w-100 absolute right-3 top-3 mt6">
                <h2 class=" white title tr ph4 animate-inview fade-down">The Lyceum Way</h2>
            </div>
            <div class="carousel-single w-100 ">

                <div class="item tl z-1 mv7 w-100 flex flex-row-ns flex-column">
                    <div class="bg-image absolute top-0 left-0 w-100 h-100" style="background-image: url({{asset('assets/frontend/images/student1.jpg')}})">
                        <div>
                        </div>
                    </div>
                    <div class="bg-transparent-green invert activate-animate-inview w-100 w-60-ns z-999 mb6-ns relative">
                        <div class="w-100 pa4 pv4-ns ph5-ns">
                            <p class=" tracked tl ma0 yellow small b">AT Lyceum </p>
                            <h5 class="tl mt0 white">We create a joyful and challenging learning process</h5>
                            <p class="tl white">Hands-on projects, engaging discussions, cross-curriculum connections, differentiation in the classroom and energizing class schedules lead to happy students, better retention and wider matriculation to colleges and universities.</p>
                            <p class="tl mb0"><a class="btn mb0" href="javascript:;">Learn More</a></p>
                        </div>
                    </div>
                    <div class="stats activate-animate-inview delay-9 w-100 w-30-ns pa4 invert bg-transparent-dark-blue mt6 dn flex-ns flex-column relative left--2--ns z-9999">
                        <h6 class="w-100 tl ma0">Related Facts</h6>
                        <div class="w-100 ph1">
                            <h2 class="ma0">8:1</h2>
                            <p class="ma0 Times New Roman f6 b dark-blue">Student/Teacher Ratio</p>
                        </div>
                        <div class="w-100 ph1">
                            <h2 class="ma0">25</h2>
                            <p class="ma0 Times New Roman f6 b dark-blue">Average Class Size
                            </p>
                        </div>
                        <div class="w-100 ph1">
                            <h2 class="ma0">35</h2>
                            <p class="ma0 Times New Roman f6 b dark-blue">Branches</p>
                        </div>
                    </div>
                </div>
                <div class="item tl z-1 mv7 w-100 flex flex-row-ns flex-column">
                    <div class="bg-image absolute top-0 left-0 w-100 h-100" style="background-image: url({{asset('assets/frontend/images/student2.jpg')}});">
                        <div></div>
                    </div>
                    <div class="bg-transparent-eggplant invert activate-animate-inview w-100 w-60-ns z-999 mb6-ns relative">
                        <div class="w-100 pa4 pv4-ns ph5-ns">
                            <p class="Times New Roman tracked tl ma0 yellow small b">AT Lyceum</p>
                            <h5 class="tl mt0 white">We empower individuals to seek their own journeys</h5>
                            <p class="tl white">Through a well-rounded academic program that honors our students’ different personalities, learning styles and interests, Lyceum students grow to become confident risk-takers.</p>
                            <p class="tl mb0"><a class="btn mb0" href="javascript:;">Learn More</a></p>
                        </div>
                    </div>
                    <div class="stats activate-animate-inview delay-9 w-100 w-30-ns pa4 invert bg-transparent-orange mt6 dn flex-ns flex-column relative left--2--ns z-9999">
                        <h6 class="w-100 tl ma0">Related Facts</h6>
                        <div class="w-100 ph1">
                            <h2 class="ma0">8:1</h2>
                            <p class="ma0 Times New Roman f6 b dark-blue">Student/Teacher Ratio</p>
                        </div>
                        <div class="w-100 ph1">
                            <h2 class="ma0">25</h2>
                            <p class="ma0 Times New Roman f6 b dark-blue">Average Class Size</p>
                        </div>
                        <div class="w-100 ph1">
                            <h2 class="ma0">35</h2>
                            <p class="ma0 Times New Roman f6 b dark-blue">Branches</p>
                        </div>
                    </div>
                </div>
                <div class="item tl z-1 mv7 w-100 flex flex-row-ns flex-column">
                    <div class="bg-image absolute top-0 left-0 w-100 h-100" style="background-image: url({{asset('assets/frontend/images/student3.jpg')}});">
                        <div></div>
                    </div>
                    <div class="bg-transparent-green invert activate-animate-inview w-100 w-60-ns z-999 mb6-ns relative">
                        <div class="w-100 pa4 pv4-ns ph5-ns">
                            <p class="Times New Roman tracked tl ma0 yellow small b">AT Lyceum</p>
                            <h5 class="tl mt0 white">We forge meaningful relationships</h5>
                            <p class="tl white">At Lyceum, class sizes are small to encourage collaborative learning and camaraderie. Our single campus allows older students to grow as role models, while younger mentors dream big.</p>
                            <p class="tl mb0"><a class="btn mb0" href="#">Learn More</a></p>
                        </div>
                    </div>
                    <div class="stats activate-animate-inview delay-9 w-100 w-30-ns pa4 invert bg-transparent-eggplant mt6 dn flex-ns flex-column relative left--2--ns z-9999">
                        <h6 class="w-100 tl ma0">Related Facts</h6>
                        <div class="w-100 ph1">
                            <h2 class="ma0">14</h2>
                            <p class="ma0 Times New Roman f6 b dark-blue">Average Class Size</p>
                        </div>
                        <div class="w-100 ph1">
                            <h2 class="ma0">30</h2>
                            <p class="ma0 Times New Roman f6 b dark-blue">Lakeside acres</p>
                        </div>
                        <div class="w-100 ph1">
                            <h2 class="ma0">50%</h2>
                            <p class="ma0 Times New Roman f6 b dark-blue">Siblings</p>
                        </div>
                    </div>
                </div>
                <div class="item tl z-1 mv7 w-100 flex flex-row-ns flex-column">
                 <div class="bg-image absolute top-0 left-0 w-100 h-100" style="background-image: url('{asset('assets/frontend/images/student4.jpg')}}');">
                        <div></div>
                    </div>
                    <div class="bg-transparent-light-blue invert activate-animate-inview w-100 w-60-ns z-999 mb6-ns relative">
                        <div class="w-100 pa4 pv4-ns ph5-ns">
                            <p class="Times New Roman tracked tl ma0 yellow small b">AT Lyceum</p>
                            <h5 class="tl mt0 white">We build character through service to others</h5>
                            <p class="tl white">As open-minded, global citizens, Lyceum students develop an understanding of the impact they can have on the world around them rooted in fairness, justice and respect for others.</p>
                            <p class="tl mb0"><a class="btn mb0" href="#">Learn More</a></p>
                        </div>
                    </div>
                    <div class="stats activate-animate-inview delay-9 w-100 w-30-ns pa4 invert bg-transparent-dark-blue mt6 dn flex-ns flex-column relative left--2--ns z-9999">
                        <h6 class="w-100 tl ma0">Related Facts</h6>
                        <div class="w-100 ph1">
                            <h2 class="ma0">33%</h2>
                            <p class="ma0 Times New Roman f6 b dark-blue">of students come from countries outside of the USA</p>
                        </div>
                        <div class="w-100 ph1">
                            <h2 class="ma0">55</h2>
                            <p class="ma0 Times New Roman f6 b dark-blue">different countries are represented by our student body</p>
                        </div>
                        <div class="w-100 ph1">
                            <h2 class="ma0">47%</h2>
                            <p class="ma0 Times New Roman f6 b dark-blue">students of color</p>
                        </div>
                    </div>
                </div>
                <div class="item tl z-1 mv7 w-100 flex flex-row-ns flex-column">
                    <div class="bg-image absolute top-0 left-0 w-100 h-100" style="background-image: url('{{asset('assets/frontend/images/student6.jpg')}}');">
                        <div></div>
                    </div>
                    <div class="bg-transparent-red invert activate-animate-inview w-100 w-60-ns z-999 mb6-ns relative">
                        <div class="w-100 pa4 pv4-ns ph5-ns">
                            <p class="Times New Roman tracked tl ma0 yellow small b">AT Lyceum</p>
                            <h5 class="tl mt0 white">We encourage continual self-reflection</h5>
                            <p class="tl white">By recognizing and approaching complex problems and making ethical decisions, Lyceum students learn to understand and capitalize on their strengths and limitations, and the needs and concerns of others.</p>
                            <p class="tl mb0"><a class="btn mb0" href="#">Learn More</a></p>
                        </div>
                    </div>
                    <div class="stats activate-animate-inview delay-9 w-100 w-30-ns pa4 invert bg-transparent-light-blue mt6 dn flex-ns flex-column relative left--2--ns z-9999">
                        <h6 class="w-100 tl ma0">Related Facts</h6>
                        <div class="w-100 ph1">
                            <h2 class="ma0">62</h2>
                            <p class="ma0 Times New Roman f6 b dark-blue">Advisory groups</p>
                        </div>
                        <div class="w-100 ph1">
                            <h2 class="ma0">4</h2>
                            <p class="ma0 Times New Roman f6 b dark-blue">Learning specialists</p>
                        </div>
                        <div class="w-100 ph1">
                            <h2 class="ma0">4</h2>
                            <p class="ma0 Times New Roman f6 b dark-blue">Counsellors</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <input type="hidden" name="ctl00$cphPageBody$public_partctrl_cphPageBody_1$hfPagePartId" id="ctl00_cphPageBody_public_partctrl_cphPageBody_1_hfPagePartId" value="295257" />
    </div>
</div>
<div class="section-map pt4 pt6-ns bg-very-light-gray w-100">
    <div class="flex flex-row-ns flex-column flex-wrap center relative">
        <div class="sw-public-page-part center w-100 global-map-section bg-very-light-gray pt5">

            <div id="ctl00_cphCustomSection1_public_partctrl_cphCustomSection1_1_matrixContent" class="matrix-content">
                <div class="w-100 tc">
                    <p class="sans-serif ttu tracked mb0">We embrace global mindedness</p>
                    <h2 class="mt0">OUR STUDENTS COME FROM 10 COUNTRIES</h2>
                </div>
                <div class="mw8 center w-100 tc pb5">
                    <div class="map-container relative">
                        <img src="https://www.speakcdn.com/sitefiles/2532/css/images/global-map.svg" alt="Map">
                        <div class="dots w-100 absolute top-0 left-0 h-100">
                            <ul class="map-dots list ma0 pa0 animate-inview fade-down load-in w-100 h-100">
                                <li class="country Haiti absolute" style="left: 26.5%; top: 60%;">
                                    <a data-target="#student-modal" data-toggle="modal" data-title="Haiti" data-summary="“Around the world you will see a lot of conflict in the media. Because of the multicultural aspect of Lyceum, Jaiya is able to understand and respect others’ viewpoints or ways of life, therefore, helping her to respond in a positive manner. This also allows her to think outside of the box in the classroom. It helps her realize that there are different approaches to reaching a common goal and helps her interact with her classmates better and build relationships with them.”" data-family="Jaiya Siffrard ‘28, Venis and Janita Siffrard" data-image="../www.speakcdn.com/assets/2532/map-haiti.jpg">
                                        <div class="country-name sans-serif white pa2 ttu tracked f7">Haiti</div>
                                        <span></span>
                                    </a>
                                </li>
                                <li class="country China absolute" style="left: 70%; top: 55%;">
                                    <a data-target="#student-modal" data-toggle="modal" data-title="China" data-summary="“The global atmosphere at Lyceum and because it is an international school has made it easier for Eric to adapt to the school very quickly. He even met some Chinese students in his classes who speak Mandarin, which helps him not to feel alone emotionally. I also see that he is more independent than before. He started to manage his own planning and schedule activities for the weekend, he started to ask questions and think more about life seriously. He is encouraged to ask more questions and is building life-long learning behaviors, which is very important. Also, Eric used to only spend time on the academic part of school and limited himself in sports and outdoor activities, the same as most Chinese students. Under Lyceum’s learning environment, he has had more time to become involved, which makes him stronger.”" data-family="Eric Liu ‘22, Leo Liu and Maggie Zhao" data-image="../www.speakcdn.com/assets/2532/map-china.jpg">
                                        <div class="country-name sans-serif white pa2 ttu tracked f7">China</div>
                                        <span></span>
                                    </a>
                                </li>
                                <li class="country Jamaica absolute" style="left: 25%; top: 60%;">
                                    <a data-target="#student-modal" data-toggle="modal" data-title="Jamaica" data-summary="We want to ensure that our Ethan is exposed to a broader array of perspectives and backgrounds to enable him to thrive in whatever environment he finds himself, with consideration of varying points of view and perspectives. He is biracial and comes from a family of multiple cultures and religions. I think that the diversity of the Lyceum student population allows him to feel like he can embrace all parts of himself without having to conform to a religious, racial or cultural norm. Little kids have not yet formed prejudgments of others. Regardless of background, kids at this age are learning to navigate the world around them and are just beginning to explore relationships with peers. It will be interesting to see how these peer relationships evolve as the children grow older, but I think it is fantastic that in a PK through twelfth grade  environment some of the peer relationships they build at three may continue on into adulthood." data-family="Ethan Hall '29" data-image="../www.speakcdn.com/assets/2532/map-jamaica.jpg">
                                        <div class="country-name sans-serif white pa2 ttu tracked f7">Jamaica</div>
                                        <span></span>
                                    </a>
                                </li>
                                <li class="country India absolute" style="left: 67%; top: 60%;">
                                    <a data-target="#student-modal" data-toggle="modal" data-title="India" data-summary="“Having a diverse student population at Lyceum has fostered a melting-pot environment in which faculty, students and parents can celebrate their differences. This makes me feel more comfortable in sharing and representing my own background. In return, this allows me to remain constantly engaged and connected to my culture. Furthermore, by being a part of the Lyceum melting pot I do not feel like a minority but rather an active participant of the community. In the act of teaching, we are developing the perceptions of our students. At Lyceum, due to the diversity of the student population, each student has the opportunity to learn and contribute to that perception. This allows for a student-led learning environment.”" data-family="Ramneek Dhillon, 3rd Grade Teacher" data-image="../www.speakcdn.com/assets/2532/map-india.jpg">
                                        <div class="country-name sans-serif white pa2 ttu tracked f7">India</div>
                                        <span></span>
                                    </a>
                                </li>
                                <li class="country Greece absolute" style="left: 51.5%; top: 51%;">
                                    <a data-target="#student-modal" data-toggle="modal" data-title="Greece" data-summary="“As a Greek and American family with relatives spread throughout the US and Europe, we appreciated that Lyceum embraces global mindedness and forges meaningful relationships. We want our son to grow up knowing that the world is much bigger than his own backyard – so, for us, a challenging and engaging academic program was just as important as a diverse and internationally focused learning environment. There’s no other school in town that offers this. Our goal is to raise an informed, confident and open minded global citizen that is ready to contribute to a better world – and we knew Lyceum would help us do that. Jack loves his school and we are all very proud to be a part of the Lyceum family.”" data-family="Jonathan Karydis '33, Anastasios Karydis and Gretchen Mathis-Karydis" data-image="../www.speakcdn.com/assets/2532/6_karydis_family.png">
                                        <div class="country-name sans-serif white pa2 ttu tracked f7">Greece</div>
                                        <span></span>
                                    </a>
                                </li>
                                <li class="country Florida, USA absolute" style="left: 24%; top: 56%;">
                                    <a data-target="#student-modal" data-toggle="modal" data-title="Florida, USA" data-summary="“From the moment we first stepped on campus, both of our boys felt comfortable. Meeting people from many other cultures has helped them find their own place. They feel validated and reflected in the differences around them. More importantly, they have discovered we are more similar than we are different.”" data-family="Doni ’16 and Yusef ’19 Thomas, Davin Thomas and Alicia Diaz-Thomas" data-image="../www.speakcdn.com/assets/2532/map-floridausa.jpg">
                                        <div class="country-name sans-serif white pa2 ttu tracked f7">Florida, USA</div>
                                        <span></span>
                                    </a>
                                </li>
                                <li class="country Oman absolute" style="left: 64%; top: 57%;">
                                    <a data-target="#student-modal" data-toggle="modal" data-title="Pakistan" data-summary="“While searching the best school for Zayyan back in 2009, one of the most important features for us was diversity. Being immigrants ourselves, we desired an atmosphere where he wouldn’t feel alienated. After visiting Lyceum, we zeroed in right there and then. Six years later, being Lyceum parents, we feel confident in our choice. The global environment has been extremely enriching for our children and has fostered their personalities allowing them to be confident and proud. The last thing we want in our children is lack of self-confidence or identity crisis. Lyceum provides the perfect atmosphere where children with various backgrounds, ethnicities, colors and religions mingle, exchange ideas, celebrate customs yet maintain their identity. This not only instills a sense of self-confidence but cultivates respect and better understanding of others. Our kindergartner, Eshal, while looking at a row of flags, pointed out that she didn’t see a Pakistani flag. We were a bit skeptical if she has ever seen one. She explained how her teacher has shown her flags from different countries where families in her class are from and how she could identify a Pakistani flag. Now that is impressive!”" data-family="Zayyan ’24 and Eshal ’28 Chaudhry, Sufiyan and Fatima Chaudhry" data-image="../www.speakcdn.com/assets/2532/map-pakistan.jpg">
                                        <div class="country-name sans-serif white pa2 ttu tracked f7">Oman</div>
                                        <span></span>
                                    </a>
                                </li>
                                <li class="country Pakistan absolute" style="left: 64%; top: 57%;">
                                    <a data-target="#student-modal" data-toggle="modal" data-title="Pakistan" data-summary="“While searching the best school for Zayyan back in 2009, one of the most important features for us was diversity. Being immigrants ourselves, we desired an atmosphere where he wouldn’t feel alienated. After visiting Lyceum, we zeroed in right there and then. Six years later, being Lyceum parents, we feel confident in our choice. The global environment has been extremely enriching for our children and has fostered their personalities allowing them to be confident and proud. The last thing we want in our children is lack of self-confidence or identity crisis. Lyceum provides the perfect atmosphere where children with various backgrounds, ethnicities, colors and religions mingle, exchange ideas, celebrate customs yet maintain their identity. This not only instills a sense of self-confidence but cultivates respect and better understanding of others. Our kindergartner, Eshal, while looking at a row of flags, pointed out that she didn’t see a Pakistani flag. We were a bit skeptical if she has ever seen one. She explained how her teacher has shown her flags from different countries where families in her class are from and how she could identify a Pakistani flag. Now that is impressive!”" data-family="Zayyan ’24 and Eshal ’28 Chaudhry, Sufiyan and Fatima Chaudhry" data-image="../www.speakcdn.com/assets/2532/map-pakistan.jpg">
                                        <div class="country-name sans-serif white pa2 ttu tracked f7">Pakistan</div>
                                        <span></span>
                                    </a>
                                </li>
                                <li class="country Tennessee, USA absolute" style="left: 23%; top: 52%;">
                                    <a data-target="#student-modal" data-toggle="modal" data-title="Tennessee, USA" data-summary="“Lyceum’s learning environment is not the typical private school mantra. The environment is fueled by teachers that previously taught at international schools or have such a yearning to connect kids from all different cultures. In addition, the teachers desire to have students understand each other. Wesley will be armed academically and with a level of cultural awareness and a need and commitment to promote gender and racial diversity. Simply put, what Wesley sees and experiences every day is a pre-cursor to what is going on in the world or at least what should be going on: the need for understanding and cooperation. Teachers spend time making the students think about and discussing what is happening in the world.”" data-family="Wesley Carr ‘18, Jim and Margaret Carr" data-image="../www.speakcdn.com/assets/2532/map-nashvilleusa.jpg">
                                        <div class="country-name sans-serif white pa2 ttu tracked f7">Tennessee, USA</div>
                                        <span></span>
                                    </a>
                                </li>
                                <li class="country Lebanon absolute" style="left: 56%; top: 54%;">
                                    <a data-target="#student-modal" data-toggle="modal" data-title="Lebanon" data-summary="“The global learning environment at Lyceum helps Kwame know how truly diverse the world is and realize that throughout history great men sometimes came from the most unlikely places. The diversity helps him prepare for an even more diverse world ahead of him, and, through his classes, he is able to keep in touch with the global community and to better understand the world.”" data-family="Sarah ’15, Maya ’19 and Jasmine ’23 Younes, Ziad and Nada Younes" data-image="../www.speakcdn.com/assets/2532/map-lebanon.jpg">
                                        <div class="country-name sans-serif white pa2 ttu tracked f7">Lebanon</div>
                                        <span></span>
                                    </a>
                                </li>
                               <li class="country Mexico absolute" style="left: 19%; top: 58%;">
                                    <a data-target="#student-modal" data-toggle="modal" data-title="Mexico" data-summary="The primary reasons we chose Lyceum was the multicultural/international background of students and families. Its core values include embracing global mindedness, not only opening the kids to globalization but also teaching them to respect the diversity of backgrounds and opinions.

                                    Obviously the mission of preparing students for college and life in a global environment was critical and well aligned with the primary reasons for our choice." data-family="Alexia '32, Diego '23, Marc and Maria Van Lieshout" data-image="../www.speakcdn.com/assets/2532/van_lieshout_family.jpg">
                                    <div class="country-name sans-serif white pa2 ttu tracked f7">Mexico</div>
                                    <span></span>
                                </a>
                            </li>
                            <li class="country Venezula absolute" style="left: 28%; top: 63%;">
                                <a data-target="#student-modal" data-toggle="modal" data-title="Venezula" data-summary="“We chose Lyceum because it was recommended as one of the best schools in Memphis and we loved the fact that it has a multicultural environment.”" data-family="Emilia '33 and Ximena '30 Risquez, Carmen Zuloaga and Cristobal Risquez" data-image="../www.speakcdn.com/assets/2532/6_risquez_family.jpg">
                                    <div class="country-name sans-serif white pa2 ttu tracked f7">Venezula</div>
                                    <span></span>
                                </a>
                            </li>
                            <li class="country Ohio, USA absolute" style="left: 24%; top: 49%;">
                                <a data-target="#student-modal" data-toggle="modal" data-title="Ohio, USA" data-summary="“With our children’s classmates attending from around the world, they are exposed more to global political and cultural issues. Also, learning Mandarin is an uncommon offering especially in Lower School curriculum, yet daily Mandarin is a great strength in Lyceum’s curriculum. Given China’s economic strength, being able to speak Mandarin will be valuable as they transition to adulthood.”" data-family="Sachin ’26 and Asha ’27 Lyons, Matthew Lyons and Suparna Mullick" data-image="../www.speakcdn.com/assets/2532/map-ohiousa.jpg">
                                    <div class="country-name sans-serif white pa2 ttu tracked f7">Ohio, USA</div>
                                    <span></span>
                                </a>
                            </li>
                            <li class="country Brazil absolute" style="left: 32%; top: 71%;">
                                <a data-target="#student-modal" data-toggle="modal" data-title="Brazil" data-summary="“Lyceum is a really good place for me. When I arrived in the USA, I did not know anybody here. My family was different, and I had to make new friends with a totally different language. The students and the teachers are very nice, and they introduced me to everybody. The academic program is very good, and I feel that I will be more prepared than I would have been in Brazil. Also, being put in an environment where I have to learn a language makes me have to really learn it. This will help me in my future so I can communicate with people from different countries.”" data-family="Bruno Riberio de Oliveira Garcia ’17, Mr. Joao Henrique Franco Garcia and Mrs. Ivana Pereira Riberio de Oliver" data-image="../www.speakcdn.com/assets/2532/map-brazil.jpg">
                                    <div class="country-name sans-serif white pa2 ttu tracked f7">Brazil</div>
                                    <span></span>
                                </a>
                            </li>
                            <li class="country Egypt absolute" style="left: 54%; top: 56%;">
                                <a data-target="#student-modal" data-toggle="modal" data-title="Egypt" data-summary="“Being at Lyceum, I am allowed to be myself. In fact, staying true to how you are is greatly encouraged in Lyceum. Never once was I unable to continue being Nouran, an Egyptian girl who resides in Dubai, who is crazy about languages and has many other interests. I am what I am, and Lyceum ensured that I remain that way and has allowed me to blossom. I feel extremely prepared for what lies ahead, my teachers’ knowledge and experiences have been instilled in me, and I am definitely ready for what’s around the corner. There are constant discussions and talks with our teachers, as well as with the students themselves, about events occurring around the world. The environment at Lyceum encourages and welcomes such discussions, which adds to the already prevalent global atmosphere coursing the halls and classrooms.”" data-family="Nouran Abdelshafi ‘15, Mafaz Maksoud" data-image="../www.speakcdn.com/assets/2532/map-egypt.jpg">
                                    <div class="country-name sans-serif white pa2 ttu tracked f7">Egypt</div>
                                    <span></span>
                                </a>
                            </li>
                            <li class="country Hungary absolute" style="left: 50.5%; top: 47%;">
                                <a data-target="#student-modal" data-toggle="modal" data-title="Hungary" data-summary="“The learning environment at Lyceum allows Gabor to think and talk about our family’s roots without being embarrassed, helps him feel more at home due to the diversity and builds self-confidence being around peers who come from different races, cultures and religions.”" data-family="Gabor Wollack ’23 (Tomi ‘29 joining Lyceum this Fall) Istvan Wollack and Csilla Rimoczi" data-image="../www.speakcdn.com/assets/2532/map-hungary.jpg">
                                    <div class="country-name sans-serif white pa2 ttu tracked f7">Hungary</div>
                                    <span></span>
                                </a>
                            </li>
                            <li class="country Texas, USA absolute" style="left: 20%; top: 54%;">
                                <a data-target="#student-modal" data-toggle="modal" data-title="Texas, USA" data-summary="“Lyceum teaches their students to be compassionate and understanding. As Cooper grows as a student, those traits will become even more impactful as he learns about the world and how he can contribute to a global society.”" data-family="Cooper Mears ‘27, Ron and Ann Mears" data-image="../www.speakcdn.com/assets/2532/map-texasusa.jpg">
                                    <div class="country-name sans-serif white pa2 ttu tracked f7">Texas, USA</div>
                                    <span></span>
                                </a>
                            </li>
                            <li class="country Ghana absolute" style="left: 45%; top: 66%;">
                                <a data-target="#student-modal" data-toggle="modal" data-title="Ghana" data-summary="“The global learning environment at Lyceum helps Kwame know how truly diverse the world is and realize that throughout history great men sometimes came from the most unlikely places. The diversity helps him prepare for an even more diverse world ahead of him, and, through his classes, he is able to keep in touch with the global community and to better understand the world.”" data-family="Kwame Oduro-Kusi ‘18, Alex and Afia Oduro-Kusi" data-image="../www.speakcdn.com/assets/2532/map-ghana.jpg">
                                    <div class="country-name sans-serif white pa2 ttu tracked f7">Ghana</div>
                                    <span></span>
                                </a>
                            </li>
                            <li class="country South Africa absolute" style="left: 52%; top: 81%;">
                                <a data-target="#student-modal" data-toggle="modal" data-title="South Africa" data-summary="We understand the true value of high-quality education and what it means for the future of our children. Having always provided the best education for our 17 old son, Jurique (Grade 12), and 12 old daughter, Jyotika (Grade 8), we chose Lyceum Collegiate after being blessed with them attending one of the best International schools in Belgium Europe and a top private school in South Africa.
                                The 3 main reasons for our choice were:
                                1. Diversity- different cultures and backgrounds of the students and teachers that encourages our children to continue their education with a global mindset and embracing the world full of rich cultures.
                                2. IB school curriculum- a challenging program that would prepare our children for the real world by developing their critical thinking and problem solving skills; as well as instilling strong leadership and good values that will enable them to positively contribute to society.
                                3. Values- common values of the school aligned with our family values combined with a warm, friendly, understanding and accommodating teachers that will ensure our kids get the attention they need to unlock their full potential." data-family="Jurique '19 and Jyotika '23, Reesha and Junai Maharaj" data-image="../www.speakcdn.com/assets/2532/6_maharaj_family.jpg">
                                <div class="country-name sans-serif white pa2 ttu tracked f7">South Africa</div>
                                <span></span>
                            </a>
                        </li>
                        <li class="country Switzerland absolute" style="left: 48.25%; top: 47.5%;">
                            <a data-target="#student-modal" data-toggle="modal" data-title="Switzerland" data-summary="“India and Kai feel like they belong at Lyceum, where being from another culture, having different customs, is celebrated. The international environment fosters their interest in learning more about their family living in Europe. India is taking French, which is the language her grandparents, uncles, aunts and cousins in Switzerland speak, and she is excited to get to practice with them in the summer.”" data-family="India ’23 and Kai ’25 Norris, Anthony and Sabine Norris" data-image="../www.speakcdn.com/assets/2532/map-switzerland.jpg">
                                <div class="country-name sans-serif white pa2 ttu tracked f7">Switzerland</div>
                                <span></span>
                            </a>
                        </li>
                        <li class="country France absolute" style="left: 46.5%; top: 47.5%;">
                            <a data-target="#student-modal" data-toggle="modal" data-title="France" data-summary="Lyceum gave us a very warm welcome when we arrived from Europe in 2016 with 2 teenagers and a 6th grader. Our children, who were brought up in the French system, immediately felt comfortable and part of the school; they received all the support they needed to adjust to a new curriculum, discover the IB system, make friends and engage in academic, artistic and athletic activities. As parents, we have enjoyed joining the Lyceum family; meeting other parents with diverse backgrounds but a shared passion for their school and all it contributes to our children’s wellbeing and growth has helped us feel at home! Lyceum is a very unique school, we are proud to be a part of." data-family="Marie-Pia '19, Marc '20 and Joséphine 23 Bonnot, Aude and Vincent Bonnot" data-image="../www.speakcdn.com/assets/2532/6_bonnot_family.jpg">
                                <div class="country-name sans-serif white pa2 ttu tracked f7">France</div>
                                <span></span>
                            </a>
                        </li>
                        <li class="country Belgium absolute" style="left: 47.5%; top: 45%;">
                            <a data-target="#student-modal" data-toggle="modal" data-title="Belgium" data-summary="“The global atmosphere at Lyceum helps the children understand that moving from one country to another or from one point in the USA to another is a part of life. Our children are not the only ones who have moved to Memphis and a lot of the Lyceum children have been in the same situation as our children were at the beginning of the school year.”" data-family="Annelien ’19, Loic ’23 and Kamil ’24 Pieters, Danny and Murielle Pieters" data-image="../www.speakcdn.com/assets/2532/map-belgium.jpg">
                                <div class="country-name sans-serif white pa2 ttu tracked f7">Belgium</div>
                                <span></span>
                            </a>
                        </li>
                        <li class="country United Kingdom absolute" style="left: 45%; top: 43%;">
                            <a data-target="#student-modal" data-toggle="modal" data-title="United Kingdom" data-summary="“Jessica feels more culturally aware as an individual at Lyceum. Having a Headmaster and Head of Upper School of the same nationality makes her feel at home. The learning environment with different nationalities and cultures helps make current affairs more relative when it directly affects her friends.”" data-family="Jessica Braithwaite '16" data-image="../www.speakcdn.com/assets/2532/map-unitedkingdom.jpg">
                                <div class="country-name sans-serif white pa2 ttu tracked f7">United Kingdom</div>
                                <span></span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <input type="hidden" name="ctl00$cphCustomSection1$public_partctrl_cphCustomSection1_1$hfPagePartId" id="ctl00_cphCustomSection1_public_partctrl_cphCustomSection1_1_hfPagePartId" value="295872">
</div>
</div>
</div>

<div class="section-at-lausanne relative bg-gold w-100">
    <div class="logo-divider tc absolute w-100"><img src="{{asset('assets/frontend/images/logooo.png')}}" alt="icon image"></div>

    <input name="ctl00$ctl27$hfPagePartId" type="hidden" id="ctl00_ctl27_hfPagePartId">
    <div class="templatecontent bg-image-js bg-fixed h-100 w-100 min-vh-100-ns" style="background-image: url('{{asset('assets/frontend/images/student2.jpg')}}');">
        <img alt="" src="#" style="visibility: hidden;">

    </div>

    <div class="bg-black o-20 absolute top-0 left-0 w-100 h-100"></div>

    <div class="text-container bg-light-blue w-50-ns w-100 left-0 pa5-ns pa4 invert">
        <input name="ctl00$ctl28$hfPagePartId" type="hidden" id="ctl00_ctl28_hfPagePartId">
        <div class="templatecontent animate-inview fade-right">
            <p class="ma0 sans-serif tracked">AT American Lyceum</p>

            <h4 class="mt0">We provide opportunities to succeed</h4>

            <p>American Lyceum International School (ALIS), an ISO certified school is an entity incorporated in the State of Washington, USA. Instituted by Engr. Nadim Kadri and Mrs. Tahira Nasreen in the year 1984, ALIS has achieved many milestones and has become the name of trust, pride and performance over the decades. Currently, ALIS has thirty five branches, with the number continuously increasing. It lays emphasis on quality than on quantity. The school is educating its pupils for life, with this aim at heart the school believes “Our job is to polish and multiple the God-gifted skills and talent of students.”
            </p>

            <p class="mb0"><a class="btn mb0" href="javascript:;">Learn More</a></p>


            <h4 class="mt0">Joining Hands with British Lyceum</h4>

            <p>American Lyceum has made an arrangement with British Lyceum to provide online Teaching Facilities to the Students of American Lyceum. American Lyceum has given the exclusive status to British Lyceum to provide Online Teaching.
            </p>

            <p class="mb0"><a class="btn mb0" href="www.britishlyceu.com">Learn More</a></p>


        </div>

    </div>
    <div class="video-container w-50-ns w-100 right-0 pv4 tc sans-serif  bg-light-blue">
        <h6>American Lyceum</h6>
        <div class="col-md-offset-3 col-md-7"><span class="right-qoute"><p class="Times New Roman">“We believe that every child can be successful. We conduct career counselling sessions once in a term to guide them for their future path. For this we work on their Leadership development. We have developed E-Learning in our school.” asserts Tahir.</p></span></div>
        <br>
        <div class="col-md-offset-3 col-md-7"><span class="">American Lyceum School</span>
            <p class="mb0"><a class="btn mb0" href="javascript:;">Learn More</a></p></div>





        </div>







    </div>

    <div class="section-hats relative pb6 nb6 w-100 z-1">
        <div class="flex flex-row-ns flex-column flex-wrap mw9 center relative">

            <div class="sw-public-page-part hats-container w-100 mv5">

                <div id="ctl00_cphCustomSection2_public_partctrl_cphCustomSection2_1_matrixContent" class="matrix-content"><div class="tc ph3">
                    <h3>Our Graduates are Following Their Dreams</h3>
                    <p class="b sans-serif"><a>Full Matriculation List <span class="icon icon-arrow-right"></span></a></p>
                </div>

                <div class="hats mw7 center flex flex-wrap flex-row animate-inview load-in">

                    <div class="hat w-90 center w-31-ns mh1p-ns mb3 overflow-hidden relative">
                        <img src="{{asset('assets/frontend/images/student7.jpg')}}">
                        <div class="quote absolute left-0 h-100 w-100 bg-white ">
                            <div class="absolute-centered w-100 pa3">
                                <span class="light-gray icon icon-quote f2 db w-100 tc"></span><b class="Times New Roman" style="color: black"></b>

                            </div>
                        </div>
                    </div>
                    <div class="hat w-90 center w-31-ns mh1p-ns mb3 overflow-hidden relative">
                        <img src="{{asset('assets/frontend/images/student1.jpg')}}">
                        <div class="quote absolute left-0 h-100 w-100 bg-white ">
                            <div class="absolute-centered w-100 pa3">

                                <b class="Times New Roman">
                                </b>

                            </div>
                        </div>
                    </div>
                    <div class="hat w-90 center w-31-ns mh1p-ns mb3 overflow-hidden relative">
                        <img src="{{asset('assets/frontend/images/student2.jpg')}}">
                        <div class="quote absolute left-0 h-100 w-100 bg-white ">
                            <div class="absolute-centered w-100 pa3">

                                <p class="Times New Roman">
                                </p>

                            </div>
                        </div>
                    </div>
                    <div class="hat w-90 center w-31-ns mh1p-ns mb3 overflow-hidden relative">
                        <img src="{{asset('assets/frontend/images/student3.jpg')}}">
                        <div class="quote absolute left-0 h-100 w-100 bg-white ">
                            <div class="absolute-centered w-100 pa3">



                            </div>
                        </div>
                    </div><div class="hat w-90 center w-31-ns mh1p-ns mb3 overflow-hidden relative">
                        <img src="{{asset('assets/frontend/images/student4.jpg')}}">
                        <div class="quote absolute left-0 h-100 w-100 bg-white ">
                            <div class="absolute-centered w-100 pa3">




                            </div>
                        </div>
                    </div><div class="hat w-90 center w-31-ns mh1p-ns mb3 overflow-hidden relative">
                        <img src="{{asset('assets/frontend/images/student5.jpg')}}">
                        <div class="quote absolute left-0 h-100 w-100 bg-white ">
                            <div class="absolute-centered w-100 pa3">



                            </div>
                        </div>
                    </div><div class="hat w-90 center w-31-ns mh1p-ns mb3 overflow-hidden relative">
                        <img src="{{asset('assets/frontend/images/student6.jpg')}}">
                        <div class="quote absolute left-0 h-100 w-100 bg-white ">
                            <div class="absolute-centered w-100 pa3">



                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <input type="hidden" name="ctl00$cphCustomSection2$public_partctrl_cphCustomSection2_1$hfPagePartId" id="ctl00_cphCustomSection2_public_partctrl_cphCustomSection2_1_hfPagePartId" value="295449">
        </div>
    </div>
</div>

<div class="section-events relative pv6 bg-dark-blue invert w-100 nb6" id="events">
    <div class="flex flex-row-ns flex-column flex-wrap mw9 tl center">
        <div class="w-100 tl pl4 animate-inview fade-right">
            <h2>Happenings at American Lyceum</h2>
        </div>

        <div class="w-50-ns w-100 pa4 pb0-ns ph5-ns relative z-1 animate-inview load-in">
            <h6 class="sans-serif tracked ttu tl mt0">Featured News</h6>
            <input type="hidden" name="ctl00$ctl30$hfPagePartId" id="ctl00_ctl30_hfPagePartId">
            <div class="">
                <input type="hidden" name="ctl00$ctl30$ctlWidgetList$hfPPID" id="ctl00_ctl30_ctlWidgetList_hfPPID" value="297718">
                <input type="hidden" name="ctl00$ctl30$ctlWidgetList$hfPID" id="ctl00_ctl30_ctlWidgetList_hfPID">




                <div id="ctl00_ctl30_ctlWidgetList_pnlRecentBlogs">


                    <div class="recent-blog-posts-wrapper">

                        <ul>

                            <li class="tag-Lower-School tag-Schoolwide-Event">

                                <a href="news/posts/first-grade-showcases-learning-through-dance.html"><img src="{{asset('assets/frontend/images/student5.jpg')}}"></a>

                                <a class="recent-blog-posts-title" href="#"></a>
                                <span class="recent-blog-posts-date-wrapper"><span class="recent-blog-posts-weekday">Thursday</span><span class="recent-blog-posts-date-separator">, </span><span class="recent-blog-posts-month">January</span><span class="recent-blog-posts-date"> 17</span><span class="recent-blog-posts-date-separator">, </span><span class="recent-blog-posts-year">2019</span></span>

                                <div class="recent-blog-posts-body"> American Lyceum first grade took the stage this morning and invited everyone in attendance on a trip around the world.

                                    As part of their Primary Years Programme (PYP) unit, the students have travele<span>...</span></div>

                                </li>

                            </ul>


                        </div>

                    </div>




                </div>

                <p class="tc"><a class="btn" href="#">View All News</a>
                </p></div>

                <div class="events w-50-ns w-100 pa4 relative z-1 animate-inview delay-3">
                    <h6 class="sans-serif tracked ttu tl mt0">Upcoming Events</h6>
                    <div class="event-container">

                        <div class="sw-public-page-part h-100">

                            <div id="ctl00_cphCustomSection3_public_partctrl_cphCustomSection3_1_matrixContent" class="matrix-content"><div class="home-calendar-v2-widget h-100 w-100 sans-serif relative  owl-carousel owl-theme" style="opacity: 1; display: block;">



                                <div class="owl-item" style="width: 607px;">
                                    <div class="first-item">



                                        <div class="item w-100 ">
                                            <div class="CalendarListEvent__header pa3  h-100 flex flex-row bb bw1 b--white-10">
                                                <div class="CalendarListEvent__header_date bg-orange invert flex flex-column justify-center tc mr3">
                                                    <div class="CalendarListEvent__header_date-month heading ttu lh-solid">March</div>
                                                    <div class="CalendarListEvent__header_date-date heading b f2 lh-solid">11</div>
                                                </div>
                                                <div class="text w-100 flex flex-column">
                                                    <h5 class="ma0 lh-title f4 dib pr3"><a href="#">Discipline Club</a></h5>
                                                    <div class="CalendarListEvent__date_time flex flex-column lh-expanded">
                                                        <span class="time flex flex-row"><span class="flex flex-column justify-center icon icon-clock white-50 mr2"></span> <span class="ttl">New Session Start</span></span>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="item w-100 ">
                                            <div class="CalendarListEvent__header pa3  h-100 flex flex-row bb bw1 b--white-10">
                                                <div class="CalendarListEvent__header_date bg-orange invert flex flex-column justify-center tc mr3">
                                                    <div class="CalendarListEvent__header_date-month heading ttu lh-solid">March</div>
                                                    <div class="CalendarListEvent__header_date-date heading b f2 lh-solid">15</div>
                                                </div>
                                                <div class="text w-100 flex flex-column">
                                                    <h5 class="ma0 lh-title f4 dib pr3"><a href="#">New Session Party Party  Theme
                                                    “Jashan-e-Baharan”</a></h5>
                                                    <div class="CalendarListEvent__date_time flex flex-column lh-expanded">
                                                        <span class="time flex flex-row"><span class="flex flex-column justify-center icon icon-clock white-50 mr2"></span> <span class="ttl">Green Club</span></span>
                                                        <span class="location flex flex-row lh-title"><span class="flex flex-column justify-center icon icon-map-pin white-50 mr2"></span> <span>American Lyceum</span></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="item w-100 ">
                                            <div class="CalendarListEvent__header pa3  h-100 flex flex-row bb bw1 b--white-10">
                                                <div class="CalendarListEvent__header_date bg-orange invert flex flex-column justify-center tc mr3">
                                                    <div class="CalendarListEvent__header_date-month heading ttu lh-solid">March</div>
                                                    <div class="CalendarListEvent__header_date-date heading b f2 lh-solid">22</div>
                                                </div>
                                                <div class="text w-100 flex flex-column">
                                                    <h5 class="ma0 lh-title f4 dib pr3"><a href="#">Pakistan Day
                                                        Special Assembly
                                                        Calligraphy contest
                                                    (Gr 4-O’level)</a></h5>
                                                    <div class="CalendarListEvent__date_time flex flex-column lh-expanded">
                                                        <span class="time flex flex-row"><span class="flex flex-column justify-center icon icon-clock white-50 mr2"></span> <span class="ttl">Activity Club</span></span>
                                                        <span class="location flex flex-row lh-title"><span class="flex flex-column justify-center icon icon-map-pin white-50 mr2"></span> <span>American Lyceum</span></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="item w-100 ">
                                            <div class="CalendarListEvent__header pa3  h-100 flex flex-row bb bw1 b--white-10">
                                                <div class="CalendarListEvent__header_date bg-orange invert flex flex-column justify-center tc mr3">
                                                    <div class="CalendarListEvent__header_date-month heading ttu lh-solid">March</div>
                                                    <div class="CalendarListEvent__header_date-date heading b f2 lh-solid">29</div>
                                                </div>
                                                <div class="text w-100 flex flex-column">
                                                    <h5 class="ma0 lh-title f4 dib pr3"><a href="#">Vegetable Party

                                                        Urdu Debates
                                                    </a></h5>
                                                    <div class="CalendarListEvent__date_time flex flex-column lh-expanded">
                                                        <span class="time flex flex-row"><span class="flex flex-column justify-center icon icon-clock white-50 mr2"></span> <span class="ttl">Activity ClubDebate & Spoken Club
                                                        </span></span>
                                                        <span class="location flex flex-row lh-title"><span class="flex flex-column justify-center icon icon-map-pin white-50 mr2"></span> <span>American Lyceum</span></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="item w-100 ">
                                            <div class="CalendarListEvent__header pa3  h-100 flex flex-row bb bw1 b--white-10">
                                                <div class="CalendarListEvent__header_date bg-orange invert flex flex-column justify-center tc mr3">
                                                    <div class="CalendarListEvent__header_date-month heading ttu lh-solid">April</div>
                                                    <div class="CalendarListEvent__header_date-date heading b f2 lh-solid">9</div>
                                                </div>
                                                <div class="text w-100 flex flex-column">
                                                    <h5 class="ma0 lh-title f4 dib pr3"><a href="#">World Health Day (week)</a></h5>
                                                    <div class="CalendarListEvent__date_time flex flex-column lh-expanded">
                                                        <span class="time flex flex-row"><span class="flex flex-column justify-center icon icon-clock white-50 mr2"></span> <span class="ttl">Canteen Club
                                                        </span></span>
                                                        <span class="location flex flex-row lh-title"><span class="flex flex-column justify-center icon icon-map-pin white-50 mr2"></span> <span>American Lyceum</span></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="owl-item active" style="width: 607px;">
                                    <div class="last-item">

                                        <div class="item w-100 ">
                                            <div class="CalendarListEvent__header pa3  h-100 flex flex-row bb bw1 b--white-10">
                                                <div class="CalendarListEvent__header_date bg-orange invert flex flex-column justify-center tc mr3">
                                                    <div class="CalendarListEvent__header_date-month heading ttu lh-solid">April</div>
                                                    <div class="CalendarListEvent__header_date-date heading b f2 lh-solid">10</div>
                                                </div>
                                                <div class="text w-100 flex flex-column">
                                                    <h5 class="ma0 lh-title f4 dib pr3"><a href="#">
                                                        Activity Club
                                                    </a></h5>
                                                    <div class="CalendarListEvent__date_time flex flex-column lh-expanded">
                                                        <span class="time flex flex-row"><span class="flex flex-column justify-center icon icon-clock white-50 mr2"></span> <span class="ttl">Activity Club</span></span>
                                                        <span class="location flex flex-row lh-title"><span class="flex flex-column justify-center icon icon-map-pin white-50 mr2"></span> <span>American Lyceum</span></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="item w-100 ">
                                            <div class="CalendarListEvent__header pa3  h-100 flex flex-row bb bw1 b--white-10">
                                                <div class="CalendarListEvent__header_date bg-orange invert flex flex-column justify-center tc mr3">
                                                    <div class="CalendarListEvent__header_date-month heading ttu lh-solid">April</div>
                                                    <div class="CalendarListEvent__header_date-date heading b f2 lh-solid">23</div>
                                                </div>
                                                <div class="text w-100 flex flex-column">
                                                    <h5 class="ma0 lh-title f4 dib pr3"><a href="#">Save Earth(Earth Week)</a></h5>
                                                    <div class="CalendarListEvent__date_time flex flex-column lh-expanded">
                                                        <span class="time flex flex-row"><span class="flex flex-column justify-center icon icon-clock white-50 mr2"></span>Green club<span class="ttl"></span></span>
                                                        <span class="location flex flex-row lh-title"><span class="flex flex-column justify-center icon icon-map-pin white-50 mr2"></span> <span>American Lyceum</span></span>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="item w-100 ">
                                            <div class="CalendarListEvent__header pa3  h-100 flex flex-row bb bw1 b--white-10">
                                                <div class="CalendarListEvent__header_date bg-orange invert flex flex-column justify-center tc mr3">
                                                    <div class="CalendarListEvent__header_date-month heading ttu lh-solid">Jan</div>
                                                    <div class="CalendarListEvent__header_date-date heading b f2 lh-solid">21</div>
                                                </div>
                                                <div class="text w-100 flex flex-column">

                                                    <div class="CalendarListEvent__date_time flex flex-column lh-expanded">

                                                        <span class="location flex flex-row lh-title"><span class="flex flex-column justify-center icon icon-map-pin white-50 mr2"></span> <span>American Lyceum</span></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="item w-100 ">
                                            <div class="CalendarListEvent__header pa3  h-100 flex flex-row bb bw1 b--white-10">
                                                <div class="CalendarListEvent__header_date bg-orange invert flex flex-column justify-center tc mr3">
                                                    <div class="CalendarListEvent__header_date-month heading ttu lh-solid">April</div>
                                                    <div class="CalendarListEvent__header_date-date heading b f2 lh-solid">26</div>
                                                </div>
                                                <div class="text w-100 flex flex-column">
                                                    <h5 class="ma0 lh-title f4 dib pr3"><a href="#">
                                                        Ice Cream party

                                                        Field Trip
                                                    </a></h5>
                                                    <div class="CalendarListEvent__date_time flex flex-column lh-expanded">
                                                        <span class="time flex flex-row"><span class="flex flex-column justify-center icon icon-clock white-50 mr2"></span> <span class="ttl">Activity Club</span></span>
                                                        <span class="location flex flex-row lh-title"><span class="flex flex-column justify-center icon icon-map-pin white-50 mr2"></span> <span>American Lyceum</span></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="item w-100 ">
                                            <div class="CalendarListEvent__header pa3  h-100 flex flex-row bb bw1 b--white-10">
                                                <div class="CalendarListEvent__header_date bg-orange invert flex flex-column justify-center tc mr3">
                                                    <div class="CalendarListEvent__header_date-month heading ttu lh-solid">May</div>
                                                    <div class="CalendarListEvent__header_date-date heading b f2 lh-solid">01</div>
                                                </div>
                                                <div class="text w-100 flex flex-column">
                                                    <h5 class="ma0 lh-title f4 dib pr3"><a href="#">Professional day</a></h5>
                                                    <div class="CalendarListEvent__date_time flex flex-column lh-expanded">
                                                        <span class="time flex flex-row"><span class="flex flex-column justify-center icon icon-clock white-50 mr2"></span> <span class="ttl">Activity Club</span></span>
                                                        <span class="location flex flex-row lh-title"><span class="flex flex-column justify-center icon icon-map-pin white-50 mr2"></span> <span>American Lyceum</span></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div></div>
                                </div>
                            </div>


                      <!--       <div class="owl-controls clickable"><div class="owl-pagination"><div class="owl-page"><span class=""></span></div><div class="owl-page active"><span class=""></span></div></div><div class="owl-buttons"><div class="owl-prev"></div><div class="owl-next"></div></div></div></div> -->


                        </div>
                        <input type="hidden" name="ctl00$cphCustomSection3$public_partctrl_cphCustomSection3_1$hfPagePartId" id="ctl00_cphCustomSection3_public_partctrl_cphCustomSection3_1_hfPagePartId" value="310938">
                    </div>
                </div>
            </p></div>
        </div>
    </div>
</section>
</div>
</div>
</section>
<style>
#video-foreground, .video-background iframe {
  position: absolute;

  zoom:1.5;
  width: 100%;

  height: 100%;
  pointer-events: none;
}
.home section.home-main .slider .owl-carousel .owl-wrapper-outer {
    min-height: 830px!important;
}
@media (min-aspect-ratio: 16/9) {
  #video-foreground { height: 400%; top: -100%;   zoom:1.3;}
}
@media (max-aspect-ratio: 16/9) {
  #video-foreground { width: 400%; left: -100%;   zoom:1.3;}
}
</style>
    <script>
 var player;
function onYouTubeIframeAPIReady() {
  player = new YT.Player('video-foreground', {
    videoId: '4R7_Q6T6rkM', // YouTube Video ID
    playerVars: {
      autoplay: 1,        // Auto-play the video on load
      controls: 0,        // Show pause/play buttons in player
      showinfo: 0,        // Hide the video title
      modestbranding: 1,  // Hide the Youtube Logo
      loop: 1,            // Run the video in a loop
      fs: 0,              // Hide the full screen button
      cc_load_policy: 0, // Hide closed captions
      iv_load_policy: 1,  // Hide the Video Annotations
      autohide: 0,         // Hide video controls when playing
      playlist: '4R7_Q6T6rkM'
    },
    events: {
      onReady: function(e) {
        e.target.mute();
      }
    }
  });
}
$(document).ready(function(e) {
  $('.sound').on('click', function(){
    $('#video-foreground').toggleClass('mute');
    $('.volume-icon').toggleClass('fa-volume-up', 'fa-volume-off');
    if($('#video-foreground').hasClass('mute')){
      player.mute();
    } else {
      player.unMute();
    }
  });
});
</script>
@endsection
@push('post-scripts')
@endpush
