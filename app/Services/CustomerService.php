<?php

namespace App\Services;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class CustomerService
{
    public function store(Request $request)
    {
        try {
            Customer::create([
                'cpf' => $request->cpf,
                'name' => $request->name,
                'lastname' => $request->lastname,
                'birth_date' => $request->birth_date,
                'email' => $request->email,
                'gender' => $request->gender,
            ]);

        } catch (QueryException $error) {
            dd($error);
        }
    }

    public function update(Request $request, Customer $customer)
    {
        try {
            $customer->update([
                'cpf' => $request->cpf,
                'name' => $request->name,
                'lastname' => $request->lastname,
                'birth_date' => $request->birth_date,
                'email' => $request->email,
                'gender' => $request->gender,
            ]);

        } catch (QueryException $error) {
            dd($error);
        }
    }

    public function delete(Customer $customer)
    {
        try {
            $customer->delete();

        } catch (QueryException $error) {
            dd($error);
        }
    }
}
