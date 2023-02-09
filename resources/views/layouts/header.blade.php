<header class="header">
    <!-- Top Bar -->

    <div class="top_bar">
        <div class="container">
            <div class="row">
                <div class="col d-flex flex-row">
                    <div class="top_bar_contact_item">
                        <div class="top_bar_icon"><img src="{{asset('assets/images/phone.png')}}" alt=""></div>
                        0699197900/0561269408
                    </div>
                    <div class="top_bar_contact_item">
                        <div class="top_bar_icon"><img src="{{asset('assets/images/mail.png')}}" alt=""></div>
                        <a href="mailto:smvdz2011@gmail.com">smvdz2011@gmail.com</a></div>
                    <div class="top_bar_content ml-auto">
                        <div class="top_bar_menu">
                            <ul class="standard_dropdown top_bar_dropdown">
                                <li>
                                    @switch(app()->getLocale())
                                        @case('en')
                                        <a href="#">English<i class="fas fa-chevron-down"></i></a>
                                        <ul>
                                            <li><a href="locale?lang=ar">Arabic</a></li>
                                            <li><a href="locale?lang=fr">French</a></li>
                                        </ul>
                                        @break

                                        @case('ar')
                                        <a href="#">عربية<i class="fas fa-chevron-down"></i></a>
                                        <ul>
                                            <li><a href="locale?lang=en">إنجليزية</a></li>
                                            <li><a href="locale?lang=fr">الفرنسية</a></li>
                                        </ul>
                                        @break

                                        @case('fr')
                                        <a href="#">Français<i class="fas fa-chevron-down"></i></a>
                                        <ul>
                                            <li><a href="locale?lang=ar">Arabe</a></li>
                                            <li><a href="locale?lang=en">Anglais</a></li>
                                        </ul>
                                        @break
                                        @endswitch
                                </li>
                            </ul>
                        </div>
                        @guest
                            <div class="top_bar_user">
                                <div class="user_icon"><img src="{{asset('assets/images/user.svg')}}" alt=""></div>
                                @if(Route::has('register'))
                                    <div><a href="/register">{{__('app.register')}}</a></div>
                                @endif
                                @if(Route::has('login'))
                                    <div><a href="/login">{{__('app.login')}}</a></div>
                                @endif
                            </div>
                        @endguest

                        @auth
                            <div class="top_bar_user">
                                <ul class="standard_dropdown top_bar_dropdown">
                                    <li>
                                        <a href="#"><div class="user_icon"><img src="{{asset('assets/images/user.svg')}}" alt=""></div> {{auth()->user()->full_name}}<i class="fas fa-chevron-down"></i></a>
                                        <ul>
                                            <li>
                                                <form method="post" action="{{route('logout')}}">
                                                    @csrf
                                                    <button  type="submit" style="background: none; border: none;">
                                                        <a style="cursor: pointer;">{{__('app.logout')}}</a>
                                                    </button>
                                                </form>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Header Main -->

    <div class="header_main">
        <div class="container">
            <div class="row">

                <!-- Logo -->
                <div class="col-lg-2 col-sm-3 col-3 order-1">
                    <div class="logo_container">
                        <div class="logo">
                            <a href="/">
                                <img style="width: 100%; height: 100px;" src="{{asset('assets/logo.jpeg')}}" alt="logo">
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Search -->
                <div class="col-lg-6 col-12 order-lg-2 order-3 text-lg-left text-right">
                    <div class="header_search">
                        <div class="header_search_content">
                            <div class="header_search_form_container">
                                <form action="{{route('search')}}" method="get" class="header_search_form clearfix">
                                    <input type="search" required="required" name="key" class="header_search_input"
                                           placeholder="{{__('app.search')}}">
                                    <div class="custom_dropdown">
                                        <div class="custom_dropdown_list">
                                            <span class="custom_dropdown_placeholder clc">{{__('app.all_categories')}}</span>
                                            <i class="fas fa-chevron-down"></i>
                                            <ul class="custom_list clc">
                                                @foreach($categories as $category)
                                                    <li><a class="clc" href="#">{{$category->name}}</a> <span style="visibility: hidden;">{{$category->id}}</span> </li>
                                                @endforeach
                                            </ul>

                                            <select name="category" id="category" style="visibility: hidden;">
                                                <option value=""></option>
                                            </select>
                                        </div>
                                    </div>
                                    <button type="submit" class="header_search_button trans_300" value="Submit"><i
                                            class="fa fa-search" style="color: white;"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Wishlist -->
                <div class="col-lg-4 col-9 order-lg-3 order-2 text-lg-left text-right">
                    <div class="wishlist_cart d-flex flex-row align-items-center justify-content-end">
                        <div class="wishlist d-flex flex-row align-items-center justify-content-end">
                            <div class="wishlist_icon"><img src="{{asset('assets/images/heart.png')}}" alt=""></div>
                            <div class="wishlist_content">
                                <div class="wishlist_text"><a href="/wishlist">{{__('app.wishlist')}}</a></div>
                                <div class="wishlist_count">{{auth()->user()?->wishlist()->count()}}</div>
                            </div>
                        </div>

                        <!-- Cart -->
                        <div class="cart">
                            <div class="cart_container d-flex flex-row align-items-center justify-content-end">
                                <div class="cart_icon">
                                    <img src="{{asset('assets/images/cart.png')}}" alt="">
                                    <div class="cart_count"><span>{{auth()->user()?->cart()->count()}}</span></div>
                                </div>
                                <div class="cart_content">
                                    <div class="cart_text"><a href="/cart">{{__('app.cart')}}</a></div>
                                    @auth
                                    <div class="cart_price">@money(auth()->user()?->getTotalCartPrice(), 'DZD',true)</div>
                                    @endauth
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Navigation -->

    <nav class="main_nav">
        <div class="container">
            <div class="row">
                <div class="col">

                    <div class="main_nav_content d-flex flex-row">

                        <!-- Categories Menu -->

                        <div class="cat_menu_container">
                            <div class="cat_menu_title d-flex flex-row align-items-center justify-content-start">
                                <div class="cat_burger"><span></span><span></span><span></span></div>
                                <div class="cat_menu_text">{{__('app.categories')}}</div>
                            </div>

                            <ul class="cat_menu">
                                @foreach($categories as $category)
                                    @if(collect($category->children)->isEmpty())
                                    <li>
                                        <a href="/category/{{$category->id}}">{{ $category->name }} <i class="fas fa-chevron-right ml-auto"></i></a>
                                    </li>
                                    @else
                                        <li class="hassubs">
                                            <a href="/category/{{$category->id}}">{{ $category->name }} <i class="fas fa-chevron-right"></i></a>
                                            <ul>
                                                @foreach($category->children as $child)
                                                    @if(collect($child->children)->isEmpty())
                                                        <li><a href="/category/{{$category->id}}">{{$child->name}}<i class="fas fa-chevron-right"></i></a></li>
                                                    @else
                                                        <li class="hassubs">
                                                            <a href="/category/{{$category->id}}">{{$child->name}}<i class="fas fa-chevron-right"></i></a>
                                                            <ul>
                                                                @foreach($child->children as $child2)
                                                                        <li><a href="/category/{{$category->id}}">{{$child2->name}}<i class="fas fa-chevron-right"></i></a></li>
                                                                @endforeach
                                                            </ul>
                                                        </li>
                                                    @endif
                                                        @endforeach
                                            </ul>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                        <!-- Menu Trigger -->

                        <div class="menu_trigger_container ml-auto">
                            <div class="menu_trigger d-flex flex-row align-items-center justify-content-end">
                                <div class="menu_burger">
                                    <div class="menu_trigger_text">menu</div>
                                    <div class="cat_burger menu_burger_inner"><span></span><span></span><span></span></div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Menu -->

    <div class="page_menu">
        <div class="container">
            <div class="row">
                <div class="col">

                    <div class="page_menu_content">

                        <div class="page_menu_search">
                            <form action="{{route('search')}}" method="get">
                                <input type="search" required="required" name="key" class="page_menu_search_input" placeholder="{{__('app.search')}}">
                                <button type="submit" class="header_search_button trans_300" value="Submit"><i
                                        class="fa fa-search" style="color: white;"></i></button>
                            </form>
                        </div>
                        <ul class="page_menu_nav">
                            <li class="page_menu_item has-children">
                                <a href="#">{{__('app.lang')}}<i class="fa fa-angle-down"></i></a>
                                <ul class="page_menu_selection">
                                    <li><a href="/locale?lang=en">English<i class="fa fa-angle-down"></i></a></li>
                                    <li><a href="/locale?lang=ar">Arabic<i class="fa fa-angle-down"></i></a></li>
                                    <li><a href="/locale?lang=fr">French<i class="fa fa-angle-down"></i></a></li>
                                </ul>
                            </li>
                            <li class="page_menu_item">
                                <a href="/">{{__('app.home')}}<i class="fa fa-angle-down"></i></a>
                            </li>

                            @guest
                                    @if(Route::has('login'))
                                    <li class="page_menu_item">
                                        <a href="/login">{{__('app.login')}}<i class="fa fa-angle-down"></i></a>
                                    </li>
                                    @endif
                                    @if(Route::has('register'))
                                            <li class="page_menu_item">
                                                <a href="/register">{{__('app.register')}}<i class="fa fa-angle-down"></i></a>
                                            </li>
                                    @endif
                            @endguest

                            @auth
                                    @if(Route::has('account'))
                                    <li class="page_menu_item has-children">
                                        <a href="#">{{auth()->user()->full_name}}<i class="fa fa-angle-down"></i></a>
                                        <ul class="page_menu_selection">
                                            <li><a href="/profile">Account<i class="fa fa-angle-down"></i></a></li>
                                            <li>
                                                <form method="post" action="{{route('logout')}}">
                                                    <a href="#">Log out<i class="fa fa-angle-down"></i></a>
                                                </form>
                                            </li>
                                        </ul>
                                    </li>
                                    @endif
                            @endauth
                        </ul>

                        <div class="menu_contact">
                            <div class="menu_contact_item"><div class="menu_contact_icon"><img src="{{asset('assets/images/phone_white.png')}}" alt=""></div>0699197900/0561269408</div>
                            <div class="menu_contact_item"><div class="menu_contact_icon"><img src="{{asset('assets/images/mail_white.png')}}" alt=""></div><a href="mailto:smvdz2011@gmail.com">smvdz2011@gmail.com</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
