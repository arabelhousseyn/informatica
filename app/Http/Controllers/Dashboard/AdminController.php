<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\CreateAdminRequest;
use App\Http\Requests\Dashboard\UpdateAdminRequest;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{

    public function index()
    {
        $admins = Admin::whereNot('id', Auth::id())->latest('id')->get();

        return view('dashboard.pages.admin.admin', compact('admins'));
    }


    public function create()
    {
        return view('dashboard.pages.admin.add');
    }


    public function store(CreateAdminRequest $request)
    {
        $password = Hash::make($request->input('password'));

        Admin::create(array_merge(['password' => $password], $request->except('password')));

        return redirect()->back();
    }


    public function show(Admin $admin)
    {

    }

    public function edit(Admin $admin)
    {
        return view('dashboard.pages.admin.update', compact('admin'));
    }

    public function update(UpdateAdminRequest $request, Admin $admin)
    {
        $admin->update($request->validated());

        return redirect()->back();
    }

    public function destroy(Admin $admin)
    {
        $admin->delete();

        return redirect()->back();
    }
}
