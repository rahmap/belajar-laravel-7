<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- App favicon -->
  <link rel="shortcut icon" href=" {{ asset('favicon.ico') }}">
  <title>{{ config('app.name') }} - @yield('subTitle') </title>
  <meta name="description" content="Shopaholic - e-Commerce HTML5 Template">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="apple-touch-icon" href="apple-touch-icon.png">

  <link rel="stylesheet" type="text/css" href="{{ asset('shopaholic') }}/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="{{ asset('shopaholic') }}/css/themify-icons.css">
  <link rel="stylesheet" type="text/css" href="{{ asset('shopaholic') }}/css/et-line-icons.css">

  <link rel="stylesheet" href="{{ asset('shopaholic') }}/css/bootstrap.min.css">
  <link rel="stylesheet" href="{{ asset('shopaholic') }}/css/slick.css">
  <link rel="stylesheet" href="{{ asset('shopaholic') }}/css/magnific-popup.css">
  <link rel="stylesheet" href="{{ asset('shopaholic') }}/css/style.css">
  <link rel="stylesheet" href="{{ asset('shopaholic') }}/css/themes.css">
  <link rel="stylesheet" href="{{ asset('shopaholic') }}/css/shop/shop.css">
  @yield('outCSS')

</head>

<body>
  <style>
    #overlay {
      position: fixed;
      z-index: 99999;
      top: 0;
      left: 0;
      bottom: 0;
      right: 0;
      background: rgba(0, 0, 0, 0.9);
      transition: 1s 0.4s;
    }

    #progress {
      height: 1px;
      background: #fff;
      position: absolute;
      width: 0;
      top: 50%;
    }

    #progstat {
      font-size: 0.7em;
      letter-spacing: 3px;
      position: absolute;
      top: 50%;
      margin-top: -40px;
      width: 100%;
      text-align: center;
      color: #fff;
    }
  </style>
  <div id="overlay">
    <div id="progstat"></div>
    <div id="progress"></div>
  </div>
  <header id="masthead" class="masthead">

    <div class="header-top">
      <div class="container">
        <div class="row">
          <div class="col-sm-5 top-left text-left">
            <p class="top-contact">
              <i class="ti-email"></i><span><a href="#">support@laramart.com</a></span>
              <i class="ti-mobile"></i><span>+628 98200 2040</span>
            </p><!-- /.top-contact -->

          </div><!-- /.top-left -->

          <div class="col-sm-7 top-right text-right">

            {{-- <div class="wish-list">
              <a href="#" class="current-title">Wishlist</a>
              <span class="count">0</span>
              <span><i class="ti-heart"></i></span>
            </div> --}}

            @guest
            <div class="checkout"><a href="{{ route('login') }}">Log In <i class="ti-check-box"></i></a></div>
            <!-- /.checkout -->
            @if (Route::has('register'))
            <div class="checkout"><a href="{{ route('register') }}">Registrasi <i class="ti-check-box"></i></a></div>
            <!-- /.checkout -->
            @endif
            @else
            <div class="checkout"><a href="{{ route('logout') }}" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">Log Out <i class="ti-check-box"></i></a></div>
            <!-- /.checkout -->
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
            </form>
            <div class="my-account dropdown">
              <a href="#">{{ Auth::user()->name }}<i class="ti-user"></i></a>
              <ul class="unsorted-list">
                <li>
                  <a
                    href="@if(Auth::user()->is_admin == 1) {{ url('admin') }} @else {{ url('member') }} @endif">Dashboard</a>
                </li>
              </ul>
            </div><!-- /.my-account -->
            @endguest


          </div><!-- /.top-right -->
        </div><!-- /.row -->
      </div><!-- /.container -->
    </div><!-- /.header-top -->

    <div class="header-middle">
      <div class="container">
        <div class="row">
          <div class="col-sm-3">
            <h1><a class="navbar-brand hidden-xs" href="{{ url('/') }}"><img
                  src="{{ asset('shopaholic') }}/images/logo.png" alt="Site Logo"></a></h1>
          </div>
          <div class="col-sm-7">
            <div class="top-search-form">
              <form action="#" method="post" class="menu-form">
                <fieldset>
                  <select name="category" id="category">
                    <option selected="selected">All Categories</option>
                    <option>Men's Wear</option>
                    <option>Women's Wear</option>
                    <option>Kid's Wear</option>
                    <option>Men's Fashion</option>
                    <option>Women's Fashion</option>
                    <option>Kid's Fashion</option>
                    <option>Home Applience</option>
                    <option>Electronics</option>
                    <option>Gadgets</option>
                    <option>Mobile</option>
                    <option>Laptop</option>
                    <option>Others</option>
                  </select>
                </fieldset>

                <input type="text" placeholder="Keywords ..." class="form-control">
                <button type="submit" class="btn"><i class="fa fa-search"></i></button>
              </form>
            </div><!-- /.top-search-form -->
          </div>
          <div class="col-sm-2">
            <div class="shop-cart">
              <a class="cart-control" href="#" title="View your shopping cart">
                <i class="ti-bag"></i>
                <span class="count">3</span>
                <span>Cart - </span>
                <span class="currency">$</span>
                <span class="amount">345.00</span>
              </a><!-- /.cart-control -->

              <div class="cart-items">
                <div class="widget_shopping_cart_content">
                  <div class="cart-top">
                    <div class="item media">
                      <button class="btn"><i class="fa fa-close"></i></button>
                      <div class="item-thumbnail media-left">
                        <img src="{{ asset('shopaholic') }}/images/menu/cart/1.png" alt="Item Thimbnail">
                      </div><!-- /.item-thumbnail -->
                      <div class="item-details media-body">
                        <div class="rating"><input type="hidden" class="rating-tooltip-manual" data-filled="fa fa-star"
                            data-empty="fa fa-star-o" data-fractions="5" /></div><!-- /.rating -->
                        <h4 class="item-title"><a href="#">Product Name Here</a></h4><!-- /.item-title -->
                        <div class="item-price">
                          <div class="item-price">
                            <span class="currency">$</span>
                            <span class="price">65</span>
                            <span class="item-count">3</span><!-- /.item-count -->
                          </div><!-- /.item-price -->
                        </div><!-- /.item-price -->
                      </div><!-- /.item-details -->
                    </div><!-- /.item -->

                    <div class="item media">
                      <button class="btn"><i class="fa fa-close"></i></button>
                      <div class="item-thumbnail media-left">
                        <img src="{{ asset('shopaholic') }}/images/menu/cart/2.png" alt="Item Thimbnail">
                      </div><!-- /.item-thumbnail -->
                      <div class="item-details media-body">
                        <div class="rating"><input type="hidden" class="rating-tooltip-manual" data-filled="fa fa-star"
                            data-empty="fa fa-star-o" data-fractions="5" /></div><!-- /.rating -->

                        <h4 class="item-title"><a href="#">Product Name Here</a></h4><!-- /.item-title -->
                        <div class="item-price">
                          <div class="item-price">
                            <span class="currency">$</span>
                            <span class="price">65</span>
                            <span class="item-count">3</span><!-- /.item-count -->
                          </div><!-- /.item-price -->
                        </div><!-- /.item-price -->
                      </div><!-- /.item-details -->
                    </div><!-- /.item -->
                  </div><!-- /.cart-top -->

                  <div class="cart-middle">
                    <button class="btn pull-left"><i class="ti-trash"></i> Empty Cart</button>
                    <div class="price-total pull-right">
                      <span>Sub total:</span>
                      <span class="currency">$</span><span class="price">2500.00</span>
                    </div><!-- /.price-total -->
                  </div><!-- /.cart-middle -->

                  <div class="cart-bottom">
                    <a href="cart.html" class="btn pull-left"><i class="icons icon-basket-loaded"></i> View Cart</a>
                    <a href="checkout.html" class="btn pull-right">Checkout</a>
                  </div><!-- /.cart-bottom -->
                </div><!-- /.widget_shopping_cart_content -->
              </div><!-- /.scart-items -->
            </div>
          </div>
        </div><!-- /.row -->
      </div><!-- /.container -->
    </div><!-- /.header-middle -->

    <div class="header-bottom">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#main-menu"
            aria-expanded="false">
            <i class="fa fa-bars"></i>
          </button>
          <a class="navbar-brand visible-xs" href="{{ url('/') }}">
            <img src="{{ asset('shopaholic') }}/images/logo.png" alt="Site Logo">
          </a><!-- /.navbar-brand -->
        </div>

        <nav id="main-menu" class="menu collapse navbar-collapse pull-left">
          <ul class="nav navbar-nav">
            <li class="menu-item menu-item-has-children active">
              <a href="#">Home</a>
              <ul class="sub-menu children">
                <li class="menu-item"><a href="index-01.html">Home 01</a></li>
                <li class="menu-item"><a href="index-02.html">Home 02</a></li>
                <li class="menu-item"><a href="index-03.html">Home 03</a></li>
                <li class="menu-item"><a href="index-04.html">Home 04</a></li>
                <li class="menu-item"><a href="index-05.html">Home 05</a></li>
                <li class="menu-item"><a href="index-06.html">Home 06</a></li>
                <li class="menu-item"><a href="index-07.html">Home 07</a></li>
                <li class="menu-item"><a href="index-08.html">Home 08</a></li>
                <li class="menu-item"><a href="index-09.html">Home 09</a></li>
                <li class="menu-item"><a href="index-10.html">Home 10</a></li>
                <li class="menu-item"><a href="index-11.html">Home 11</a></li>
              </ul>
            </li>


            <li class="menu-item menu-item-has-children">
              <a href="#">Blog</a>
              <ul class="sub-menu">
                <li class="menu-item menu-item-has-children">
                  <a href="#">Classic</a>
                  <ul class="sub-menu">
                    <li><a href="classic-01.html">Right Sidebar</a></li>
                    <li><a href="classic-02.html">Left Sidebar</a></li>
                    <li><a href="classic-03.html">No Sidebar</a></li>
                  </ul>
                </li>
                <li class="menu-item menu-item-has-children">
                  <a href="#">Grid</a>
                  <ul class="sub-menu">
                    <li><a href="grid-2column-01.html">2 Column 01</a></li>
                    <li><a href="grid-2column-02.html">2 Column 02</a></li>
                    <li><a href="grid-3column-01.html">3 Column 01</a></li>
                    <li><a href="grid-3column-02.html">3 Column 02</a></li>
                  </ul>
                </li>
                <li class="menu-item menu-item-has-children">
                  <a href="#">Masonary</a>
                  <ul class="sub-menu">
                    <li><a href="masonry-2column-01.html">2 Column 01</a></li>
                    <li><a href="masonry-2column-02.html">2 Column 02</a></li>
                    <li><a href="masonry-3column-01.html">3 Column 01</a></li>
                    <li><a href="masonry-3column-02.html">3 Column 02</a></li>
                  </ul>
                </li>
                <li class="menu-item menu-item-has-children">
                  <a href="#">Blog Single</a>
                  <ul class="sub-menu">
                    <li><a href="blog-single-classic.html">Single Classic</a></li>
                    <li><a href="blog-single-no-sidebar.html">Single Fullwidth</a></li>
                    <li><a href="blog-single-left-sidebar.html">Left Sidebar</a></li>
                    <li><a href="blog-single-right-sidebar.html">Right Sidebar</a></li>
                  </ul>
                </li>
              </ul>
            </li>

            <li class="menu-item menu-item-has-children">
              <a href="#">Portfolio</a>
              <ul class="sub-menu">
                <li class="menu-item menu-item-has-children">
                  <a href="#">Grid 2 Column</a>
                  <ul class="sub-menu">
                    <li><a href="portfolio-grid-2column-01.html">2 Column 01</a></li>
                    <li><a href="portfolio-grid-2column-02.html">2 Column 02</a></li>
                  </ul>
                </li>

                <li class="menu-item menu-item-has-children">
                  <a href="#">Grid 3 Column</a>
                  <ul class="sub-menu">
                    <li><a href="portfolio-grid-3column.html">3 Column 01</a></li>
                    <li><a href="portfolio-grid-3column-02.html">3 Column 02</a></li>
                  </ul>
                </li>

                <li class="menu-item menu-item-has-children">
                  <a href="#">Grid 4 Column</a>
                  <ul class="sub-menu">
                    <li><a href="portfolio-grid-4column.html">4 Column 01</a></li>
                    <li><a href="portfolio-grid-4column-02.html">4 Column 02</a></li>
                  </ul>
                </li>

                <li class="menu-item menu-item-has-children">
                  <a href="#">Masonry 3 Column</a>
                  <ul class="sub-menu">
                    <li><a href="portfolio-masonry-3column.html">3 Column 01</a></li>
                    <li><a href="portfolio-masonry-3column-02.html">3 Column 02</a></li>
                  </ul>
                </li>


                <li><a href="portfolio-list.html">List Style</a></li>

                <li class="menu-item menu-item-has-children">
                  <a href="#">Portfolio Detail</a>
                  <ul class="sub-menu">
                    <li><a href="portfolio-details.html">Details 01</a></li>
                    <li><a href="portfolio-details-02.html">Details 02</a></li>
                  </ul>
                </li>
              </ul>
            </li>

            <li class="menu-item"><a href="#">Buy</a></li>

          </ul><!-- /.navbar-nav -->
        </nav><!-- /.navbar-collapse -->

        <div class="menu-social pull-right">
          <a href="#"><i class="ti-twitter-alt"></i></a>
          <a href="#"><i class="ti-facebook"></i></a>
          <a href="#"><i class="ti-pinterest-alt"></i></a>
          <a href="#"><i class="ti-vimeo-alt"></i></a>
        </div><!-- /.menu-social -->
      </div><!-- /.container -->
    </div><!-- /.header-bottom -->

  </header><!-- /#masthead -->



  <section class="page-name-sec page-name-sec-01" style="margin-bottom:-250px; height:50px;">

  </section><!-- /.page-name-sec -->

  @yield('content')


  @section('footer')
  <footer class="site-footer">

    <div class="footer-bottom">
      <div class="container">
        <div class="row">
          <div class="col-sm-7 text-left">
            <div class="copyright">
              © <a href="https://github.com/rahmap">Shopaholic</a> 2020 | Develpoed With Love by <a
                href="https://github.com/rahmap">rahmap</a>
            </div><!-- /.copyright -->
          </div>

          <div class="col-sm-5 text-right">
            <div class="payment-list">
              <a href="#"><img src="{{ asset('shopaholic') }}/images/payment/1.png" alt="Payment Logo"></a>
              <a href="#"><img src="{{ asset('shopaholic') }}/images/payment/2.png" alt="Payment Logo"></a>
              <a href="#"><img src="{{ asset('shopaholic') }}/images/payment/3.png" alt="Payment Logo"></a>
              <a href="#"><img src="{{ asset('shopaholic') }}/images/payment/4.png" alt="Payment Logo"></a>
              <a href="#"><img src="{{ asset('shopaholic') }}/images/payment/5.png" alt="Payment Logo"></a>
            </div>
          </div>
        </div><!-- /.row -->
      </div><!-- /.container -->
    </div><!-- /.footer-bottom -->
  </footer>
  @show



  <div id="scroll-to-top" class="scroll-to-top">
    <i class="fa fa-angle-double-up"></i>
  </div>



  <script src="{{ asset('shopaholic') }}/js/plugins.js"></script>
  <script src="{{ asset('shopaholic') }}/js/main.js"></script>
  <script src="{{ asset('shopaholic') }}/js/jquery-ui.min.js"></script>
  <script src="{{ asset('shopaholic') }}/js/bootstrap-rating.min.js"></script>
  <script>
    (function(){
      function id(v){
        return document.getElementById(v); 
      }
      function loadbar() {
        var ovrl = id("overlay"),
            prog = id("progress"),
            stat = id("progstat"),
            img = document.images,
            c = 0;
            tot = img.length;

        function imgLoaded(){
          c += 1;
          var perc = ((100/tot*c) << 0) +"%";
          prog.style.width = perc;
          stat.innerHTML = "Loading "+ perc;
          if(c===tot) return doneLoading();
        }
        function doneLoading(){
          ovrl.style.opacity = 0;
          setTimeout(function(){ 
            ovrl.style.display = "none";
          }, 1200);
        }
        for(var i=0; i<tot; i++) {
          var tImg     = new Image();
          tImg.onload  = imgLoaded;
          tImg.onerror = imgLoaded;
          tImg.src     = img[i].src;
        }    
      }
      document.addEventListener('DOMContentLoaded', loadbar, false);
    }());
  </script>
  @yield('outJS')

</body>

</html>