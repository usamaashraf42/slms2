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

    <title> @yield('title','Admission Fee Deposit') - American Lyceum Group of School</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="{{asset('web/muscat/styles/style_1.css')}}">


    <link href='https://fonts.googleapis.com/css?family=Lato:400,700,800' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Alegreya+Sans:700,900' rel='stylesheet' type='text/css'>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    @show
    @stack('post-styles')

    <script type="text/javascript">
      var BASE_URL = "{{ url('/')}}";
    </script>
    <style>
      .blog-preview img{ width: 100%!important;
        height: 300px;
      }

      .about_us .about_us_text p {
        line-height: 1.929;
        margin-bottom: 35px;
      }
      h2, .btn, .btn-primary, .owl-theme .owl-dots .owl-dot span, .owl-theme .owl-dots .owl-dot span:before, .owl-theme .owl-dots .owl-dot.active span, .owl-theme .owl-dots .owl-dot:hover span, .owl-prev, .owl-next, .pager li>a:hover, .social-media a i, .back-to-top i:hover, .pagination>li>a:hover, .pagination>li>a:focus, .pager li > a:hover, .pager li > a:focus, .navbar-brand-centered:hover, .navbar-brand-centered:focus, .navbar-toggle:focus, .navbar-toggle:active, .navbar-toggle:hover, .navbar-custom ul.nav li a:hover, .navbar-custom .nav > .active > a, .navbar-custom ul.nav ul.dropdown-menu li a:hover, .navbar-custom ul.nav ul.dropdown-menu li a:focus, .nav .open>a, .nav .open>a:focus, .nav .open>a:hover, .pagination>.active>a, .pagination>.active>a:focus, .nav-pills>li.active>a, .nav.nav-pills > li > a:focus, .nav.nav-pills > li > a:hover, .nav.nav-pills > li > .active, .nav.nav-tabs>li>a:hover, .nav.nav-tabs > li.active > a:hover, .nav.nav-tabs > li.active > a:focus, .nav.nav-tabs>li.active>a, .pricing-item:hover .pricing-deco, .blog-tags a:hover {
        background-color: #e6383d!important;
      }
      .quote-test {
        margin-top: 10px;
        /* padding: 24px; */
        text-align: left!important;
        font-family: sans-serif;
        color: #ccc;
      }
      .img_bx {
        border: 2px solid #353794;
      }
      .gallery-thumb {
        display: block;
        position: relative;
        overflow: hidden;
        border-radius: 25%;
        box-shadow: 6px 6px 0px rgba(103, 102, 102, 0.2);
      }
      .gallery-thumb .overlay-mask {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        opacity: 0;
        z-index: 1;
        border-radius: 22%!important;
        transition: opacity .3s ease-out;
      }
      .service:hover h4, .open>.dropdown-toggle.btn-primary:focus, .open>.dropdown-toggle.btn-primary:hover, .team-item .team-caption, .navbar-custom ul.nav ul.dropdown-menu li a, .panel-heading a, .panel-heading a:hover, .nav-pills .nav > li > a:focus, .navbar-brand-centered, .navbar-header, .btn:hover, .btn:focus, .btn-primary:hover, .btn-primary:focus, .navbar-collapse, .owl-prev:hover, .owl-next:hover, .back-to-top i, #instafeed .likes, .social-media a i:hover, .blog-tags a, .date-category, .dropdown-menu>li>a:focus, .dropdown-menu>li>a:hover {
        background-color: #f5f5f5;
      }
      .shade_er{
        border: 1px solid #ccc;
        margin-bottom: 8px;
        box-shadow: 2px 0px 5px #ccc;
        min-height: 350px;
      }
      .navbar-brand-centered {
        border-radius: 0 0 50% 50%;
        max-height: 100px;
        left: 0;
        right: 0;
        top: 0%;
        padding: 80px 65px!important;

        border: 4px solid #353794;  margin: auto;
        position: absolute;
        width: 160px;
        transition: all .2s ease-in-out;
      }
      .navbar-brand-centered img {
        max-height: 118px;
        position: absolute;
        left: 0;
        right: 0;
        top: 5%;
        margin: auto;
      }
      .quote-test p {
        font-size: 16px;
        display: inline;
      }
      h2:before, #about .media i:hover, footer i, .smaller.social-media a i:hover, footer a, .post-info i, .breadcrumb>.active, .gallery-thumb i:hover {
        color: #34327c;
        background: #c1c1c1;
        display: none!important;
      }
      @media (max-width: 576px) {
        /* line 53, ../../01 cl html template/03_jun 2019/182_medico_html/sass/_about_us.scss */
        .about_us .about_us_text p {
          margin-bottom: 10px;
        }
      }

      @media only screen and (min-width: 576px) and (max-width: 767px) {
        /* line 53, ../../01 cl html template/03_jun 2019/182_medico_html/sass/_about_us.scss */
        .about_us .about_us_text p {
          margin-bottom: 20px;
        }
      }

      @media only screen and (min-width: 768px) and (max-width: 991px) {
        /* line 53, ../../01 cl html template/03_jun 2019/182_medico_html/sass/_about_us.scss */
        .about_us .about_us_text p {
          margin-bottom: 20px;
        }
      }

      /* line 68, ../../01 cl html template/03_jun 2019/182_medico_html/sass/_about_us.scss */
      .about_us .about_us_text ul {
        list-style: none;
        padding: 0;
        margin: 0;
        margin-bottom: 30px;
      }

      @media (max-width: 576px) {
        /* line 68, ../../01 cl html template/03_jun 2019/182_medico_html/sass/_about_us.scss */
        .about_us .about_us_text ul {
          margin-bottom: 10px;
        }
      }

      @media only screen and (min-width: 576px) and (max-width: 767px) {
        /* line 68, ../../01 cl html template/03_jun 2019/182_medico_html/sass/_about_us.scss */
        .about_us .about_us_text ul {
          margin-bottom: 20px;
        }
      }

      @media only screen and (min-width: 768px) and (max-width: 991px) {
        /* line 68, ../../01 cl html template/03_jun 2019/182_medico_html/sass/_about_us.scss */
        .about_us .about_us_text ul {
          margin-bottom: 20px;
        }
      }

      /* line 88, ../../01 cl html template/03_jun 2019/182_medico_html/sass/_about_us.scss */
      .about_us .about_us_text ul li {
        display: inline-block;
        margin-bottom: 20px;
        font-size: 16px;
        padding-right: 33px;
        padding-top: 12px;
        color: #242429;
        width: 50%;
        float: left;
        font-family: "Playfair Display", serif;
        position: relative;
        padding-left: 29px;
      }

      @media (max-width: 991px) {
        /* line 88, ../../01 cl html template/03_jun 2019/182_medico_html/sass/_about_us.scss */
        .about_us .about_us_text ul li {
          padding-top: 5px;
          padding-right: 15px;
        }
      }

      /* line 106, ../../01 cl html template/03_jun 2019/182_medico_html/sass/_about_us.scss */
      .about_us .about_us_text ul li span {
        margin-right: 10px;
        color: #0065e1;
        position: absolute;
        top: 16px;
        left: 0;
      }

      @media (max-width: 991px) {
        /* line 106, ../../01 cl html template/03_jun 2019/182_medico_html/sass/_about_us.scss */
        .about_us .about_us_text ul li span {
          top: 10px;
        }
      }

      /* line 120, ../../01 cl html template/03_jun 2019/182_medico_html/sass/_about_us.scss */
      .about_us .about_us_text .btn_2 {
        margin-top: 13px;
      }
      h3 {
        font-family: 'Alegreya sans',serif;
        color: #e6383d!important
        font-weight: 800;
        font-size: 46px;
        margin-top: 0px;
        position: relative;
      }
      .blog-preview {
        position: relative;
        float: left;
        overflow: hidden;
        margin: 10px 1%;
        min-height: 270px;
      }
      .blog-preview p{
        text-align: justify;
      }
      .nav.nav-tabs > li > a {

        color: #fff !important;
        font-size: 18px!important;
      }
      .img-circle {
        box-shadow: 6px 6px 0px rgba(103, 102, 102, 0.2);
        height: 286px!important;
      }
      .blog-preview img{ width: 100%!important;
        height: 280px;
      }
      .images_boxs{
        margin: 30px;
      }
      .media-body p{
        min-height: 225px;
        padding: 10px;
      }
      .images_boxs img{
       width: 90%;
     }
     .navbar-custom ul.nav li a {
      font-size: 15px!important;
      text-align: center;
      transition: background .2s ease-in-out;
      font-family: 'Lato',sans-serif;
      color: #fff;
      letter-spacing: 0.2px;
      font-weight: 600;
      background: transparent;
    }
    .social_1{
      width: 40px;
      height: 40px;
      display: inline-block;
    }
    .social_1 img{ width: 100%;
     border-radius: 50px;

   }
   .navbar-custom ul.nav li a {
    font-size: 23px!important;
    text-align: center;
    transition: background .2s ease-in-out;
    font-family: 'Lato',sans-serif;
    color: #fff;
    letter-spacing: 0.2px;
    font-weight: 600;
    background: transparent;
  }
  .navbar-nav > li > a {
    line-height: 58px;
    padding: 8px 16px;
    transition: background .2s ease-in-out;
  }
  .slide1 img{
    max-height:550px;
    border: 25px solid #353794;
    border-radius: 5px;
  }
  .slide1 :hover{
    transform: scale(1.1); 
  }
  .form-control {
    display: block;
    width: 100%;
    height: 40px;
    border: 1px solid #000;
    font-size: 15px;
    outline: 0;
    box-shadow: none;
    background: #fff;
    border-radius: 10px;
    margin-top: 15px;
    padding: 4px 15px;
  }
  #layerslider {
    padding-top: 75px;
    border-bottom: 2px dashed;
    width: 100% !important;
    height: 531px!important;
  }
/**
 * The CSS shown here will not be introduced in the Quickstart guide, but shows
 * how you can use CSS to style your Element's container.
 */
 .StripeElement {
  box-sizing: border-box;

  height: 40px;

  padding: 10px 12px;

  border: 1px solid transparent;
  border-radius: 4px;
  background-color: white;

  box-shadow: 0 1px 3px 0 #e6ebf1;
  -webkit-transition: box-shadow 150ms ease;
  transition: box-shadow 150ms ease;
}

.StripeElement--focus {
  box-shadow: 0 1px 3px 0 #cfd7df;
}

.StripeElement--invalid {
  border-color: #fa755a;
}

.StripeElement--webkit-autofill {
  background-color: #fefde5 !important;
}
</style>

</head>
<body id="page-top" data-spy="scroll" data-target=".navbar-custom" style="overflow-x: hidden;">
 <div class="full">

  <nav class="navbar navbar-custom navbar-fixed-top" >
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-brand-centered">
       <i class="fa fa-bars"></i>
     </button>
     <div class="navbar-brand-centered page-scroll">
       <a href="#page-top"><img src="{{asset('web/muscat/img/logo.png')}}"  alt=""></a>
     </div>
   </div>
   <div class="collapse navbar-collapse" id="navbar-brand-centered" style="background-color: #353794!important;">
    <div class="container">
     <ul class="nav navbar-nav page-scroll navbar-left">
       <li><a href="{{route('muscat.nursery')}}">Home</a></li>

     </ul>
     <ul class="nav navbar-nav page-scroll navbar-right">


      <li><a href="{{route('muscat.admission')}}" style="width: 120px; font-size: 18px;">Admission</a></li>

    </ul>
  </div>
</div>
</nav>
<div class="container">
  <div class="col-md-12" style="text-align: center;">
   <h2 style="padding: 25px 28px;">Verify</h2>
 </div>
</div>

<div class="container" style="margin-top: 40px; border: 1px solid #ccc;padding-top: 20px;">
  @component('_components.alerts-default')
  @endcomponent

  <h2 >1 OMR ={{currencyCnv(1,'OMR','USD')}} Dollar</h2>
  <div class="panel-body" style="border:1px solid #ccc; margin-bottom: 20px;">


    <!-- //////////////////???????????????????? start ????????????????????????????????? -->
    <div class="row" >
      <div class="col-md-6">
        <div class="receipt-right" style="text-align: center;">
          <div class="box_filed"> <h4><b style="color:red">{{$admission->name}}</b></h4>  </div>
          <div class="box_filed"> <h4><b style="color:red">{{$admission->father_name}}</b></h4>  </div>

          <div class="box_filed"><STRONG>@isset($admission->branch->branch_name){{$admission->branch->branch_name}}
            @endisset
          </STRONG></div>
          <div class="box_filed"><STRONG>
            @isset($admission->grade->course_name){{$admission->grade->course_name}}
            @endisset

          </STRONG></div>

        </div>


        <div style="width: 30%;float: left; text-align: left;padding-left: 15px; ">

          <h2 style="font-size:32px;"><strong><i class="fa fa-OMR"></i>Admission Fee:@isset($object->pp_Amount) {{($object->pp_Amount)}} OMR  @endisset  /-</strong></h2>

        </div>

      </div>

      <div class="col-md-6">
       <form action="{{route('muscat.stripPayment')}}" method="post" id="payment-form">
        <input type="hidden" name="amount" value=" @isset($object->pp_Amount) {{currencyCnv($object->pp_Amount,'OMR','USD')}}  @endisset">

        <input type="hidden" name="transaction_id" value="{{$fees->id}}">
        <div class="form-row">
          <label for="card-element">
            Credit or debit card
          </label>
          <div id="card-element" class="form-control" style='height: 2.4em; padding-top: .7em;'>
            <!-- a Stripe Element will be inserted here. -->
          </div>
          <!-- Used to display form errors -->
          <div id="card-errors"></div>
        </div>
        <button id="payment-submit" class="btn btn-primary mt-1"> Pay $@isset($object->pp_Amount) {{currencyCnv($object->pp_Amount,'OMR','USD')}}   @endisset</button>

      </form>
    </div>
  </div>
</div>
</div>
</div>


<!-- The Modal -->



<script src="https://js.stripe.com/v3/"></script>
<script>
    // Create a Stripe client.
    var stripe = Stripe('pk_test_51GqIueGEnqFtoeJkkLkfVAerzKllY8s5wX4EisT9ZvZFmUgHlj5fdAXpGm1Mt21XQ6glC8jSdAjnerghQyP3zQPe00gud3FKPl');

// Create an instance of Elements.
var elements = stripe.elements();

// Custom styling can be passed to options when creating an Element.
// (Note that this demo uses a wider set of styles than the guide below.)
var style = {
  base: {
    color: '#32325d',
    lineHeight: '18px',
    fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
    fontSmoothing: 'antialiased',
    fontSize: '16px',
    '::placeholder': {
      color: '#aab7c4'
    }
  },
  invalid: {
    color: '#fa755a',
    iconColor: '#fa755a'
  }
};

// Create an instance of the card Element.
var card = elements.create('card', {style: style});

// Add an instance of the card Element into the `card-element` <div>.
card.mount('#card-element');

// Handle real-time validation errors from the card Element.
card.addEventListener('change', function(event) {
  var displayError = document.getElementById('card-errors');
  if (event.error) {
    displayError.textContent = event.error.message;
  } else {
    displayError.textContent = '';
  }
});

// Handle form submission.
var form = document.getElementById('payment-form');
form.addEventListener('submit', function(event) {
  event.preventDefault();

  stripe.createToken(card).then(function(result) {
    if (result.error) {
      // Inform the user if there was an error.
      var errorElement = document.getElementById('card-errors');
      errorElement.textContent = result.error.message;
    } else {
      // Send the token to your server.
      stripeTokenHandler(result.token);
    }
  });
});

// Submit the form with the token ID.
function stripeTokenHandler(token) {
  // Insert the token ID into the form so it gets submitted to the server
  var form = document.getElementById('payment-form');
  var hiddenInput = document.createElement('input');
  hiddenInput.setAttribute('type', 'hidden');
  hiddenInput.setAttribute('name', 'stripeToken');
  hiddenInput.setAttribute('value', token.id);
  form.appendChild(hiddenInput);

  // Submit the form
  form.submit();
}
</script>

<script type="text/javascript">
  $.ajaxSetup({
    headers: {
     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
   }
 });



</script>

</body>
</html>