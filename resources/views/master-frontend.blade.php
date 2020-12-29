<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Meta -->
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <meta name="keywords" content="MediaCenter, Template, eCommerce" />
        <meta name="robots" content="all" />
        <title>Em Tâm Strore | Chuyên hàng công nghệ</title>
        <!-- Bootstrap Core CSS -->
        <link rel="stylesheet" href="{{asset('frontend/assets/css/bootstrap.min.css')}}" />
        <!-- Customizable CSS -->
        <link rel="stylesheet" href="{{ asset('frontend/assets/css/main.css') }}" />
        <link rel="stylesheet" href="{{ asset('frontend/assets/css/blue.css') }}" />
        <link rel="stylesheet" href="{{ asset('frontend/assets/css/owl.carousel.css') }}" />
        <link rel="stylesheet" href="{{ asset('frontend/assets/css/owl.transitions.css') }}" />
        <link rel="stylesheet" href="{{ asset('frontend/assets/css/animate.min.css') }}" />
        <link rel="stylesheet" href="{{ asset('frontend/assets/css/rateit.css') }}" />
        <link rel="stylesheet" href="{{ asset('frontend/assets/css/bootstrap-select.min.css') }}" />
        <!-- Icons/Glyphs -->
        <link rel="stylesheet" href="{{ asset('frontend/assets/css/font-awesome.css') }}" />
        <!-- slider -->
        <link rel="stylesheet" href="{{ asset('frontend/assets/css/lightslider.css') }}" />
        @yield('css')
        <!-- Fonts -->
        <link href="http://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,600,600italic,700,700italic,800" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        @if (session('toastr'))
            <script>
                var type_message = "{{ session('toastr.type') }}";
                var message = "{{ session('toastr.message') }}";
            </script>
        @endif
        <link rel="stylesheet" href="{{ asset('admins/vendors/toastr/toastr.min.css') }}" />
    </head>
    <body class="cnt-home">
        <!-- ============================================== HEADER ============================================== -->
        <header class="header-style-1">
            <!-- ============================================== TOP MENU ============================================== -->
            @include('frontend.components.header')
            <!-- ============================================== NAVBAR : END ============================================== -->
        </header>
        <!-- ============================================== HEADER : END ============================================== -->
        <div class="body-content outer-top-xs" id="top-banner-and-menu">
            @yield('content')
        </div>
        <!-- ============================================================= FOOTER ============================================================= -->
        @include('frontend.components.footer')
        <!-- ============================================================= FOOTER : END============================================================= -->
        <!-- JavaScripts placed at the end of the document so the pages load faster -->
        <script src="{{ asset('frontend/assets/js/jquery-1.11.1.min.js') }}"></script>
        <script src="{{ asset('frontend/assets/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('frontend/assets/js/bootstrap-hover-dropdown.min.js') }}"></script>
        <script src="{{ asset('frontend/assets/js/owl.carousel.min.js') }}"></script>
        <script src="{{ asset('frontend/assets/js/echo.min.js') }}"></script>
        <script src="{{ asset('frontend/assets/js/jquery.easing-1.3.min.js') }}"></script>
        <script src="{{ asset('frontend/assets/js/bootstrap-slider.min.js') }}"></script>
        <script src="{{ asset('frontend/assets/js/jquery.rateit.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('frontend/assets/js/lightbox.min.js') }}"></script>
        <script src="{{ asset('frontend/assets/js/bootstrap-select.min.js') }}"></script>
        <script src="{{ asset('frontend/assets/js/wow.min.js') }}"></script>
        <script src="{{ asset('frontend/assets/js/scripts.js') }}"></script>
        <script src="{{ asset('admins/vendors/toastr/toastr.min.js') }}"></script>
        <!--slider-->
        <script src="{{ asset('frontend/assets/js/lightslider.js') }}"></script>
        @yield('js')
        <script type="text/javascript">
            $('#key').keyup(function(){
                var query = $(this).val();
                if(query != ' '){
                    var _token = $('input[name="_token"]').val();
                    $.ajax({
                        url:"{{ url('/autocomplete-search') }}",
                        method:"POST",
                        data:{query:query, _token:_token},
                        success:function(data){
                            $('#search_ajax').fadeIn();
                            $('#search_ajax').html(data);
                        }
                    });
                }
                else{
                    $('#search_ajax').fadeOut();
                }
            });
            $(document).on('click','li',function(){
                $('#key').val($(this).text());
                $('#search_ajax').fadeOut();
            });
        </script>
        
        <script>
            if(typeof type_message != "undefined")
            {
                switch (type_message){
                    case 'success':
                        toastr.success(message)
                        break;
                    case 'error':
                        toastr.error(message)
                        break;
                }
            }
        </script>
        <script type="text/javascript">
            $(document).ready(function(){
              $('#sort').on('change',function(){
                var url = $(this).val();
                if(url){
                    window.location = url;
                }
                return false;
              })
            })
        </script>
        <script type="text/javascript">
            $(document).ready(function() {
               $('#imageGallery').lightSlider({
                  gallery:true,
                  item:1,
                  loop:true,
                  thumbItem:4,
                  slideMargin:0,
                  enableDrag: false,
                  currentPagerPosition:'left',
                  onSliderLoad: function(el) {
                        el.lightGallery({
                           selector: '#imageGallery .lslide'
                        });
                  }   
               });  
           });
         </script>
    </body>
</html>
