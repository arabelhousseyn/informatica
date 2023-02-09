<div
    class="product_item discount d-flex flex-column align-items-center justify-content-center text-center">
    <div
        class="product_image d-flex flex-column align-items-center justify-content-center">
        <img src="{{$product->photo_thumb}}" alt=""></div>
    <div class="product_content">
        @if($product->old_price == null)
            <div class="product_price discount"><span>@money($product->price,'DZD',true)</span></div>
        @else
            <div class="product_price discount">@money($product->old_price,'DZD',true)<span>@money($product->price,'DZD',true)</span>
            </div>
        @endif
        <div class="product_name">
            <div><a href="/product/{{$product->id}}">{{$product->name}}</a></div>
        </div>
        <div class="product_extras">
            <form method="post" action="{{route('cart.store')}}">
                @csrf
                <input type="text" name="product_id" value="{{$product->id}}" style="visibility: hidden;">
                <button class="product_cart_button" type="submit">{{__('app.add')}}</button>
            </form>
        </div>
    </div>
    <form method="post" action="{{route('wishlist.post')}}">
        @csrf
        <input type="text" name="product_id" value="{{$product->id}}" style="visibility: hidden;">
        <button type="submit" style="background: none; border: none; cursor: pointer;">
            @if($product->wishlist)
                <div class="product_fav active"><i class="fas fa-heart"></i></div>
            @else
                <div class="product_fav"><i class="fas fa-heart"></i></div>
            @endif
        </button>
    </form>
    <ul class="product_marks">
        @if($product->discount !== 0)
            <li class="product_mark product_discount">{{$product->discount}}</li>
        @endif
    </ul>
</div>
