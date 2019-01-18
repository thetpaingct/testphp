<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="cache-control" content="no-cache">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Test</title>

    <!-- Styles -->
    <!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->
    
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/jq-3.3.1/dt-1.10.18/datatables.min.css"/>

    <link href="{{ asset('css/mystyle.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
 
 

 

<!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.18/datatables.min.css"/> -->
 


<!-- Scripts -->
    
     @yield('css') 
     <!-- <script src="{{ asset('js/app.js') }}"></script> -->
   
  
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/jquery.min.js') }}"></script> 
    <script src="{{ asset('js/tphcustom.js') }}"></script> 
     

    

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    @if (session()->has('two'))
                      <a  class="navbar-brand" href="{{ url('admin/view') }}" >
                  Admin View   </a>


            
                    @else
                    <a class=" nav-custom" href="{{ url('/') }}" >
                      <!--   {{ config('app.name', 'Laravel') }} -->
                     
                  </a>
                  <a  class="navbar-brand" href="{{ url('dashboard') }}" >
                  Test
               </a>
@endif
           </div>
           <ul class="nav navbar-nav">
        @yield('nav1')

           @if(session()->has('one')) 
           <!--  {{session('one')}}  -->
            
      <li><a href="{{ url('dashboard') }}">Dash Board</a></li>
      <li><a href="{{ url('/') }}">Create Order</a></li>
      <li><a href="{{url('customer/create')}}"> Create Customer</a></li>
      <li><a href="{{ url('order/submit') }}">Order</a></li> 
      <li><a href="{{ url('customer/list') }}">Customer</a></li> 
      
    
           @elseif (session()->has('two'))
        <!--  {{session('two')}}       -->     
    @else
   
   
    @endif

</ul>

           <div class="collapse navbar-collapse" id="app-navbar-collapse">

            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->

                <li>
@yield('nav')
                    @guest
                    <li><a href="{{ url('login') }}"><font color="white">Login</font></a></li>
                   <!--  <li><a href="{{ url('register') }}"><font color="white">Register</font></a></li> -->
                    @else
                    <!-- <li><a href="{{ url('order/create') }}"><font color="white">Order</font></a></li> -->
<li><a href="{{ url('logout') }}">Logout</a></li>
               

                @endguest
            </li>
        </ul>

    </div>
</div>
</nav>
<!-- modal -->
@guest
@else

<div class="modal fade" id="basicModal" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"> Information </h4>
      </div>
      <div class="modal-body"> 
      <div class="o" id="show1"> 
          <p > Name - {{ Auth::user()->name }}</p>
          <p > Gmail - {{ Auth::user()->email }}</p>
          @php
          $id =  Auth::user()->id ;
          @endphp

          <p> Phone number -{{ Auth::user()->phone_no }}</p>
      </div>
      <div class="l" id="hide1">
        
       <!--  <div></div> -->
       <!-- <form role="form" method="post" action="{{ url('user/'.$id)}}">
        {{csrf_field()}} -->
        <div class="form-group">
            <label for="exampleInputEmail1">Name</label><br>
            <input type="text" class="form-control" id="name" value="{{ Auth::user()->name }}">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Phone number </label><br>
            <input class="form-control" type="text" id="phone" value="{{ Auth::user()->phone_no }}">
        </div>
       <!--  <div class="form-group">
            <label for="exampleInputEmail1">Gmail</label><br>
            <input  class="form-control" type="text" id="email" value="{{ Auth::user()->email }}">
        </div> -->
        <!-- <a type="button" href="{{ url('user/'.$id)}}"  class="btn btn-success">Update</a> -->
       <!--  <button type="submit"   class="btn btn-success">Update </button> -->
         <!-- </form>  -->
      </div>
      </div>
      <div class="modal-footer">
         <form role="form" method="post" action="{{ url('user/'.$id)}}" id="edit_form">
        {{csrf_field()}}
            <input type="hidden" name="name" value="" id="h_name">

            <input type="hidden" name="phone" value="" id="h_ph">

            <input  type="hidden" name="email" value="{{ Auth::user()->email }}" id="h_email">
</form>
         <input type="button"  class="btn btn-success"  id="btn_update"  style="display: none;" value="Update">
       <button type="button" class="btn btn-primary" id="edit1">Edit</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
      
  </div>
</div>
@endguest
</div>

<!-- modal -->
@yield('content')

</div>
<footer class="footer">
    <div class="footerHeader" ></div>
    <div class="container">
        <div class="col-md-4" >
            <h3>About us</h3>
            <p>
                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
            </p>
        </div>

        <div class="col-md-4">
            <h3>Facebook Page </h3>
            <div class="fb-page" data-href="https://www.facebook.com/SarPayLawKa/" data-tabs="timeline" data-width="340" data-height="152" data-small-header="true" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"></div>
        </div>
        <div class="col-md-4" >
            <h3>Contact Us</h3>
            <ul>
                <li>Phone :  09 795 277962</li>
                <li>Address : 173, 33rd St, Kyauktada Township
                Yangon</li>
                <li>Gmail :thwemyonyunt@gmail.com</li>
            </ul>
            <p>
                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s
            </p>
            <ul class="sm">
                <li><a href="https://web.facebook.com/SarPayLawKa/" ><img src="{{url('image/fb_icon_325x325.png')}}" class="img-responsive"></a></li>
                
            </ul>
        </div>
    </div>
</footer>
<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>


 <script type="text/javascript" src="https://cdn.datatables.net/v/dt/jq-3.3.1/dt-1.10.18/datatables.min.js"></script>
 <!-- <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.18/datatables.min.js"></script> -->

<div id="fb-root"></div>

<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.12';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));

// $(document).ready(function(){
//     hide_all1();
//     $("#update1").hide();
//     $("#edit1").click(function(){
//         $("#hide1").show();
//         $("#show1").hide();
//         $("#edit1").hide();
//         $("#btn_update").show();
//     });
//     function hide_all1()
//     {
//         $("#hide1").hide();
//     }

//     $("#btn_update").click(function() {
//       // event.preventDefault();
//       // $("#h_email").val($("#email").val());
//       $("#h_ph").val($("#phone").val());
//       $("#h_name").val($("#name").val());
//       $("#edit_form").submit();
//     });
// });

$(document).ready(function() {
    responsive: true;
    $('#example').DataTable();
} );

</script>
@yield('script')
</body>
</html>
