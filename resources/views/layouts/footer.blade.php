<footer class="footer">
    <div class="container">
        <div class="row">

            <div class="col-lg-3 footer_col">
                <div class="footer_column footer_contact">
                    <div class="logo_container">
                        <div class="logo"><a href="#" style="text-transform: uppercase;">informatica</a></div>
                    </div>
                    <div class="footer_title">{{__('app.faq')}}</div>
                    <div class="footer_phone">0699197900/0561269408</div>
                    <div class="footer_contact_text">
                        <p>12,Chemin Sidi Yahia Local 14</p>
                        <p> Bir Mourad Rais ,ALGER, ALGERIE</p>
                    </div>
                    <div class="footer_social">
                        <ul>
                            <li><a href="https://www.facebook.com/informaticasidiyahia" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="https://www.instagram.com/informatica_bladi_shop" target="_blank"><i class="fab fa-instagram"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-lg-2 offset-lg-2">
                <div class="footer_column">
                    <div class="footer_title">{{__('app.find')}}</div>
                    <ul class="footer_list">
                        @foreach($categories as $category)
                            @if($loop->index == 5)
                                @break
                            @endif
                            <li><a href="/category/{{$category->id}}">{{$category->name}}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <div class="col-lg-2">
                <div class="footer_column">
                    <ul class="footer_list footer_list_2">
                        @foreach($categories as $category)
                            @if($loop->index < 5)
                                @continue
                            @endif
                                <li><a href="/category/{{$category->id}}">{{$category->name}}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <div class="col-lg-2">
                <div class="footer_column">
                    <div class="footer_title">{{__('app.care')}}</div>
                    <ul class="footer_list">
                        <li><a href="/cart">{{__('app.cart')}}</a></li>
                        <li><a href="/wishlist">{{__('app.wishlist')}}</a></li>
                    </ul>
                </div>
            </div>

        </div>
    </div>
</footer>

<!-- Copyright -->

<div class="copyright">
    <div class="container">
        <div class="row">
            <div class="col">

                <div
                    class="copyright_container d-flex flex-sm-row flex-column align-items-center justify-content-start">
                    <div class="copyright_content">
                         &copy;<script>document.write(new Date().getFullYear());</script>
                        {{__('app.rights')}} |<a href="https://www.linkedin.com/in/elhousseyn-arab/" target="_blank">Elhousseyn arab</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
