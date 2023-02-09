@extends('main')

@section('title',"$product->name")

@section('content')

    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/product_styles.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/product_responsive.css')}}">

    <!-- Single Product -->
    <div class="single_product">
        <div class="container">
            <div class="row">
            @if(empty($product->photos))
                <!-- Selected Image -->
                    <div class="col-lg-5 order-lg-2 order-1">
                        <div class="image_selected"><img src="{{$product->photo}}" alt=""></div>
                    </div>
            @else
                <!-- Images -->
                    <div class="col-lg-2 order-lg-1 order-2">
                        <ul class="image_list">
                            @foreach($product->photos as $photo)
                                <li data-image="{{$photo->getFullUrl()}}"><img src="{{$photo->getFullUrl()}}" alt="">
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    <!-- Selected Image -->
                    <div class="col-lg-5 order-lg-2 order-1">
                        <div class="image_selected"><img src="{{$product->photo}}" alt=""></div>
                    </div>
            @endif

            <!-- Description -->
                <div class="col-lg-5 order-3">
                    <div class="product_description">
                        <div class="product_category">{{$product->category->name}}</div>
                        <div class="product_name">{{$product->name}}</div>
                        <div class="product_text"><p>{{$product->description}}</p></div>
                        <div class="order_info d-flex flex-row">
                            <form method="post" action="{{{route('cart.store')}}}">
                                @csrf
                                <div class="clearfix" style="z-index: 1000;">

                                    <!-- Product Quantity -->
                                    <div class="product_quantity clearfix">
                                        <span>{{__('app.quantity')}}: </span>
                                        <input id="quantity_input" type="text" pattern="[1-9]*" name="quantity" value="1">
                                        <div class="quantity_buttons">
                                            <div id="quantity_inc_button" class="quantity_inc quantity_control"><i
                                                    class="fas fa-chevron-up"></i></div>
                                            <div id="quantity_dec_button" class="quantity_dec quantity_control"><i
                                                    class="fas fa-chevron-down"></i></div>
                                        </div>
                                    </div>

                                    <!-- Product Color -->
                                    <ul class="product_color">
                                        <li>
                                            <span>Color: </span>
                                            <div class="color_mark_container">
                                                <div id="selected_color" class="color_mark"></div>
                                            </div>
                                            <div class="color_dropdown_button"><i class="fas fa-chevron-down"></i></div>

                                            <ul class="color_list">
                                                <li>
                                                    <div class="color_mark" style="background: #999999;"></div>
                                                </li>
                                                <li>
                                                    <div class="color_mark" style="background: #b19c83;"></div>
                                                </li>
                                                <li>
                                                    <div class="color_mark" style="background: #000000;"></div>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>

                                </div>

                                <div class="product_price">@money($product->price,'DZD',true)</div>
                                <div class="button_container">
                                        <input type="text" name="product_id" value="{{$product->id}}" style="visibility: hidden;">
                                        <button type="submit" class="button cart_button">{{__('app.add')}}</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <script src="{{asset('assets/js/product_custom.js')}}"></script>
@endsection
