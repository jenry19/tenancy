<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTenancyRegisterRequest;
use App\Models\Tenant;
use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;


class TenancyRegisterController extends Controller
{
    public function create()
    {
        return view('tenancy-register');
    }

    public function store(StoreTenancyRegisterRequest $request)
    {
          // Crear el tenant
    $tenant = Tenant::create($request->validated());

    // Crear el dominio para el tenant
    $tenant->createDomain(['domain' => $request->domain]);


    // Redirigir al nuevo dominio
    $newDomain = 'http://' . $request->domain . ':8000';
    return redirect()->away($newDomain);
    }


}
