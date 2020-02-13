    <!DOCTYPE html>
    <html>
    <head>
    	<title></title>

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('fontend')}}/css/base.css">
    <link rel="stylesheet" href="{{asset('fontend')}}/css/vendor.css">
    <link rel="stylesheet" href="{{asset('fontend')}}/css/main.css">
    
    <script src="{{asset('fontend')}}/js/modernizr.js"></script>


    <!-- Java Script
    ================================================== -->
   <script src="{{asset('fontend')}}/js/jquery-3.2.1.min.js"></script>
    <script src="{{asset('fontend')}}/js/plugins.js"></script>
    <script src="{{asset('fontend')}}/js/main.js"></script>
    </head>
    <body>
       @yield('feature')
 
 <footer style="background: white ;height: :100px ">

  <div class="footer-copyright text-center py-3" style="font-style: italic; color: black"> © 2019, Inc. All rights reserved.
  </div>
  

</footer>
    
    </body>
    </html>
