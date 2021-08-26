<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
  <meta name="author" content="GeeksLabs">
  <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
  <meta name="_token" content="{{ csrf_token() }}">
  <link rel="shortcut icon" href="img/favicon.png">

  <title>Website News</title>
  @yield('css')
  <!-- Bootstrap CSS -->
  <link href="{{ asset('backend/css/bootstrap.min.css') }}" rel="stylesheet">
  <!-- bootstrap theme -->
  <link href="{{ asset('backend/css/bootstrap-theme.css') }}" rel="stylesheet">
  <!--external css-->
  <!-- font icon -->
  <link href="{{ asset('backend/css/elegant-icons-style.css') }}" rel="stylesheet" />
  <link href="{{ asset('backend/css/font-awesome.min.css') }}" rel="stylesheet" />
  <!-- full calendar css-->
  <link href="{{ asset('backend/assets/fullcalendar/fullcalendar/bootstrap-fullcalendar.css') }}" rel="stylesheet" />
  <link href="{{ asset('backend/assets/fullcalendar/fullcalendar/fullcalendar.css') }}" rel="stylesheet" />
  <!-- easy pie chart-->
  <link href="{{ asset('backend/assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css') }}" rel="stylesheet" type="text/css" media="screen" />
  <!-- owl carousel -->
  <link rel="stylesheet" href="{{ asset('backend/css/owl.carousel.css') }}" type="text/css">
  <link href="{{ asset('backend/css/jquery-jvectormap-1.2.2.css') }}" rel="stylesheet">
  <!-- Custom styles -->
  <link rel="stylesheet" href="{{ asset('backend/css/fullcalendar.css') }}">
  <link href="{{ asset('backend/css/widgets.css') }}" rel="stylesheet">
  <link href="{{ asset('backend/css/style.css') }}" rel="stylesheet">
  <link href="{{ asset('backend/css/style-responsive.css') }}" rel="stylesheet" />
  <link href="{{ asset('backend/css/xcharts.min.css') }}" rel=" stylesheet">
  <link href="{{ asset('backend/css/jquery-ui-1.10.4.min.css') }}" rel="stylesheet">
  <link href="{{ asset('backend/css/bootstrap.min.css') }}" rel="stylesheet">
  <!-- bootstrap theme -->
  <link href="{{ asset('backend/css/bootstrap-theme.css') }}" rel="stylesheet">
  <!--external css-->
  <!-- font icon -->
  <link href="{{ asset('backend/css/elegant-icons-style.css') }}" rel="stylesheet" />
  <link href="{{ asset('backend/css/font-awesome.min.css') }}" rel="stylesheet" />
  <!-- Custom styles -->
  <link href="{{ asset('backend/css/style.css') }}" rel="stylesheet">
  <link href="{{ asset('backend/css/style-responsive.css') }}" rel="stylesheet" />
  <link rel="stylesheet" href="{{ asset('frontend/vendor/font-awesome-4.7.0/css/font-awesome.css') }}">
 
  
  
 
  <!-- =======================================================
    Theme Name: NiceAdmin
    Theme URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
    Author: BootstrapMade
    Author URL: https://bootstrapmade.com
  ======================================================= -->
</head>

<body>
  @include('includes.admin.header')
  @yield('content')

  <!-- javascripts -->
  <script src="{{ asset('backend/js/jquery.js') }}"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="{{ asset('backend/js/jquery-1.8.3.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('backend/js/jquery-ui-1.9.2.custom.min.js') }}"></script>
  <!-- bootstrap -->
  <script src="{{ asset('backend/js/bootstrap.min.js') }}"></script>
  <!-- nice scroll -->
  <script src="{{ asset('backend/js/jquery.scrollTo.min.js') }}"></script>
  <script src="{{ asset('backend/js/jquery.nicescroll.js') }}" type="text/javascript"></script>
  <!-- charts scripts -->
  <script src="{{ asset('backend/assets/jquery-knob/js/jquery.knob.js') }}"></script>
  <script src="{{ asset('backend/js/jquery.sparkline.js') }}" type="text/javascript"></script>
  <script src="{{ asset('backend/assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js') }}"></script>
  <script src="{{ asset('backend/js/owl.carousel.js') }}"></script>
  <!-- jQuery full calendar -->
  <<script src="{{ asset('backend/js/fullcalendar.min.js') }}">
    </script>
    <!-- Full Google Calendar - Calendar -->
    <script src="{{ asset('backend/assets/fullcalendar/fullcalendar/fullcalendar.js') }}"></script>
    <!--script for this page only-->
    <script src="{{ asset('backend/js/calendar-custom.js') }}"></script>
    <script src="{{ asset('backend/js/jquery.rateit.min.js') }}"></script>
    <!-- custom select -->
    <script src="{{ asset('backend/js/jquery.customSelect.min.js') }}"></script>
    <script src="{{ asset('backend/assets/chart-master/Chart.js') }}"></script>

    <!--custome script for all page-->
    <script src="{{ asset('backend/js/scripts.js') }}"></script>
    <!-- custom script for this page-->
    <script src="{{ asset('backend/js/sparkline-chart.js') }}"></script>
    <script src="{{ asset('backend/js/easy-pie-chart.js') }}"></script>
    <script src="{{ asset('backend/js/jquery-jvectormap-1.2.2.min.js') }}"></script>
    <script src="{{ asset('backend/js/jquery-jvectormap-world-mill-en.js') }}"></script>
    <script src="{{ asset('backend/js/xcharts.min.js') }}"></script>
    <script src="{{ asset('backend/js/jquery.autosize.min.js') }}"></script>
    <script src="{{ asset('backend/js/jquery.placeholder.min.js') }}"></script>
    <script src="{{ asset('backend/js/gdp-data.js') }}"></script>
    <script src="{{ asset('backend/js/morris.min.js') }}"></script>
    <script src="{{ asset('backend/js/sparklines.js') }}"></script>
    <script src="{{ asset('backend/js/charts.js') }}"></script>
    <script src="{{ asset('backend/js/jquery.slimscroll.min.js') }}"></script>
    <script src="{{ asset('backend/js/search.js') }}"></script>
 

    
    
    <script>
      //knob
      $(function() {
        $(".knob").knob({
          'draw': function() {
            $(this.i).val(this.cv + '%')
          }
        })
      });

      //carousel
      $(document).ready(function() {
        $("#owl-slider").owlCarousel({
          navigation: true,
          slideSpeed: 300,
          paginationSpeed: 400,
          singleItem: true

        });
      });

      //custom select box

      $(function() {
        $('select.styled').customSelect();
      });

      /* ---------- Map ---------- */
      $(function() {
        $('#map').vectorMap({
          map: 'world_mill_en',
          series: {
            regions: [{
              values: gdpData,
              scale: ['#000', '#000'],
              normalizeFunction: 'polynomial'
            }]
          },
          backgroundColor: '#eef3f7',
          onLabelShow: function(e, el, code) {
            el.html(el.html() + ' (GDP - ' + gdpData[code] + ')');
          }
        });
      });
    </script>

</body>

</html>