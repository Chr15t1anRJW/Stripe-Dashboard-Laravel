<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Stripe Dashboard</title>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous"> 
<link href="{{ asset('/css/style.css') }}" rel="stylesheet">
<link href="{{ asset('/css/responce.css') }}" rel="stylesheet">

</head>





<body>






  <section id="container" >

      <!-- **********************************************************************************************************************************************************

      TOP BAR CONTENT & NOTIFICATIONS

      *********************************************************************************************************************************************************** -->

      <!--header start-->

      <header class="header black-bg">

            <!--logo start-->

            <a href="/properties" class="logo"><b>Stripe Dashboard</b></a>

            <!--logo end-->
<a href="/properties/create"><div class="sidebar-toggle-box pull-right" style="
    font-size: 2em;
    color: #000;
">

                  <div class="fa fa-plus-circle tooltips" data-placement="right"></div>

              </div></a>

        </header>

      <!--header end-->



      <!-- **********************************************************************************************************************************************************

      MAIN SIDEBAR MENU

      *********************************************************************************************************************************************************** -->

      <!--sidebar start-->

      <aside>

          <div id="sidebar"  class="nav-collapse ">

              <!-- sidebar menu start-->

              <ul class="sidebar-menu" id="nav-accordion">



              	  <p class="centered"><a href=""><img src="{{ asset('/img/RJW_buildin_logo.png') }}" class="img" width="60"></a></p>

              	  <h5 class="centered">Red Jacket West</h5>
                  



@foreach($properties as $property)
<li class="mt">

<a href="/properties/{{$property->id}}"><i class="fa fa-dollar"></i><span>{{$property->title}}</span></a>
</li>
@endforeach


                  

              </ul>

              <!-- sidebar menu end-->

          </div>

      </aside>

      <!--sidebar end-->





      <!-- **********************************************************************************************************************************************************

      MAIN CONTENT

      *********************************************************************************************************************************************************** -->

      <!--main content start-->

      <section id="main-content">

          <section class="wrapper site-min-height">
          	<div class="row mt">

          		<div class="col-lg-12">

          		@yield('content')-

          		</div>

          	</div>



		</section><! --/wrapper -->

      </section><!-- /MAIN CONTENT -->



      <!--main content end-->

      <!--footer start-->


<footer class="site-footer">



<div class="text-center">

              2016 - christiancampbell.us

              <a href="blank.html#" class="go-top">

                  <i class="fa fa-angle-up"></i>

              </a>

          </div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
      </footer>

      <!--footer end-->

  </section>


</body>
</html>
