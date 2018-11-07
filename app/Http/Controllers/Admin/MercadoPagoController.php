<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\MercadoPago;

class MercadoPagoController extends Controller
{
    public function edit()
    {
        return view('dashboard.mercado-pago.edit', [
            'mp' => MercadoPago::first() ?: app(MercadoPago::class)
        ]);
    }

    public function update(Request $request)
    {
        $data = [
            'client_id' => $request->client_id,
            'client_secret' => $request->client_secret,
            'public_key' => $request->public_key,
            'access_token' => $request->access_token
        ];

        if (MercadoPago::count()) {
            MercadoPago::first()->update($data);
        } else {
            MercadoPago::create($data);
        }

        return back()->with('flash', 'Credenciais atualizadas com sucesso.');
    }
}
