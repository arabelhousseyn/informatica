<?php

namespace App\Http\Controllers;

use App\Http\Requests\LocaleRequest;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class LocaleController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(LocaleRequest $request)
    {
        App::setLocale($request->input('lang'));

        Session::put('locale', $request->input('lang'));

        return redirect()->refresh();
    }
}
