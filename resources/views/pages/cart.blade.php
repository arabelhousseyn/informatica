@extends('main')

@section('title',__('app.cart'))

@section('content')
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/cart_styles.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/cart_responsive.css')}}">
    <!-- Cart -->
    <div class="cart_section">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="cart_container">
                        <div class="cart_title">{{__('app.cart')}}</div>
                        <div class="cart_items">
                            @foreach($cart as $item)
                                <ul class="cart_list">
                                    <li class="cart_item clearfix">
                                        <div class="cart_item_image"><img src="{{$item->photo}}" alt=""></div>
                                        <div
                                            class="cart_item_info d-flex flex-md-row flex-column justify-content-between">
                                            <div class="cart_item_name cart_info_col">
                                                <div class="cart_item_title">{{__('app.name')}}</div>
                                                <div class="cart_item_text">
                                                    <a href="/product/{{$item->id}}">{{$item->name}}</a>
                                                </div>
                                            </div>
                                            <div class="cart_item_quantity cart_info_col">
                                                <div class="cart_item_title">{{__('app.description')}}</div>
                                                <div class="cart_item_text">{{$item->description}}</div>
                                            </div>

                                            <div class="cart_item_quantity cart_info_col">
                                                <div class="cart_item_title">{{__('app.quantity')}}</div>
                                                <div class="cart_item_text">{{$item->pivot->quantity}}</div>
                                            </div>

                                            <div class="cart_item_price cart_info_col">
                                                <div class="cart_item_title">{{__('app.old')}}</div>
                                                @if(!blank($item->old_price))
                                                    <div class="cart_item_text">@money($item->old_price,'DZD',true)</div>
                                                @endif
                                            </div>
                                            <div class="cart_item_price cart_info_col">
                                                <div class="cart_item_title">{{__('app.price')}}</div>
                                                <div class="cart_item_text">@money($item->price,'DZD',true)</div>
                                            </div>

                                            <div class="cart_item_price cart_info_col">
                                                <div class="cart_item_title">{{__('app.remove')}}</div>
                                                <div class="cart_item_text">
                                                    <form method="post"
                                                          action="{{route('cart.destroy',$item->pivot->id)}}">
                                                        @csrf
                                                        <button style="cursor: pointer;" type="submit"
                                                                class="btn btn-danger unfav"><i
                                                                class="fas fa-thumbs-down"></i></button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            @endforeach
                        </div>
                        <!-- Order Total -->
                        <div class="order_total">
                            <div class="order_total_content text-md-right">
                                <div class="order_total_title">{{__('app.total')}} {{__('app.cart')}}:</div>
                                <div class="order_total_amount">@money(auth()->user()->getTotalCartPrice(),'DZD',true)</div>
                            </div>
                        </div>

                        <div class="cart_buttons">
                            <button type="button" class="button cart_button_checkout">
                                <a href="/order">{{__('app.checkout')}}</a>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{asset('assets/js/cart_custom.js')}}"></script>
@endsection
