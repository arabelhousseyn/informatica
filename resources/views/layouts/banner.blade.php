<div class="banner">
    <div class="banner_background" style="background-image:url({{asset('assets/images/banner_background.jpg')}})"></div>
    <div class="container fill_height">
        <div class="row fill_height">
            @if($banner_product !== null)
                <div class="banner_product_image"><img src="{{$banner_product->photo}}" alt=""></div>
                <div class="col-lg-5 offset-lg-4 fill_height">
                    <div class="banner_content">
                        <h1 class="banner_text">{{__('app.week')}}</h1>
                        @if($banner_product->old_price !== null)
                            <div class="banner_price"><span>@money($banner_product->old_price, 'DZD',true)</span>@money($banner_product->price,
                                'DZD',true)
                            </div>
                        @else
                            <div class="banner_price">@money($banner_product->price, 'DZD',true)</div>
                        @endif
                        <div class="banner_product_name">{{$banner_product->name}}</div>
                        <div class="button banner_button"><a href="/product/{{$banner_product->id}}">Shop Now</a></div>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
