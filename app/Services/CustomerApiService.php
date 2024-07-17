<?php

namespace App\Services;

use App\Models\Customer;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Exceptions;

class CustomerApiService
{
    public function store(Request $request)
    {
        try {
            $customer = Http::post('https://api-teste.ip4y.com.br/cadastro', [
                'cpf' => $request->cpf,
                'name' => $request->name,
                'lastname' => $request->lastname,
                'birth_date' => $request->birth_date,
                'email' => $request->email,
                'gender' => $request->gender,
            ]);

            return response($customer)->header('Content-Type', 'application/json')
                                      ->header('Accept', 'application/json');
        } catch(Exceptions $error) {
            return response()->json([
                'status'  => '500',
                'message' => 'Erro ao cadastrar cliente.'
            ]);
        }
    }
}
