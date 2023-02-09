@extends('main')

@section('title',"$category->name")

@section('content')

    <link rel="stylesheet" type="text/css" href="{{asset('assets/plugins/jquery-ui-1.12.1.custom/jquery-ui.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/shop_styles.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/shop_responsive.css')}}">

    <!-- Home -->

    <div class="home">
        <div class="home_background parallax-window" data-parallax="scroll" data-image-src="{{asset('assets/images/shop_background.jpg')}}"></div>
        <div class="home_overlay"></div>
        <div class="home_content d-flex flex-column align-items-center justify-content-center">
            <h2 class="home_title">{{$category->name}}</h2>
        </div>
    </div>

    <!-- Shop -->

    <div class="shop">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <!-- Shop Sidebar -->
                    <div class="shop_sidebar">
                        @foreach($ads as $ad)
                            <div class="sidebar_section">
                                <div class="deals_image"><img src="{{$ad->photo}}" alt=""></div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="col-lg-9">


                    <!-- Shop Content -->

                    <div class="shop_content">
                        <div class="shop_bar clearfix">
                            <div class="shop_product_count"><span>{{$products->count()}}</span> {{__('app.found')}}</div>
                        </div>

                        <div class="product_grid">
                            <div class="product_grid_border"></div>
                            @foreach($products as $product)
                                @include('components.product-card',$product)
                            @endforeach

                        </div>
                    {!! $products->links() !!}
                    </div>

                </div>
            </div>
        </div>
    </div>

    <script src="{{asset('assets/js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('assets/plugins/Isotope/isotope.pkgd.min.js')}}"></script>
    <script src="{{asset('assets/plugins/jquery-ui-1.12.1.custom/jquery-ui.js')}}"></script>
    <script src="{{asset('assets/plugins/parallax-js-master/parallax.min.js')}}"></script>
    <script src="{{asset('assets/js/shop_custom.js')}}"></script>
@endsection
