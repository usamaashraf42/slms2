@extends('_layouts.web.pakistan.default')
@section('content')
<style type="text/css">
    .swRotator .scrollable .items .item .caption{
        margin-left: 33%;
        margin-bottom:10px; 
    }
    body, html {
    height: 100%;
}


.img-container {
  position: relative;
  text-align: center;
  color: white;
  width: 100%;
}

/* Centered text */
.centered {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
}
</style>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <div class="img-container">
        <img src="{{asset('images/web/summer.jpg')}}" alt="Snow" >
        <div class="centered" >
            <h5 style="color: white"> Please Select Country for Summer Camp Registration</h5>

            <a class="btn" href="{{route('omanRegister')}}" style="padding: 10px 16px;font-size: 16px;line-height: 1.33;border-radius: 35px;background-color: #FFCB05">USA</a>
            <a class="btn" href="{{route('pakistanRegister')}}" style="padding: 10px 16px;font-size: 16px;line-height: 1.33;border-radius: 35px;background-color: #FFCB05">Pakistan</a>
            <a class="btn" href="{{route('omanRegister')}}" style="padding: 10px 16px;font-size: 16px;line-height: 1.33;border-radius: 35px;background-color: #FFCB05">Oman</a>
            <a class="btn" href="{{route('omanRegister')}}" style="padding: 10px 16px;font-size: 16px;line-height: 1.33;border-radius: 35px;background-color: #FFCB05">UK</a>
        </div>
    </div>
    

<section class="default-main content-start relative bg-white">
    <div class="breadcrumb-container w-100 pa3 pv2-ns ph4-ns relative">
        <ul id="breadcrumb"><li id="bc-home"> <a href="#" class="first"></a></li><li id="bc-admissions"> <a href="#">Summer Camp Plans</a></li><li id="bc-meet-our-team"> <a href="#" class="current">Detail</a></li></ul>
        <div id="ctl00_cphBreadCrumb_BreadcrumbMenu1_pnlControls">
        </div>
    </div>
    <div class="row summerCampPlan">
        <div class="container" style="align-content: center;text-align: center">
            <h2>Summer Camp Plan</h2>
            <span style="color: red">Select for Registration in following countries </span><br>
            <a class="btn" href="{{route('omanRegister')}}" style="padding: 10px 16px;font-size: 16px;line-height: 1.33;border-radius: 35px;background-color: #FFCB05">USA</a>
            <a class="btn" href="{{route('pakistanRegister')}}" style="padding: 10px 16px;font-size: 16px;line-height: 1.33;border-radius: 35px;background-color: #FFCB05">Pakistan</a>
            <a class="btn" href="{{route('omanRegister')}}" style="padding: 10px 16px;font-size: 16px;line-height: 1.33;border-radius: 35px;background-color: #FFCB05">Oman</a>
            <a class="btn" href="{{route('omanRegister')}}" style="padding: 10px 16px;font-size: 16px;line-height: 1.33;border-radius: 35px;background-color: #FFCB05">UK</a>
        </div>
        <div class="container">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <img src="{{asset('images/web/SummerCampBrochure.png')}}">
                {{-- <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item active">
                        <a class="nav-link " id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home"
                        aria-selected="true">PAKISTAN</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">OMAN</a>
                    </li>

                </ul> --}}
            </div>
            <div class="col-md-2"></div>
        </div> 
         <div class="container" style="align-content: center;text-align: center">
            <h5>Select for Registration in following countries </h5>
             
            <a class="btn" href="{{route('omanRegister')}}" style="padding: 10px 16px;font-size: 16px;line-height: 1.33;border-radius: 35px;background-color: #FFCB05">USA</a>
            <a class="btn" href="{{route('pakistanRegister')}}" style="padding: 10px 16px;font-size: 16px;line-height: 1.33;border-radius: 35px;background-color: #FFCB05">Pakistan</a>
            <a class="btn" href="{{route('omanRegister')}}" style="padding: 10px 16px;font-size: 16px;line-height: 1.33;border-radius: 35px;background-color: #FFCB05">Oman</a>
            <a class="btn" href="{{route('omanRegister')}}" style="padding: 10px 16px;font-size: 16px;line-height: 1.33;border-radius: 35px;background-color: #FFCB05">UK</a>
        </div>
        
        
    </div>

    {{-- <div class="tab-content" id="myTabContent">
      <div class="tab-pane  active " id="home" role="tabpanel" aria-labelledby="home-tab"><!-- Card -->

        <!-- ////////////////////ROBOT Card start here?//////////////// -->
        <div class="col-md-4">
            <!-- ////////////////////////////? -->
            <div class="card card-price">
                <div class="card-img">
                    <a href="#">
                      <img src="{{asset('images/web/robotics.png')}}" class="img-responsive">
                        <!-- <div class="card-caption">
                            <span class="h2">Many Items</span>
                            <p>Gluten free</p>
                        </div> -->
                    </a>
                </div>
                <div class="card-body">
                    <div class="lead">Robotics and Coding Lab</div>
                    <p class="details">
                      At the completion of this course, students will be able to understand and program a basic  LEGO ™  robot.  At the end of the course the students will participate in the coding contest and prizes will be given to the top performers.
                  </p>
                  <table class="table">
                    <tr><td>Duration </td><td class="note">6 weeks. </td></tr>
                    <tr><td>Weekly Classes</td><td class="note">three classes</td></tr>
                    <tr><td>Age </td><td class="note">3 years  to 16 years (preschool to O Levels ) Different age groups will be made.  </td></tr>
                    <tr><td>Fee </td><td class="note">Rs. 7000/-  for Lyceonians  Rs. 4000/- </td></tr>
                    <tr><td>Branches offering  </td><td class="note">Premier (DHA EME), Township, Wapda Town, Gulshan e Ravi.  </td></tr>
                    <tr><td>Course Contents:  </td><td class="note">  • Introduction to robotics
                        •   Programing of basic robot. 
                        •   Coding 
                        •   Making an app. 
                        •   Basic programming skills. 
                        •   Designing an app.
                    </td></tr>
                </table>
                  <!-- <a href="#" class="btn btn-primary btn-lg btn-block buy-now">
                      More Detail <span class="glyphicon glyphicon-triangle-right"></span>
                  </a> -->
              </div>
          </div>
          <!-- Card -->
      </div>
      <!-- ?????////////////////// Card end here///////////////// -->
      <div class="col-md-4">
        <!-- ////////////////////////////? -->
        <div class="card card-price">
            <div class="card-img">
                <a href="#">
                  <img src="{{asset('images/web/Speaking.jpg')}}" class="img-responsive">
                        <!-- <div class="card-caption">
                            <span class="h2">Many Items</span>
                            <p>Gluten free</p>
                        </div> -->
                    </a>
                </div>
                <div class="card-body">
                    <div class="lead">Public Speaking, Hyde Park</div>
                    <p class="details">
                      At the completion of this course, students will be able to speak in public with confidence. At the end of the course the students will participate in the declamation contest and prizes will be given to the top performers.
                  </p>
                  <table class="table">
                    <tr><td>Duration </td><td class="note">6 weeks. </td></tr>
                    <tr><td>Weekly Classes</td><td class="note">three classes</td></tr>
                    <tr><td>Age </td><td class="note">8 years  to 16 years (Grade 2 to O Levels ) Different age groups will be made.  </td></tr>
                    <tr><td>Fee </td><td class="note">Rs. 6000/-  for Lyceonians  Rs. 4000/-  </td></tr>
                    <tr><td>Branches offering  </td><td class="note">Premier (DHA EME), Township, Wapda Town, Gulshan e Ravi.  </td></tr>
                    <tr><td>Course Contents:  </td><td class="note">  •    How to prepare for public speaking. 
                        •   Creating a powerful structure. 
                        •   Using your voice effectively: diction, intonation, rhythm and pacing. 
                        •   Strategies for building confidence and combating anxiety. 

                    </td></tr>
                </table>

            </div>
        </div>
        <!-- Card -->
    </div>
    <!-- //////////////////////////// Public speeking  card end here///////// -->
    <div class="col-md-4">
        <!-- ////////////////////////////? -->
        <div class="card card-price">
            <div class="card-img">
                <a href="#">
                  <img src="{{asset('images/web/Creativity.jpg')}}" class="img-responsive">
                        <!-- <div class="card-caption">
                            <span class="h2">Many Items</span>
                            <p>Gluten free</p>
                        </div> -->
                    </a>
                </div>
                <div class="card-body">
                    <div class="lead">Creative Writing Summer Clinic</div>
                    <p class="details">
                      At the completion of this course, students will be able to write a creative writing content according to their age group with full understanding of the topic.  At the end of the course the students will participate in the writing contest and prizes will be given to the top performers. 

                  </p>
                  <table class="table">
                    <tr><td>Duration </td><td class="note">6 weeks. </td></tr>
                    <tr><td>Weekly Classes</td><td class="note">three classes</td></tr>
                    <tr><td>Age </td><td class="note">6 years  to 16 years (Grade 1 to O Levels ) Different age groups will be made.   </td></tr>
                    <tr><td>Fee </td><td class="note">Rs. 4000/-  for Lyceonians  Rs. 2000/-   </td></tr>
                    <tr><td>Branches offering  </td><td class="note">All.  </td></tr>
                    <tr><td>Course Contents:  </td><td class="note">  •    What is creative Writing. 
                        •   Types of creative Writing
                        •   Examples of creative writing. 
                        •   How to write a strong personal essay
                        •   Creative thinking. 
                        •   Elements of character, plot, setting, symbolism. 


                    </td></tr>
                </table>

            </div>
        </div>
        <!-- Card -->
    </div>
    <!-- ////////////////////////////3- Creative Writing Summer Clinic///////// -->
    <div class="col-md-2"></div>
    <div class="col-md-4">
        <!-- ////////////////////////////? -->
        <div class="card card-price">
            <div class="card-img">
                <a href="#">
                  <img src="{{asset('images/web/math.jpg')}}" class="img-responsive">
                        <!-- <div class="card-caption">
                            <span class="h2">Many Items</span>
                            <p>Gluten free</p>
                        </div> -->
                    </a>
                </div>
                <div class="card-body">
                    <div class="lead">Maths Concepts Camp ( All Grades)</div>
                    <p class="details">
                       The maths concepts will be strengthened and the students will be prepared for the higher level of maths understanding .  

                   </p>
                   <table class="table">
                    <tr><td>Duration </td><td class="note">6 weeks. </td></tr>
                    <tr><td>Weekly Classes</td><td class="note">four classes</td></tr>
                    <tr><td>Age </td><td class="note">3 years  to 16 years (preschool to O Levels ) Different age groups will be made.    </td></tr>
                    <tr><td>Fee </td><td class="note">Rs. 7000/-  for Lyceonians  Rs. 5000/-  </td></tr>
                    <tr><td>Branches offering  </td><td class="note">All.  </td></tr>
                    <tr><td>Course Contents:  </td><td class="note"> •    MAths problem solving. 
                        •   Interest for maths
                        •   Maths curriculum concepts clearing. 



                    </td></tr>
                </table>

            </div>
        </div>
        <!-- Card -->
    </div>
    <!-- ////////////////////////////3- Math concept Writing Summer Clinic///////// -->


    <div class="col-md-4">
        <!-- ////////////////////////////? -->
        <div class="card card-price">
            <div class="card-img">
                <a href="#">
                  <img src="{{asset('images/web/kidling.jpg')}}" class="img-responsive">
                        <!-- <div class="card-caption">
                            <span class="h2">Many Items</span>
                            <p>Gluten free</p>
                        </div> -->
                    </a>
                </div>
                <div class="card-body">
                    <div class="lead">Kiddling Summer Camp and Homework  ( Preschoolers and Junior Grades)</div>
                    <p class="details">
                      Students will be given the exposure to different activities and they will be facilitated to do vacation homework and will have the good idea about the key details mentioned. 

                  </p>
                  <table class="table">
                    <tr><td>Duration </td><td class="note">6 weeks. </td></tr>
                    <tr><td>Weekly Classes</td><td class="note">five classes</td></tr>
                    <tr><td>Age </td><td class="note">3 years  to 16 years (preschool to O Levels ) Different age groups will be made.    </td></tr>
                    <tr><td>Fee </td><td class="note">Rs. 8000/-  for Lyceonians  Rs. 6000/- </td></tr>
                    <tr><td>Branches offering  </td><td class="note">All.  </td></tr>
                    <tr><td>Course Contents:  </td><td class="note">•   Vacation work. 
                        •   Splash day
                        •   Story time
                        •   Movie day
                        •   Baking practice
                        •   Creative writing. 
                        •   Public speaking
                        •   Robotics




                    </td></tr>
                </table>

            </div>
        </div>
        <!-- Card -->
    </div>
    <!-- ////////////////////////////3- Creative Writing Summer Clinic/////////  -->
    <div class="col-md-2"></div>

</div>
<div class="tab-pane" id="profile" role="tabpanel" aria-labelledby="profile-tab">
    <!-- ?????////////////////// Card end here///////////////// -->
      <div class="col-md-4">
        <!-- ////////////////////////////? -->
        <div class="card card-price">
            <div class="card-img">
                <a href="#">
                  <img src="{{asset('images/web/Speaking.jpg')}}" class="img-responsive">
                        <!-- <div class="card-caption">
                            <span class="h2">Many Items</span>
                            <p>Gluten free</p>
                        </div> -->
                    </a>
                </div>
                <div class="card-body">
                    <div class="lead">Public Speaking, Hyde Park</div>
                    <p class="details">
                      At the completion of this course, students will be able to speak in public with confidence. At the end of the course the students will participate in the declamation contest and prizes will be given to the top performers.
                  </p>
                  <table class="table">
                    <tr><td>Duration </td><td class="note">6 weeks. </td></tr>
                    <tr><td>Weekly Classes</td><td class="note">three classes</td></tr>
                    <tr><td>Age </td><td class="note">4 years  to 16 years Different age groups will be made.  </td></tr>
                    <tr><td>Fee </td><td class="note">OMR. 180/-  for Lyceonians OMR. 150</td></tr>
                    <tr><td>Course Contents:  </td><td class="note">  •  How to prepare for public speaking. 
                        •   Creating a powerful structure. 
                        •   Using your voice effectively: diction, intonation, rhythm and pacing. 
                        •   Strategies for building confidence and combating anxiety. 

                    </td></tr>
                </table>

            </div>
        </div>
        <!-- Card -->
    </div>
    <!-- //////////////////////////// Public speeking  card end here///////// -->
    <!-- ////////////////////ROBOT Card start here?//////////////// -->
        <div class="col-md-4">
            <!-- ////////////////////////////? -->
            <div class="card card-price">
                <div class="card-img">
                    <a href="#">
                      <img src="{{asset('images/web/robotics.png')}}" class="img-responsive">
                        <!-- <div class="card-caption">
                            <span class="h2">Many Items</span>
                            <p>Gluten free</p>
                        </div> -->
                    </a>
                </div>
                <div class="card-body">
                    <div class="lead">Robotics and Coding Lab</div>
                    <p class="details">
                      At the completion of this course, students will be able to understand and program a basic  LEGO ™  robot.  At the end of the course the students will participate in the coding contest and prizes will be given to the top performers.
                  </p>
                  <table class="table">
                    <tr><td>Duration </td><td class="note">6 weeks. </td></tr>
                    <tr><td>Weekly Classes</td><td class="note">three classes</td></tr>
                    <tr><td>Age </td><td class="note"> 3 years  to 16 years Different age groups will be made. </td></tr>
                    <tr><td>Fee </td><td class="note">OMR. 210/-  for Lyceonians OMR. 180 </td></tr>
                    <tr><td>Course Contents:  </td><td class="note">  • Introduction to robotics
                        •   Programing of basic robot. 
                        •   Coding 
                        •   Making an app. 
                        •   Basic programming skills. 
                        •   Designing an app.
                    </td></tr>
                </table>
                  <!-- <a href="#" class="btn btn-primary btn-lg btn-block buy-now">
                      More Detail <span class="glyphicon glyphicon-triangle-right"></span>
                  </a> -->
              </div>
          </div>
          <!-- Card -->
      </div>
      <!-- ?????////////////////// Card end here///////////////// -->
      <div class="col-md-4">
        <!-- ////////////////////////////? -->
        <div class="card card-price">
            <div class="card-img">
                <a href="#">
                  <img src="{{asset('images/web/kidling.jpg')}}" class="img-responsive">
                        <!-- <div class="card-caption">
                            <span class="h2">Many Items</span>
                            <p>Gluten free</p>
                        </div> -->
                    </a>
                </div>
                <div class="card-body">
                    <div class="lead">Kiddling Summer Camp and Homework  ( Preschoolers and Junior Grades)</div>
                    <p class="details">
                      Students will be given the exposure to different activities and they will be facilitated to do vacation homework and will have the good idea about the key details mentioned.

                  </p>
                  <table class="table">
                    <tr><td>Duration </td><td class="note"> 10 weeks.  </td></tr>
                    <tr><td>Age </td><td class="note"> 3 years  to 16 years (preschool to O Levels ) Different age groups will be made.     </td></tr>
                    <tr><td>Fee </td><td class="note">OMR. 300/-  for Lyceonians OMR. 250 </td></tr>
                    <tr><td>Course Contents:  </td><td class="note">•   Swimming
                        •   Aerobics/Yoga/Karate
                        •   Gymnasium
                        •   Art & Craft
                        •   Splash day
                        •   Story time 
                        •   Movie day
                        •   Baking /cooking
                        •   Public speaking
                        •   Robotics
                        •   Day outs
                        •   Origami and pottery  
                    </td></tr>
                </table>

            </div>
        </div>
        <!-- Card -->
    </div>
    <!-- ////////////////////////////3- Creative Writing Summer Clinic/////////  -->

</div>

</div> --}}







</section>

<style type="text/css">
   /* === card component ====== 
 * Variation of the panel component
 * version 2018.10.30
 * https://codepen.io/jstneg/pen/EVKYZj
 */
 .card{ background-color: #fff; border: 1px solid transparent; border-radius: 6px; }
 .card > .card-link{ color: #333; }
 .card > .card-link:hover{  text-decoration: none; }
 .card > .card-link .card-img img{ border-radius: 6px 6px 0 0; }
 .card .card-img{ position: relative; padding: 0; display: table; }
 .card .card-img .card-caption{
  position: absolute;
  right: 0;
  bottom: 16px;
  left: 0;
}
.card .card-body{ display: table; width: 100%; padding: 12px; }
.card .card-header{ border-radius: 6px 6px 0 0; padding: 8px; }
.card .card-footer{ border-radius: 0 0 6px 6px; padding: 8px; }
.card .card-left{ position: relative; float: left; padding: 0 0 8px 0; }
.card .card-right{ position: relative; float: left; padding: 8px 0 0 0; }
.card .card-body h1:first-child,
.card .card-body h2:first-child,
.card .card-body h3:first-child, 
.card .card-body h4:first-child,
.card .card-body .h1,
.card .card-body .h2,
.card .card-body .h3, 
.card .card-body .h4{ margin-top: 0; }
.card .card-body .heading{ display: block;  }
.card .card-body .heading:last-child{ margin-bottom: 0; }

.card .card-body .lead{ text-align: center; }

@media( min-width: 768px ){
  .card .card-left{ float: left; padding: 0 8px 0 0; }
  .card .card-right{ float: left; padding: 0 0 0 8px; }

  .card .card-4-8 .card-left{ width: 33.33333333%; }
  .card .card-4-8 .card-right{ width: 66.66666667%; }

  .card .card-5-7 .card-left{ width: 41.66666667%; }
  .card .card-5-7 .card-right{ width: 58.33333333%; }
  
  .card .card-6-6 .card-left{ width: 50%; }
  .card .card-6-6 .card-right{ width: 50%; }
  
  .card .card-7-5 .card-left{ width: 58.33333333%; }
  .card .card-7-5 .card-right{ width: 41.66666667%; }
  
  .card .card-8-4 .card-left{ width: 66.66666667%; }
  .card .card-8-4 .card-right{ width: 33.33333333%; }
}

/* -- default theme ------ */
.card-default{ 
  border-color: #ddd;
  background-color: #fff;
  margin-bottom: 24px;
}
.card-default > .card-header,
.card-default > .card-footer{ color: #333; background-color: #ddd; }
.card-default > .card-header{ border-bottom: 1px solid #ddd; padding: 8px; }
.card-default > .card-footer{ border-top: 1px solid #ddd; padding: 8px; }
.card-default > .card-body{  }
.card-default > .card-img:first-child img{ border-radius: 6px 6px 0 0; }
.card-default > .card-left{ padding-right: 4px; }
.card-default > .card-right{ padding-left: 4px; }
.card-default p:last-child{ margin-bottom: 0; }
.card-default .card-caption { color: #fff; text-align: center; text-transform: uppercase; }


/* -- price theme ------ */
.card-price{ border-color: #999; background-color: #ededed; margin-bottom: 24px; }
.card-price > .card-heading,
.card-price > .card-footer{ color: #333; background-color: #fdfdfd; }
.card-price > .card-heading{ border-bottom: 1px solid #ddd; padding: 8px; }
.card-price > .card-footer{ border-top: 1px solid #ddd; padding: 8px; }
.card-price > .card-img:first-child img{ border-radius: 6px 6px 0 0; }
.card-price > .card-left{ padding-right: 4px; }
.card-price > .card-right{ padding-left: 4px; }
.card-price .card-caption { color: #fff; text-align: center; text-transform: uppercase; }
.card-price p:last-child{ margin-bottom: 0; }

.card-price .price{ 
  text-align: center; 
  color: #337ab7; 
  font-size: 3em; 
  text-transform: uppercase;
  line-height: 0.7em; 
  margin: 24px 0 16px;
}
.card-price .price small{ font-size: 0.4em; color: #66a5da; }
.card-price .details{ list-style: none; margin-bottom: 24px; padding: 0 18px; }
.card-price .details li{ text-align: center; margin-bottom: 8px; }
.card-price .buy-now{ text-transform: uppercase; }
.card-price table .price{ font-size: 1.2em; font-weight: 700; text-align: left; }
.card-price table .note{ color: #666; font-size: 0.8em; }
</style>
<script type="text/javascript">
 function explode(){
    console.log('again');
    $('html, body').animate({
      scrollTop: $("div.summerCampPlan").offset().top
    }, 3000)
  }


   setTimeout(explode, 3000);

</script>
@endsection