<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAdsRequest;
use App\Models\Ad;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AdsController extends Controller
{
    public function index(): View
    {
        $ads = Ad::all();

        return view('dashboard.pages.ads.index', compact('ads'));
    }

    public function create(): View
    {
        return view('dashboard.pages.ads.create');
    }

    public function store(StoreAdsRequest $request): RedirectResponse
    {
        $ad = Ad::create(array_merge($request->safe()->except('image'), ['admin_id' => auth()->id()]));

        $filename = uniqid().".jpg";
        $request->file('image')->storeAs('public/ads', $filename);
        $ad->media()->create(['url' => config('app.url')."/storage/ads/$filename"]);

        return redirect()->back();
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy(Ad $ad): RedirectResponse
    {
        $ad->delete();

        return redirect()->back();
    }
}
