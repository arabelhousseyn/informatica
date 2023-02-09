<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.5">
    <title>informatica-{{__('app.checkout')}}</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.3/examples/checkout/">

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/bootstrap4/bootstrap.min.css')}}">
    <link href="{{asset('assets/plugins/fontawesome-free-5.0.1/css/fontawesome-all.css')}}" rel="stylesheet"
          type="text/css">

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>
    <!-- Custom styles for this template -->
    <link href="form-validation.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container">
    <div class="py-5 text-center">
        <a href="/">
            <img width="72" height="72" class="d-block mx-auto mb-4" src="{{asset('assets/logo.jpeg')}}" alt="logo">
        </a>
        <h2>{{__('app.checkout')}}</h2>
        <p class="lead">{{__('app.message')}}</p>
    </div>

    <div class="row">
        <div class="col-md-4 order-md-2 mb-4">
            <h4 class="d-flex justify-content-between align-items-center mb-3">
                <span class="text-muted">{{__('app.your')}} {{__('app.cart')}}</span>
                <span class="badge badge-secondary badge-pill">{{$cart->count()}}</span>
            </h4>
            <ul class="list-group mb-3">
                @foreach($cart as $item)
                    <li class="list-group-item d-flex justify-content-between lh-condensed">
                        <div>
                            <span class="badge badge-secondary badge-pill">{{$item->pivot->quantity}}</span>
                            <h6 class="my-0">{{$item->name}}</h6>
                            <small class="text-muted">{{$item->description}}</small>
                        </div>
                        <span class="text-muted">@money($item->price,'DZD',true)</span>
                    </li>
                @endforeach
                <li class="list-group-item d-flex justify-content-between">
                    <span>{{__('app.total')}} (DZD)</span>
                    <strong>@money(auth()->user()->getTotalCartPrice(),'DZD',true)</strong>
                </li>
            </ul>
        </div>
        <div class="col-md-8 order-md-1">
            <h4 class="mb-3">{{__('app.billing')}}</h4>
            <form class="needs-validation" action="{{route('order.store')}}" method="post" novalidate>
                @csrf
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="firstName">{{__('app.firstname')}}</label>
                        <input type="text" class="form-control" id="firstName" name="first_name" :value="old('first_name')" placeholder="John" required>
                        <x-input-error class="mt-2" :messages="$errors->get('first_name')" />
                        <div class="invalid-feedback">
                            {{__('app.firstnameValid')}}
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="lastName">{{__('app.lastname')}}</label>
                        <input type="text" class="form-control" id="lastName" name="last_name" :value="old('last_name')" placeholder="Doe" required>
                        <x-input-error class="mt-2" :messages="$errors->get('last_name')" />
                        <div class="invalid-feedback">
                            {{__('app.lastnameValid')}}
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="phone">{{__('app.phone')}} <span class="text-muted"></span></label>
                    <input type="text" class="form-control" id="phone" name="phone" :value="old('phone')" placeholder="xxxxxxxxxx">
                    <x-input-error class="mt-2" :messages="$errors->get('phone')" />
                    <div class="invalid-feedback">
                        {{__('app.phoneValid')}}
                    </div>
                </div>

                <div class="mb-3">
                    <label for="email">{{__('app.email')}} <span class="text-muted">{{__('app.optional')}}</span></label>
                    <input type="email" class="form-control" id="email" name="email" :value="old('email')" placeholder="you@example.com">
                    <x-input-error class="mt-2" :messages="$errors->get('email')" />
                    <div class="invalid-feedback">
                        {{__('app.emailValid')}}
                    </div>
                </div>

                <div class="mb-3">
                    <label for="address">{{__('app.Address1')}}</label>
                    <input type="text" class="form-control" id="address" name="address1" :value="old('address1')" placeholder="1234 Main St" required>
                    <x-input-error class="mt-2" :messages="$errors->get('address1')" />
                    <div class="invalid-feedback">
                        {{__('app.shipping')}}
                    </div>
                </div>

                <div class="mb-3">
                    <label for="address2">{{__('app.Address2')}} <span class="text-muted">{{__('app.optional')}}</span></label>
                    <input type="text" class="form-control" id="address2" name="address2" :value="old('address2')" placeholder="{{__('app.apartment')}}">
                    <x-input-error class="mt-2" :messages="$errors->get('address2')" />
                </div>

                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label for="city">{{__('app.city')}}</label>
                        <select class="custom-select d-block w-100" id="city" name="city" :value="old('city')" required>
                            @foreach($algerianCities as $city)
                                <option value="{{$city['name']}}">{{$city['code']}} {{$city['name']}}</option>
                            @endforeach
                        </select>
                        <div class="invalid-feedback">
                            {{__('app.cityValid')}}
                        </div>
                        <x-input-error class="mt-2" :messages="$errors->get('city')" />
                    </div>
                </div>
                <hr class="mb-4">
                <button class="btn btn-primary btn-lg btn-block" type="submit">{{__('app.order')}}</button>
            </form>
        </div>
    </div>

    <footer class="my-5 pt-5 text-muted text-center text-small">
        <p class="mb-1">&copy; <script>document.write(new Date().getFullYear());</script>
            {{__('app.rights')}} |<a href="#" target="_blank">Elhousseyn arab</a></p>
    </footer>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script>window.jQuery || document.write('<script src="/docs/4.3/assets/js/vendor/jquery-slim.min.js"><\/script>')</script><script src="https://getbootstrap.com/docs/4.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"></script>
<script src="https://getbootstrap.com/docs/4.3/examples/checkout/form-validation.js"></script></body>
</html>
